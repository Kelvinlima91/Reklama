<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Reclamacao;
use App\Services\ReclamacaoReferenceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclamacaoController extends Controller
{
    public function __construct(
        protected ReclamacaoReferenceService $referenceService
    ) {}

    /**
     * Store a new reclamação submitted by a consumer.
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

        // Try to find a registered empresa by name (case-insensitive).
        // If not found, store empresa_id as null — regulators can link later.
        $empresa = Empresa::whereRaw('LOWER(nome_comercial) = ?', [
            strtolower(trim($request->empresa_nome))
        ])->first();

        // Generate the reference number using the user's island
        $referencia = $this->referenceService->generate($user->ilha);

        $reclamacao = Reclamacao::create([
            'user_id'           => $user->id,
            'empresa_id'        => $empresa?->id,
            'empresa_nome'      => $request->empresa_nome,
            'assunto'           => $request->assunto,
            'categoria'         => $request->categoria,
            'descricao'         => $request->descricao,
            'estado'            => 'pendente',
            'numero_referencia' => $referencia,
            'ilha'              => $user->ilha,
            'concelho'          => $user->concelho,
        ]);

        return redirect()
            ->route('dashboard.user')
            ->with('sucesso', "Reclamação {$reclamacao->numero_referencia} submetida com sucesso! Será contactado em breve.");
    }

    /**
     * Delete a reclamação — only if still 'pendente' and owned by this user.
     */
    public function destroy(Reclamacao $reclamacao)
    {
        $user = Auth::guard('web')->user();

        if ($reclamacao->user_id !== $user->id) {
            abort(403, 'Sem permissão para eliminar esta reclamação.');
        }

        if ($reclamacao->estado !== 'pendente') {
            return back()->withErrors(['erro' => 'Só é possível eliminar reclamações pendentes.']);
        }

        $ref = $reclamacao->numero_referencia;
        $reclamacao->delete();

        return redirect()
            ->route('dashboard.user')
            ->with('sucesso', "Reclamação {$ref} eliminada com sucesso.");
    }
}
