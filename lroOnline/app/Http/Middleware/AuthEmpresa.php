<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Protects routes that require a logged-in company (Empresa).
 * Redirects to /login_company if not authenticated.
 */
class AuthEmpresa
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('empresa')->check()) {
            return redirect()->route('empresa.login')
                             ->with('aviso', 'Precisa de iniciar sessão como empresa para continuar.');
        }

        return $next($request);
    }
}
