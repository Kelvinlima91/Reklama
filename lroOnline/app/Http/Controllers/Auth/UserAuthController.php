<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserAuthController extends Controller
{
    // ── REGISTER ──────────────────────────────────────────────

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome_completo' => ['required', 'string', 'max:255'],
            'nif'           => ['required', 'string', 'max:20', 'unique:users,nif'],
            'email'         => ['required', 'email', 'unique:users,email'],
            'telefone'      => ['nullable', 'string', 'max:20'],
            'ilha'          => ['nullable', 'string', 'max:100'],
            'concelho'      => ['nullable', 'string', 'max:100'],
            'password'      => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = User::create([
            'nome_completo' => $request->nome_completo,
            'nif'           => $request->nif,
            'email'         => $request->email,
            'telefone'      => $request->telefone,
            'ilha'          => $request->ilha,
            'concelho'      => $request->concelho,
            'password'      => $request->password, // auto-hashed by model cast
        ]);

        Auth::guard('web')->login($user);

        return redirect()->route('dashboard.user')
                         ->with('sucesso', 'Conta criada com sucesso! Bem-vindo, ' . $user->primeiro_nome . '.');
    }

    // ── LOGIN ─────────────────────────────────────────────────

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');
        $remember    = $request->boolean('remember');

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Block if account is deactivated
            if (! Auth::guard('web')->user()->ativo) {
                Auth::guard('web')->logout();
                return back()->withErrors([
                    'email' => 'A sua conta está desativada. Contacte o suporte.',
                ]);
            }

            return redirect()->intended(route('dashboard.user'));
        }

        return back()->withErrors([
            'email' => 'Email ou palavra-passe incorretos.',
        ])->onlyInput('email');
    }

    // ── LOGOUT ────────────────────────────────────────────────

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
                         ->with('sucesso', 'Sessão terminada com sucesso.');
    }
}
