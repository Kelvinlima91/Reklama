<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Protects routes that require a logged-in consumer (User).
 * Redirects to /login if not authenticated.
 */
class AuthUser
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::guard('web')->check()) {
            return redirect()->route('login')
                             ->with('aviso', 'Precisa de iniciar sessão para continuar.');
        }

        return $next($request);
    }
}
