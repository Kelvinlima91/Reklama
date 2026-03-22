<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar – Reklama Cabo Verde</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans:    ['DM Sans', 'sans-serif'],
                        display: ['Sora', 'sans-serif'],
                    },
                    colors: {
                        cv: { blue: '#1B4FD8', green: '#0F9B58', red: '#D32F2F', navy: '#0D1B3E' }
                    },
                    animation: { 'fade-up': 'fadeUp 0.5s ease both' },
                    keyframes: { fadeUp: { '0%': { opacity: '0', transform: 'translateY(16px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } } }
                }
            }
        }
    </script>

    <style>
        :root { --accent: #1B4FD8; --accent-shadow: rgba(27,79,216,0.18); }

        .input-field {
            width: 100%; padding: 0.875rem 1rem 0.875rem 3rem;
            background: white; border: 1.5px solid #E5E7EB; border-radius: 0.875rem;
            font-size: 0.875rem; color: #0D1B3E; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            font-family: 'DM Sans', sans-serif;
        }
        .input-field:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-shadow);
        }
        .input-field::placeholder { color: #9CA3AF; }
        .input-field.error { border-color: #D32F2F; }

        .role-tab {
            flex: 1; padding: 0.55rem 0.25rem; border-radius: 0.5rem;
            font-size: 0.78rem; font-weight: 600; color: #9CA3AF;
            cursor: pointer; transition: all 0.2s; text-align: center;
            border: none; background: transparent;
            font-family: 'DM Sans', sans-serif;
        }
        .role-tab.active {
            background: white; color: var(--accent);
            box-shadow: 0 1px 4px rgba(0,0,0,0.09);
        }

        .btn-submit {
            width: 100%; padding: 0.9rem;
            background: var(--accent); color: white;
            font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.9375rem;
            border-radius: 0.875rem; border: none; cursor: pointer;
            transition: filter 0.2s, transform 0.15s;
            box-shadow: 0 4px 14px var(--accent-shadow);
        }
        .btn-submit:hover { filter: brightness(1.08); transform: translateY(-1px); }

        @keyframes popIn {
            from { opacity: 0; transform: scale(0.95) translateY(10px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #E5E7EB; border-radius: 3px; }
    </style>
</head>

<body class="font-sans antialiased min-h-screen bg-gray-50 flex items-center justify-center px-4 py-12">

{{-- ═══ FORGOT PASSWORD MODAL (outside card, at body level) ═══ --}}
<div id="forgot-modal"
     style="display:none; position:fixed; inset:0; z-index:999; background:rgba(13,27,62,0.5);
            align-items:center; justify-content:center; padding:1rem;">
    <div style="background:white; border-radius:1.25rem; padding:2rem; width:100%; max-width:360px;
                box-shadow:0 24px 60px rgba(0,0,0,0.18); animation:popIn .25s ease;">

        {{-- Icon --}}
        <div style="width:46px; height:46px; background:#EFF6FF; border-radius:12px;
                    display:flex; align-items:center; justify-content:center; margin-bottom:1.25rem;">
            <svg style="width:22px;height:22px;" fill="none" stroke="#1B4FD8" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
            </svg>
        </div>

        {{-- Title --}}
        <h2 style="font-family:'Sora',sans-serif; font-size:1.1rem; font-weight:700; color:#0D1B3E; margin:0 0 .375rem;">
            Recuperar palavra-passe
        </h2>
        <p style="font-size:0.8125rem; color:#9CA3AF; margin:0 0 1.5rem; line-height:1.65;">
            Introduza o seu email e enviaremos um link para criar uma nova palavra-passe.
        </p>

        {{-- Email field --}}
        <div style="margin-bottom:1rem;">
            <label style="display:block; font-size:0.7rem; font-weight:600; color:#6B7280;
                           text-transform:uppercase; letter-spacing:.06em; margin-bottom:.5rem;">
                Email
            </label>
            <div style="position:relative;">
                <div style="position:absolute; left:.875rem; top:50%; transform:translateY(-50%);
                            color:#D1D5DB; pointer-events:none;">
                    <svg style="width:16px;height:16px;" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <input id="forgot-email" type="email" placeholder="seu@email.com"
                       style="width:100%; padding:.8rem 1rem .8rem 2.75rem; border:1.5px solid #E5E7EB;
                              border-radius:.75rem; font-size:.875rem; color:#0D1B3E; outline:none;
                              font-family:'DM Sans',sans-serif; box-sizing:border-box; transition:border-color .2s;">
            </div>
        </div>

        {{-- Success message --}}
        <div id="forgot-success"
             style="display:none; background:#F0FDF4; border:1.5px solid #BBF7D0; border-radius:.75rem;
                    padding:.875rem 1rem; font-size:.8125rem; color:#15803D; margin-bottom:1rem;
                    align-items:center; gap:.5rem;">
            <svg style="width:16px;height:16px;flex-shrink:0;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Link enviado! Verifique o seu email.</span>
        </div>

        {{-- Buttons --}}
        <div style="display:flex; gap:.75rem; margin-top:.25rem;">
            <button onclick="closeForgot()"
                    style="flex:1; padding:.8rem; border:1.5px solid #E5E7EB; border-radius:.75rem;
                           font-size:.875rem; font-weight:600; color:#6B7280; background:white;
                           cursor:pointer; font-family:'DM Sans',sans-serif;">
                Cancelar
            </button>
            <button id="forgot-btn" onclick="submitForgot()"
                    style="flex:1; padding:.8rem; border:none; border-radius:.75rem; font-size:.875rem;
                           font-weight:700; color:white; background:var(--accent,#1B4FD8);
                           cursor:pointer; font-family:'Sora',sans-serif;">
                Enviar link
            </button>
        </div>

    </div>
</div>

{{-- ═══ MAIN CONTENT ═══ --}}
<div class="w-full max-w-sm animate-fade-up">

    {{-- Logo --}}
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="inline-block mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 420 200" width="160" height="76">
                <path d="M30 62 L30 148 Q30 156 38 158 L105 162" stroke="#1B4FD8" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M180 62 L180 148 Q180 156 172 158 L105 162" stroke="#1B4FD8" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M38 54 Q38 46 46 45 L105 42 L105 158 Q72 155 46 158 Q38 159 38 152 Z" fill="white" stroke="#1B4FD8" stroke-width="4.5" stroke-linejoin="round"/>
                <path d="M172 54 Q172 46 164 45 L105 42 L105 158 Q138 155 164 158 Q172 159 172 152 Z" fill="white" stroke="#1B4FD8" stroke-width="4.5" stroke-linejoin="round"/>
                <path d="M38 152 Q70 168 105 170 Q140 168 172 152" stroke="#1B4FD8" stroke-width="4.5" fill="none" stroke-linecap="round"/>
                <path d="M105 42 Q102 100 105 170" stroke="#1B4FD8" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                <path d="M49 64 Q76 62 100 64"    stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.28"/>
                <path d="M48 76 Q75 74 100 76"    stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.28"/>
                <path d="M47 88 Q75 86 100 88"    stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.28"/>
                <path d="M47 100 Q75 98 100 100"  stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.22"/>
                <path d="M110 64 Q120 62 128 64"  stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.28"/>
                <path d="M110 76 Q120 74 128 76"  stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.28"/>
                <path d="M110 88 Q120 86 128 88"  stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.28"/>
                <path d="M110 100 Q120 98 128 100" stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.22"/>
                <path d="M148 64 Q158 62 163 64"  stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.28"/>
                <path d="M148 76 Q158 74 163 76"  stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.28"/>
                <path d="M148 88 Q158 86 163 88"  stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.28"/>
                <path d="M148 100 Q158 98 163 100" stroke="#1B4FD8" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.22"/>
                <rect x="131" y="62" width="14" height="54" rx="7" fill="#D32F2F"/>
                <circle cx="138" cy="130" r="9" fill="#D32F2F"/>
                <text x="200" y="110" font-family="Sora,sans-serif" font-size="52" font-weight="800" fill="#0D1B3E">reklama</text>
                <text x="202" y="138" font-family="Inter,sans-serif" font-size="11" font-weight="600" fill="#1B4FD8" letter-spacing="4">CABO VERDE</text>
            </svg>
        </a>
        <p class="text-xs text-gray-400 tracking-wide">Plataforma oficial de reclamações</p>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-7">

        {{-- Role tabs --}}
        <div class="flex gap-1 p-1 bg-gray-100 rounded-xl mb-6">
            <button class="role-tab active" onclick="setRole('user')"      id="tab-user">Consumidor</button>
            <button class="role-tab"        onclick="setRole('empresa')"   id="tab-empresa">Empresa</button>
            <button class="role-tab"        onclick="setRole('regulador')" id="tab-regulador">Regulador</button>
        </div>

        {{-- Alerts --}}
        @if ($errors->any())
            <div class="mb-5 p-3.5 bg-red-50 border border-red-200 rounded-xl text-xs text-red-600 flex items-start gap-2">
                <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('sucesso'))
            <div class="mb-5 p-3.5 bg-green-50 border border-green-200 rounded-xl text-xs text-green-700">
                {{ session('sucesso') }}
            </div>
        @endif

        @if (session('aviso'))
            <div class="mb-5 p-3.5 bg-yellow-50 border border-yellow-200 rounded-xl text-xs text-yellow-700">
                {{ session('aviso') }}
            </div>
        @endif

        {{-- Heading --}}
        <h1 class="font-display text-xl font-bold text-cv-navy mb-0.5" id="form-title">Bem-vindo ao Reklama</h1>
        <p class="text-xs text-gray-400 mb-6" id="form-subtitle">Entre na sua conta para continuar</p>

        {{-- Form --}}
        <form method="POST" action="{{ route('login.post') }}" id="login-form" class="space-y-4">
            @csrf
            <input type="hidden" name="role" id="role-input" value="user">

            {{-- Email --}}
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Email</label>
                <div class="relative">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-300 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}"
                           placeholder="seu@email.com"
                           class="input-field {{ $errors->has('email') ? 'error' : '' }}">
                </div>
                @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            {{-- Password --}}
            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Palavra-passe</label>
                    <a href="#" id="forgot-link" class="text-xs font-medium hover:underline" style="color:var(--accent)">Esqueceu?</a>
                </div>
                <div class="relative">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-300 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input type="password" name="password" id="password-input" placeholder="••••••••"
                           class="input-field {{ $errors->has('password') ? 'error' : '' }}">
                    <button type="button" onclick="togglePassword()"
                            class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-300 hover:text-gray-500 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </button>
                </div>
            </div>

            {{-- 2FA (regulador only) --}}
            <div id="field-2fa" class="hidden">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Código 2FA</label>
                <div class="relative">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-300 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <input type="text" name="codigo" placeholder="123 456"
                           maxlength="7" class="input-field font-mono tracking-widest">
                </div>
                <p class="text-xs text-gray-400 mt-1">Código da sua aplicação autenticadora.</p>
            </div>

            {{-- Remember --}}
            <div class="flex items-center gap-2 pt-0.5">
                <input type="checkbox" name="remember" id="remember"
                       class="w-3.5 h-3.5 rounded border-gray-300 cursor-pointer"
                       style="accent-color: var(--accent)">
                <label for="remember" class="text-xs text-gray-400 cursor-pointer select-none">Lembrar-me</label>
            </div>

            {{-- Submit --}}
            <div class="pt-1">
                <button type="submit" class="btn-submit">Entrar</button>
            </div>

        </form>
    </div>

    {{-- Bottom links --}}
    <div class="mt-5 text-center space-y-2.5">
        <p class="text-sm text-gray-400">
            Não tem conta?
            <a href="{{ route('register') }}" id="register-link"
               class="font-semibold hover:underline" style="color:var(--accent)">
                Criar conta
            </a>
        </p>
        <a href="{{ route('home') }}"
           class="inline-flex items-center gap-1.5 text-xs text-gray-300 hover:text-gray-500 transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Voltar à Página Inicial
        </a>
    </div>

</div>

<script>
    const roles = {
        user: {
            accent:       '#1B4FD8',
            shadow:       'rgba(27,79,216,0.18)',
            title:        'Bem-vindo ao Reklama',
            subtitle:     'Entre na sua conta para continuar',
            action:       '{{ route("login.post") }}',
            register:     '{{ route("register") }}',
            registerText: 'Criar conta',
            show2fa:      false,
        },
        empresa: {
            accent:       '#0F9B58',
            shadow:       'rgba(15,155,88,0.18)',
            title:        'Acesso Empresarial',
            subtitle:     'Entre com as credenciais da sua empresa',
            action:       '{{ route("empresa.login.post") }}',
            register:     '{{ route("empresa.register") }}',
            registerText: 'Registar empresa',
            show2fa:      false,
        },
        regulador: {
            accent:       '#D32F2F',
            shadow:       'rgba(211,47,47,0.18)',
            title:        'Acesso Regulador',
            subtitle:     'Área reservada à DGPDC',
            action:       '{{ route("regulador.login.post") }}',
            register:     '{{ route("regulador.register") }}',
            registerText: 'Solicitar acesso',
            show2fa:      true,
        },
    };

    function setRole(role) {
        const cfg = roles[role];
        document.documentElement.style.setProperty('--accent', cfg.accent);
        document.documentElement.style.setProperty('--accent-shadow', cfg.shadow);

        ['user', 'empresa', 'regulador'].forEach(r =>
            document.getElementById('tab-' + r).classList.toggle('active', r === role)
        );

        document.getElementById('form-title').textContent    = cfg.title;
        document.getElementById('form-subtitle').textContent = cfg.subtitle;
        document.getElementById('login-form').action         = cfg.action;
        document.getElementById('role-input').value          = role;

        const twofa = document.getElementById('field-2fa');
        twofa.classList.toggle('hidden', !cfg.show2fa);
        twofa.querySelector('input').required = cfg.show2fa;

        const reg = document.getElementById('register-link');
        reg.href        = cfg.register;
        reg.textContent = cfg.registerText;
    }

    function togglePassword() {
        const input = document.getElementById('password-input');
        input.type = input.type === 'password' ? 'text' : 'password';
    }

    // ── Forgot password modal ──────────────────────────────────
    document.getElementById('forgot-link').addEventListener('click', function(e) {
        e.preventDefault();
        // Pre-fill email if already typed
        const typed = document.querySelector('input[name="email"]').value;
        if (typed) document.getElementById('forgot-email').value = typed;
        // Reset modal state
        document.getElementById('forgot-success').style.display = 'none';
        const btn = document.getElementById('forgot-btn');
        btn.textContent = 'Enviar link';
        btn.disabled    = false;
        btn.style.display = '';
        document.getElementById('forgot-email').style.borderColor = '#E5E7EB';
        // Show modal
        document.getElementById('forgot-modal').style.display = 'flex';
        setTimeout(() => document.getElementById('forgot-email').focus(), 100);
    });

    function closeForgot() {
        document.getElementById('forgot-modal').style.display = 'none';
    }

    function submitForgot() {
        const emailInput = document.getElementById('forgot-email');
        const email      = emailInput.value.trim();
        if (!email || !email.includes('@')) {
            emailInput.style.borderColor = '#D32F2F';
            emailInput.focus();
            return;
        }
        emailInput.style.borderColor = '#E5E7EB';
        const btn = document.getElementById('forgot-btn');
        btn.textContent = 'A enviar...';
        btn.disabled    = true;
        setTimeout(() => {
            btn.style.display = 'none';
            const success = document.getElementById('forgot-success');
            success.style.display = 'flex';
            setTimeout(() => closeForgot(), 2500);
        }, 1000);
    }

    // Close on backdrop click
    document.getElementById('forgot-modal').addEventListener('click', function(e) {
        if (e.target === this) closeForgot();
    });

    // Close on Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeForgot();
    });

    setRole('user');
</script>

</body>
</html>
