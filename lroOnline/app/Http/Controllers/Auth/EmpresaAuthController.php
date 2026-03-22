<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class EmpresaAuthController extends Controller
{
    // ── REGISTER ──────────────────────────────────────────────

    public function showRegister()
    {
        return view('register_company');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome_comercial' => ['required', 'string', 'max:255'],
            'razao_social'   => ['required', 'string', 'max:255'],
            'nif'            => ['required', 'string', 'max:20', 'unique:empresas,nif'],
            'setor'          => ['required', 'string', 'max:100'],
            'email'          => ['required', 'email', 'unique:empresas,email'],
            'telefone'       => ['nullable', 'string', 'max:20'],
            'ilha'           => ['nullable', 'string', 'max:100'],
            'concelho'       => ['nullable', 'string', 'max:100'],
            'password'       => ['required', 'confirmed', Password::min(8)],
        ]);

        $empresa = Empresa::create([
            'nome_comercial' => $request->nome_comercial,
            'razao_social'   => $request->razao_social,
            'nif'            => $request->nif,
            'setor'          => $request->setor,
            'email'          => $request->email,
            'telefone'       => $request->telefone,
            'ilha'           => $request->ilha,
            'concelho'       => $request->concelho,
            'password'       => $request->password,
            'verificada'     => false, // must be verified by DGPDC
        ]);

        Auth::guard('empresa')->login($empresa);

        return redirect()->route('dashboard.company')
                         ->with('sucesso', 'Empresa registada com sucesso! Aguarde verificação pela DGPDC.');
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

        if (Auth::guard('empresa')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $empresa = Auth::guard('empresa')->user();

            // Block if deactivated
            if (! $empresa->ativa) {
                Auth::guard('empresa')->logout();
                return back()->withErrors([
                    'email' => 'Esta conta de empresa está desativada.',
                ]);
            }

            return redirect()->intended(route('dashboard.company'));
        }

        return back()->withErrors([
            'email' => 'Email ou palavra-passe incorretos.',
        ])->onlyInput('email');
    }

    // ── LOGOUT ────────────────────────────────────────────────

    public function logout(Request $request)
    {
        Auth::guard('empresa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('empresa.login')
                         ->with('sucesso', 'Sessão terminada com sucesso.');
    }
}
