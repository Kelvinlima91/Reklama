<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Empresa – Reklama Cabo Verde</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Sora', 'sans-serif'],
                    },
                    colors: {
                        cv: {
                            blue:  '#1B4FD8',
                            green: '#0F9B58',
                            red:   '#D32F2F',
                            navy:  '#0D1B3E',
                        }
                    },
                    animation: {
                        'fade-up': 'fadeUp 0.6s ease both',
                        'fade-in': 'fadeIn 0.5s ease both',
                    },
                    keyframes: {
                        fadeUp: { '0%': { opacity: '0', transform: 'translateY(24px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }
        .blob { position: absolute; border-radius: 9999px; filter: blur(80px); opacity: 0.15; pointer-events: none; }
        .pattern-dots { background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 1px); background-size: 24px 24px; }

        .input-field {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 3rem;
            background: white;
            border: 1.5px solid #E5E7EB;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            color: #0D1B3E;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            font-family: 'Inter', sans-serif;
        }
        .input-field:focus { border-color: #0F9B58; box-shadow: 0 0 0 3px rgba(15,155,88,0.12); }
        .input-field::placeholder { color: #9CA3AF; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #0F9B58; border-radius: 3px; }
    </style>
</head>

<body class="font-sans antialiased min-h-screen">

<div class="min-h-screen flex">

    {{-- ═══════════ LEFT PANEL ═══════════ --}}
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-cv-navy pattern-dots flex-col justify-between p-14">

        <div class="blob w-96 h-96 bg-cv-green top-0 -left-20"></div>
        <div class="blob w-64 h-64 bg-cv-blue bottom-10 right-0"></div>
        <div class="blob w-48 h-48 bg-cv-red top-1/2 right-10 opacity-10"></div>

        {{-- Logo --}}
        <a href="/" class="relative z-10 hover:opacity-85 transition-opacity inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 60" width="200" height="36">
                <rect x="0" y="0" width="52" height="56" rx="6" fill="white" opacity="0.15"/>
                <polygon points="36,0 52,16 36,16" fill="#1B4FD8"/>
                <polygon points="36,0 52,16 52,0" fill="#0F9B58"/>
                <rect x="0" y="50" width="52" height="5" rx="2.5" fill="#0F9B58"/>
                <text x="26" y="40" text-anchor="middle" font-family="Sora,sans-serif" font-size="9" font-weight="800" fill="white" letter-spacing="0.4">reklama</text>
                <circle cx="62" cy="12" r="14" fill="#D32F2F"/>
                <rect x="58.5" y="4" width="7" height="10" rx="3.5" fill="white"/>
                <circle cx="62" cy="20" r="3.5" fill="white"/>
                <text x="86" y="36" font-family="Sora,sans-serif" font-size="28" font-weight="800" fill="white">reklama</text>
                <text x="88" y="52" font-family="Inter,sans-serif" font-size="9" font-weight="600" fill="#93C5FD" letter-spacing="2.5">CABO VERDE</text>
            </svg>
        </a>

        {{-- Center --}}
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-cv-green/20 border border-cv-green/30 rounded-full text-xs text-green-300 font-semibold mb-6">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                Área Reservada a Empresas
            </div>
            <h2 class="font-display text-4xl xl:text-5xl font-extrabold text-white leading-[1.15] mb-6">
                Gira as suas<br>
                <span class="text-cv-green">reclamações</span><br>
                com eficiência.
            </h2>
            <p class="text-blue-200 text-base leading-relaxed mb-10 max-w-sm">
                Aceda ao painel da sua empresa, responda a reclamações dentro dos prazos legais e mantenha a sua reputação.
            </p>

            {{-- Stats --}}
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-white/8 backdrop-blur-sm rounded-2xl p-4 border border-white/10">
                    <div class="font-display text-2xl font-extrabold text-white mb-0.5">318</div>
                    <div class="text-blue-300 text-xs">Empresas</div>
                </div>
                <div class="bg-white/8 backdrop-blur-sm rounded-2xl p-4 border border-white/10">
                    <div class="font-display text-2xl font-extrabold text-cv-green mb-0.5">48h</div>
                    <div class="text-blue-300 text-xs">Prazo legal</div>
                </div>
                <div class="bg-white/8 backdrop-blur-sm rounded-2xl p-4 border border-white/10">
                    <div class="font-display text-2xl font-extrabold text-white mb-0.5">98%</div>
                    <div class="text-blue-300 text-xs">Conformidade</div>
                </div>
            </div>
        </div>

        {{-- Bottom badge --}}
        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 border border-white/15 rounded-full text-xs text-blue-200">
                <svg class="w-3.5 h-3.5 text-cv-green" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                Plataforma Oficial · Governo de Cabo Verde
            </div>
        </div>
    </div>

    {{-- ═══════════ RIGHT PANEL ═══════════ --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-gray-50 relative overflow-hidden px-6 py-12">

        <div class="blob w-72 h-72 bg-cv-green top-0 right-0 opacity-5"></div>
        <div class="blob w-48 h-48 bg-cv-blue bottom-0 left-0 opacity-5"></div>

        <div class="relative w-full max-w-md animate-fade-up">

            {{-- Mobile logo --}}
            <div class="lg:hidden mb-10 text-center">
                <a href="/" class="inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 60" width="180" height="32">
                        <rect x="0" y="0" width="52" height="56" rx="6" fill="#0D1B3E"/>
                        <polygon points="36,0 52,16 36,16" fill="#1B4FD8"/>
                        <polygon points="36,0 52,16 52,0" fill="#0F9B58"/>
                        <rect x="0" y="50" width="52" height="5" rx="2.5" fill="#0F9B58"/>
                        <text x="26" y="40" text-anchor="middle" font-family="Sora,sans-serif" font-size="9" font-weight="800" fill="white" letter-spacing="0.4">reklama</text>
                        <circle cx="62" cy="12" r="14" fill="#D32F2F"/>
                        <rect x="58.5" y="4" width="7" height="10" rx="3.5" fill="white"/>
                        <circle cx="62" cy="20" r="3.5" fill="white"/>
                        <text x="86" y="36" font-family="Sora,sans-serif" font-size="28" font-weight="800" fill="#0D1B3E">reklama</text>
                        <text x="88" y="52" font-family="Inter,sans-serif" font-size="9" font-weight="600" fill="#1B4FD8" letter-spacing="2.5">CABO VERDE</text>
                    </svg>
                </a>
            </div>

            {{-- Card --}}
            <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/60 p-8 sm:p-10">

                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-green-50 border border-green-200 rounded-full text-xs text-cv-green font-semibold mb-6">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                    Acesso Empresarial
                </div>

                {{-- Heading --}}
                <div class="mb-8">
                    <h1 class="font-display text-3xl font-extrabold text-cv-navy mb-2">Bem-vinda de volta</h1>
                    <p class="text-gray-500 text-sm">Entre com as credenciais da sua empresa</p>
                </div>

                {{-- Errors --}}
                @if ($errors->any())
                    <div class="mb-5 p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-600">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if (session('sucesso'))
                    <div class="mb-5 p-4 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700">
                        {{ session('sucesso') }}
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('empresa.login.post') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email Institucional</label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   placeholder="empresa@exemplo.cv"
                                   class="input-field @error('email') border-red-400 @enderror">
                        </div>
                        @error('email') <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Password --}}
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-semibold text-gray-700">Palavra-passe</label>
                            <a href="#" class="text-xs text-cv-green hover:underline font-medium">Esqueceu?</a>
                        </div>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input type="password" name="password" placeholder="••••••••"
                                   class="input-field @error('password') border-red-400 @enderror">
                            <button type="button" onclick="togglePassword(this)"
                                    class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Remember --}}
                    <div class="flex items-center gap-2.5">
                        <input type="checkbox" name="remember" id="remember"
                               class="w-4 h-4 rounded border-gray-300 cursor-pointer accent-green-600">
                        <label for="remember" class="text-sm text-gray-600 cursor-pointer select-none">Lembrar-me neste dispositivo</label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="w-full py-3.5 bg-cv-green text-white font-display font-bold text-base rounded-xl hover:bg-green-700 hover:-translate-y-0.5 shadow-md shadow-green-200 transition-all duration-200 mt-2">
                        Entrar como Empresa
                    </button>

                </form>

                {{-- Register link --}}
                <p class="mt-8 text-center text-sm text-gray-500">
                    A sua empresa ainda não está registada?
                    <a href="{{ route('empresa.register') }}" class="text-cv-green font-semibold hover:underline ml-1">Registar empresa</a>
                </p>
            </div>

            {{-- Back --}}
            <p class="mt-6 text-center">
                <a href="/" class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-cv-green transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Voltar à Página Inicial
                </a>
            </p>
        </div>
    </div>
</div>

<script>
    function togglePassword(btn) {
        const input = btn.closest('.relative').querySelector('input');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
</body>
</html>
