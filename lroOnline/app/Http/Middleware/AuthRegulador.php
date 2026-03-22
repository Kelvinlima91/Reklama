<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Protects routes that require a logged-in regulator (Regulador).
 * Also blocks unapproved regulators even if authenticated.
 * Redirects to /login_regulator if not authenticated.
 */
class AuthRegulador
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('regulador')->check()) {
            return redirect()->route('regulador.login')
                             ->with('aviso', 'Precisa de iniciar sessão como regulador para continuar.');
        }

        // Extra check: block if account not yet approved
        if (! Auth::guard('regulador')->user()->aprovado) {
            Auth::guard('regulador')->logout();
            return redirect()->route('regulador.login')
                             ->with('aviso', 'A sua conta ainda não foi aprovada pela administração da DGPDC.');
        }

        return $next($request);
    }
}
