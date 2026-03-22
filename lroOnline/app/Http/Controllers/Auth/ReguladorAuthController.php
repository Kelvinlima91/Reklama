<?php
//
//namespace App\Http\Controllers\Auth;
//
//use App\Http\Controllers\Controller;
//use App\Models\Regulador;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Validation\Rules\Password;
//
//class ReguladorAuthController extends Controller
//{
//    // ── REGISTER ──────────────────────────────────────────────
//
//    public function showRegister()
//    {
//        return view('register_regulator');
//    }
//
//    public function register(Request $request)
//    {
//        $request->validate([
//            'nome'               => ['required', 'string', 'max:100'],
//            'apelido'            => ['required', 'string', 'max:100'],
//            'numero_funcionario' => ['required', 'string', 'max:50', 'unique:reguladores,numero_funcionario'],
//            'cargo'              => ['required', 'string', 'max:100'],
//            'departamento'       => ['required', 'string', 'max:100'],
//            'email'              => ['required', 'email', 'unique:reguladores,email'],
//            'telefone'           => ['nullable', 'string', 'max:20'],
//            'password'           => ['required', 'confirmed', Password::min(8)],
//        ]);
//
//        Regulador::create([
//            'nome'               => $request->nome,
//            'apelido'            => $request->apelido,
//            'numero_funcionario' => $request->numero_funcionario,
//            'cargo'              => $request->cargo,
//            'departamento'       => $request->departamento,
//            'email'              => $request->email,
//            'telefone'           => $request->telefone,
//            'password'           => $request->password,
//            'aprovado'           => false, // must be approved by admin
//        ]);
//
//        // Do NOT log them in — account needs admin approval first
//        return redirect()->route('regulador.login')
//                         ->with('sucesso', 'Pedido de acesso submetido! Receberá um email de confirmação em até 24 horas.');
//    }
//
//    // ── LOGIN ─────────────────────────────────────────────────
//
//    public function showLogin()
//    {
//        return view('login');
//    }
//
//    public function login(Request $request)
//    {
//        $request->validate([
//            'email'    => ['required', 'email'],
//            'password' => ['required'],
//            'codigo'   => ['required', 'string', 'size:6'],
//        ]);
//
//        $credentials = $request->only('email', 'password');
//        $remember    = $request->boolean('remember');
//
//        if (Auth::guard('regulador')->attempt($credentials, $remember)) {
//            $request->session()->regenerate();
//
//            $regulador = Auth::guard('regulador')->user();
//
//            // Block if not yet approved by admin
//            if (! $regulador->aprovado) {
//                Auth::guard('regulador')->logout();
//                return back()->withErrors([
//                    'email' => 'A sua conta ainda não foi aprovada pela administração da DGPDC.',
//                ]);
//            }
//
//            // Block if deactivated
//            if (! $regulador->ativo) {
//                Auth::guard('regulador')->logout();
//                return back()->withErrors([
//                    'email' => 'A sua conta está desativada. Contacte o administrador.',
//                ]);
//            }
//
//            // Verify 2FA code
//            if (! $this->verificar2FA($regulador, $request->codigo)) {
//                Auth::guard('regulador')->logout();
//                return back()->withErrors([
//                    'codigo' => 'Código de verificação inválido.',
//                ])->onlyInput('email');
//            }
//
//            return redirect()->intended(route('dashboard.regulator'));
//        }
//
//        return back()->withErrors([
//            'email' => 'Email ou palavra-passe incorretos.',
//        ])->onlyInput('email');
//    }
//
//    // ── LOGOUT ────────────────────────────────────────────────
//
//    public function logout(Request $request)
//    {
//        Auth::guard('regulador')->logout();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();
//
//        return redirect()->route('regulador.login')
//                         ->with('sucesso', 'Sessão terminada com sucesso.');
//    }
//
//    // ── 2FA ───────────────────────────────────────────────────
//
//    /**
//     * Verifies the 6-digit TOTP code.
//     * Uses a simple time-based window — replace with
//     * a proper TOTP library (e.g. pragmarx/google2fa) in production.
//     */
//    private function verificar2FA(Regulador $regulador, string $codigo): bool
//    {
//        // If no 2FA secret is set yet, accept any code (first login)
//        // In production, force 2FA setup on first login
//        if (is_null($regulador->two_factor_secret)) {
//            return true;
//        }
//
//        // Strip spaces from the code entered e.g. "123 456" → "123456"
//        $codigo = str_replace(' ', '', $codigo);
//
//        // TODO: integrate pragmarx/google2fa:
//        // $google2fa = new \PragmaRX\Google2FA\Google2FA();
//        // return $google2fa->verifyKey($regulador->two_factor_secret, $codigo);
//
//        // Placeholder — always valid until library is installed
//        return strlen($codigo) === 6 && ctype_digit($codigo);
//    }
//}


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Regulador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class ReguladorAuthController extends Controller
{
    // ── REGISTER ──────────────────────────────────────────────

    public function showRegister()
    {
        return view('register_regulator');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'apelido' => ['required', 'string', 'max:100'],
            'numero_funcionario' => ['required', 'string', 'max:50', 'unique:reguladores,numero_funcionario'],
            'cargo' => ['required', 'string', 'max:100'],
            'departamento' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:reguladores,email'],
            'telefone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        Regulador::create([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'numero_funcionario' => $request->numero_funcionario,
            'cargo' => $request->cargo,
            'departamento' => $request->departamento,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'password' => $request->password,
            'aprovado' => false, // must be approved by admin
        ]);

        // Do NOT log them in — account needs admin approval first
        return redirect()->route('regulador.login')
            ->with('sucesso', 'Pedido de acesso submetido! Receberá um email de confirmação em até 24 horas.');
    }

    // ── LOGIN ─────────────────────────────────────────────────

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // ── DEV BYPASS ───────────────────────────────────────────
        // When APP_ENV=local the 2FA field is optional and any value
        // (or empty) is accepted. Set APP_ENV=production to enforce it.
        $devMode = app()->environment('local');

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'codigo' => $devMode ? ['nullable', 'string'] : ['required', 'string', 'size:6'],
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::guard('regulador')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $regulador = Auth::guard('regulador')->user();

            // Block if not yet approved by admin
            if (!$regulador->aprovado) {
                Auth::guard('regulador')->logout();
                return back()->withErrors([
                    'email' => 'A sua conta ainda não foi aprovada pela administração da DGPDC.',
                ]);
            }

            // Block if deactivated
            if (!$regulador->ativo) {
                Auth::guard('regulador')->logout();
                return back()->withErrors([
                    'email' => 'A sua conta está desativada. Contacte o administrador.',
                ]);
            }

            // Skip 2FA check entirely in local/dev environment
            if (!$devMode) {
                if (!$this->verificar2FA($regulador, $request->codigo ?? '')) {
                    Auth::guard('regulador')->logout();
                    return back()->withErrors([
                        'codigo' => 'Código de verificação inválido.',
                    ])->onlyInput('email');
                }
            }

            return redirect()->intended(route('dashboard.regulator'));
        }

        return back()->withErrors([
            'email' => 'Email ou palavra-passe incorretos.',
        ])->onlyInput('email');
    }

    // ── LOGOUT ────────────────────────────────────────────────

    public function logout(Request $request)
    {
        Auth::guard('regulador')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('regulador.login')
            ->with('sucesso', 'Sessão terminada com sucesso.');
    }

    // ── 2FA ───────────────────────────────────────────────────

    /**
     * Verifies the 6-digit TOTP code.
     * Uses a simple time-based window — replace with
     * a proper TOTP library (e.g. pragmarx/google2fa) in production.
     */
    private function verificar2FA(Regulador $regulador, string $codigo): bool
    {
        // If no 2FA secret is set yet, accept any code (first login)
        // In production, force 2FA setup on first login
        if (is_null($regulador->two_factor_secret)) {
            return true;
        }

        // Strip spaces from the code entered e.g. "123 456" → "123456"
        $codigo = str_replace(' ', '', $codigo);

        // TODO: integrate pragmarx/google2fa:
        // $google2fa = new \PragmaRX\Google2FA\Google2FA();
        // return $google2fa->verifyKey($regulador->two_factor_secret, $codigo);

        // Placeholder — always valid until library is installed
        return strlen($codigo) === 6 && ctype_digit($codigo);
    }
}

