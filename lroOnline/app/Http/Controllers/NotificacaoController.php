<?php

namespace App\Http\Controllers;

use App\Models\Notificacao;
use Illuminate\Support\Facades\Auth;

class NotificacaoController extends Controller
{
    /**
     * Mark a single notification as read.
     * Called via POST /empresa/notificacoes/{notificacao}/lida
     * Only marks if the notification belongs to the authenticated empresa.
     */
    public function markRead(Notificacao $notificacao)
    {
        $empresa = Auth::guard('empresa')->user();

        // Security: ensure the notification belongs to this empresa.
        // notificavel_type may be the full class name OR a morphMap alias ('empresa'),
        // so we check the resolved model matches Empresa and the ID matches.
        $ownerType = $notificacao->notificavel_type;
        $resolvedClass = \Illuminate\Database\Eloquent\Relations\Relation::getMorphedModel($ownerType)
            ?? $ownerType;

        if (
            $resolvedClass !== \App\Models\Empresa::class ||
            (int) $notificacao->notificavel_id !== (int) $empresa->id
        ) {
            return response()->json(['error' => 'Sem permissão.'], 403);
        }

        // Skip if already marked read (idempotent — safe to call twice)
        if ($notificacao->lida) {
            return response()->json(['success' => true]);
        }

        $notificacao->update([
            'lida'    => true,
            'lida_em' => now(),
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Mark all notifications as read for this empresa.
     * Called via POST /empresa/notificacoes/todas-lidas
     */
    public function markAllRead()
    {
        $empresa = Auth::guard('empresa')->user();

        $empresa->notificacoes()
                ->where('lida', false)
                ->update([
                    'lida'    => true,
                    'lida_em' => now(),
                ]);

        return response()->json(['success' => true]);
    }
}
