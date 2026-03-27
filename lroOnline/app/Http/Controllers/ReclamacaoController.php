<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Notificacao;
use App\Models\Reclamacao;
use App\Services\ReclamacaoReferenceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReclamacaoController extends Controller
{
    public function __construct(
        protected ReclamacaoReferenceService $referenceService
    ) {}

    /**
     * Store a new reclamação submitted by a consumer.
     *
     * Flow (wrapped in DB transaction — atomic):
     *   1. Validate input
     *   2. Look up empresa by name (case-insensitive)
     *   3. Generate reference number
     *   4. Create Reclamacao — linked to empresa if found, null otherwise
     *   5. If empresa found → set estado to 'em_analise', set prazo_empresa (+48h),
     *      and create an in-app Notificacao for the company
     *   6. Redirect with contextual success message
     */
    public function store(Request $request)
    {
        $user = Auth::guard('web')->user();

        $request->validate([
            'empresa_nome' => ['required', 'string', 'max:200'],
            'assunto'      => ['required', 'string', 'max:200'],
            'categoria'    => ['required', 'string', 'max:100'],
            'descricao'    => ['required', 'string', 'min:30', 'max:5000'],
        ], [
            'empresa_nome.required' => 'O nome da empresa é obrigatório.',
            'assunto.required'      => 'O assunto é obrigatório.',
            'categoria.required'    => 'Selecione uma categoria.',
            'descricao.required'    => 'A descrição é obrigatória.',
            'descricao.min'         => 'A descrição deve ter pelo menos 30 caracteres.',
        ]);

        // Wrap everything in a transaction — if notification fails,
        // the reclamação is rolled back too (no orphaned records).
        [$reclamacao, $empresa] = DB::transaction(function () use ($request, $user) {

            // ── 1. Look up empresa by name (case-insensitive) ──
            $empresa = Empresa::whereRaw('LOWER(nome_comercial) = ?', [
                strtolower(trim($request->empresa_nome))
            ])->first();

            // ── 2. Determine estado and prazo ──────────────────
            // Registered empresa → em_analise + 48h deadline
            // Unknown empresa   → pendente, DGPDC will handle it
            $estado       = $empresa ? 'em_analise' : 'pendente';
            $prazoEmpresa = $empresa ? now()->addHours(48) : null;

            // ── 3. Generate reference number ───────────────────
            // Done inside the transaction so the sequence lock is
            // held until the record is committed.
            $referencia = app(ReclamacaoReferenceService::class)->generate($user->ilha);

            // ── 4. Create the Reclamacao ───────────────────────
            $reclamacao = Reclamacao::create([
                'user_id'           => $user->id,
                'empresa_id'        => $empresa?->id,
                'empresa_nome'      => $request->empresa_nome,
                'assunto'           => $request->assunto,
                'categoria'         => $request->categoria,
                'descricao'         => $request->descricao,
                'estado'            => $estado,
                'numero'            => $referencia,
                'numero_referencia' => $referencia,
                'prazo_empresa'     => $prazoEmpresa,
                'ilha'              => $user->ilha,
                'concelho'          => $user->concelho,
            ]);

            // ── 5. Notify empresa if registered ────────────────
            if ($empresa) {
                Notificacao::create([
                    'notificavel_type' => Empresa::class,
                    'notificavel_id'   => $empresa->id,
                    'reclamacao_id'    => $reclamacao->id,
                    'tipo'             => 'info',
                    'titulo'           => "Nova reclamação — {$reclamacao->numero_referencia}",
                    'mensagem'         => "O consumidor {$user->nome_completo} submeteu uma reclamação sobre: \"{$request->assunto}\". Tem 48 horas para responder.",
                    'lida'             => false,
                ]);
            }

            return [$reclamacao, $empresa];
        });

        // ── 6. Redirect with contextual success message ─────────
        $mensagem = $empresa
            ? "Reclamação {$reclamacao->numero_referencia} submetida com sucesso! A empresa {$empresa->nome_comercial} foi notificada e tem 48h para responder."
            : "Reclamação {$reclamacao->numero_referencia} submetida com sucesso! A empresa indicada não está registada na plataforma — o caso será analisado pela DGPDC.";

        return redirect()
            ->route('dashboard.user')
            ->with('sucesso', $mensagem);
    }

    /**
     * Delete a reclamação.
     *
     * Allowed states: 'pendente' (empresa not registered)
     *                 'em_analise' only if no response yet (respondida_em is null)
     * Ownership check uses loose cast to avoid SQLite int/string mismatch.
     */
    public function destroy(Reclamacao $reclamacao)
    {
        $user = Auth::guard('web')->user();

        // Use loose cast — SQLite can return IDs as strings
        if ((int) $reclamacao->user_id !== (int) $user->id) {
            abort(403, 'Sem permissão para eliminar esta reclamação.');
        }

        // Allow delete on 'pendente' OR 'em_analise' with no response yet.
        // Once a company has responded, it can no longer be deleted.
        $podeEliminar = $reclamacao->estado === 'pendente'
            || ($reclamacao->estado === 'em_analise' && is_null($reclamacao->respondida_em));

        if (! $podeEliminar) {
            return back()->withErrors([
                'erro' => 'Não é possível eliminar esta reclamação. Já se encontra em processamento.',
            ]);
        }

        $ref = $reclamacao->numero_referencia;
        $reclamacao->delete();

        return redirect()
            ->route('dashboard.user')
            ->with('sucesso', "Reclamação {$ref} eliminada com sucesso.");
    }
}
