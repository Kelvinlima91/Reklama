<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro de Reclamações Eletrónico – Cabo Verde</title>

    {{-- Tailwind CSS CDN (replace with compiled asset in production) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
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
                        'fade-up':   'fadeUp 0.6s ease both',
                        'fade-in':   'fadeIn 0.4s ease both',
                        'bounce-y':  'bounceY 1.6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeUp:  { '0%': { opacity: '0', transform: 'translateY(20px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                        fadeIn:  { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        bounceY: { '0%,100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-8px)' } },
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }

        .noise::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        .reveal { opacity: 0; transform: translateY(28px); transition: opacity .6s ease, transform .6s ease; }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        .blob {
            position: absolute;
            border-radius: 9999px;
            filter: blur(72px);
            opacity: 0.18;
            pointer-events: none;
        }

        .nav-link { position: relative; }
        .nav-link::after {
            content: '';
            position: absolute;
            left: 0; bottom: -3px;
            width: 0; height: 2px;
            background: #1B4FD8;
            transition: width .3s ease;
        }
        .nav-link:hover::after { width: 100%; }

        .step-connector { position: relative; }
        .step-connector:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 28px; left: calc(50% + 28px);
            width: calc(100% - 56px);
            height: 2px;
            background: linear-gradient(to right, #1B4FD8, #0F9B58);
            opacity: 0.25;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #1B4FD8; border-radius: 3px; }
    </style>
</head>

<body class="font-sans bg-white text-gray-900 antialiased">

{{-- ═══════════════════════════════════════════════
     HEADER / NAVBAR
═══════════════════════════════════════════════ --}}
<header id="header" class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-md shadow-sm z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- Logo — new open book (colored) --}}
            <a href="#inicio" class="flex items-center hover:opacity-85 transition-opacity">
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

            {{-- Desktop Nav --}}
            <nav class="hidden md:flex items-center gap-7">
                @foreach([
                    ['inicio',    'Página Inicial'],
                    ['quem-somos','Quem Somos'],
                    ['direitos',  'Direitos'],
                    ['legislacao','Legislação'],
                    ['contato',   'Contato'],
                ] as [$id, $label])
                    <a href="#{{ $id }}" class="nav-link text-sm font-medium text-gray-600 hover:text-cv-blue transition-colors">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>

            {{-- CTA --}}
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}"
                   class="hidden sm:flex items-center gap-2 px-4 py-2 text-sm font-semibold text-cv-blue border-2 border-cv-blue rounded-lg hover:bg-cv-blue hover:text-white transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Entrar
                </a>

                <button type="button" id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <svg id="icon-menu" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="icon-close" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="md:hidden hidden border-t border-gray-100 pb-4 pt-2">
            <nav class="flex flex-col gap-1">
                @foreach([
                    ['inicio',    'Página Inicial'],
                    ['quem-somos','Quem Somos'],
                    ['direitos',  'Direitos do Consumidor'],
                    ['legislacao','Legislação'],
                    ['contato',   'Contato'],
                ] as [$id, $label])
                    <a href="#{{ $id }}"
                       class="mobile-nav-link px-3 py-2.5 text-sm font-medium text-gray-700 hover:text-cv-blue hover:bg-blue-50 rounded-lg transition-colors">
                        {{ $label }}
                    </a>
                @endforeach
                <button type="button" class="mt-2 mx-3 py-2.5 bg-cv-blue text-white text-sm font-semibold rounded-lg">
                    Entrar
                </button>
            </nav>
        </div>
    </div>
</header>


{{-- ═══════════════════════════════════════════════
     HERO
═══════════════════════════════════════════════ --}}
<section id="inicio" class="relative overflow-hidden pt-20">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-green-50"></div>
    <div class="blob w-96 h-96 bg-cv-blue top-10 -left-24"></div>
    <div class="blob w-72 h-72 bg-cv-green bottom-10 right-0"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="text-center max-w-4xl mx-auto">

            <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-blue-100 text-cv-blue text-xs font-semibold rounded-full uppercase tracking-wider mb-6 animate-fade-in">
                <span class="w-2 h-2 bg-cv-blue rounded-full animate-pulse"></span>
                Plataforma Oficial · República de Cabo Verde
            </span>

            <h1 class="font-display text-5xl md:text-6xl lg:text-7xl font-extrabold text-cv-navy leading-[1.1] mb-6 animate-fade-up">
                Livro de Reclamações<br>
                <span class="text-cv-blue">Eletrónico</span>
            </h1>

            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto mb-10 animate-fade-up" style="animation-delay:.1s">
                Plataforma oficial para registar reclamações sobre serviços prestados.
                Protegemos e defendemos os seus direitos como consumidor.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-up" style="animation-delay:.2s">
                <button type="button"
                        class="w-full sm:w-auto px-10 py-4 bg-cv-red text-white text-base font-bold rounded-xl shadow-lg shadow-red-200 hover:bg-red-700 hover:-translate-y-0.5 transition-all duration-200">
                    Fazer uma Reclamação
                </button>
                <button type="button"
                        class="w-full sm:w-auto px-10 py-4 bg-white text-cv-navy text-base font-bold rounded-xl border-2 border-gray-200 hover:border-cv-blue hover:text-cv-blue hover:-translate-y-0.5 transition-all duration-200">
                    Saber Mais
                </button>
            </div>

            <div class="mt-16 grid grid-cols-3 gap-6 max-w-2xl mx-auto animate-fade-up" style="animation-delay:.3s">
                @foreach([
                    ['12 000+', 'Reclamações registadas'],
                    ['98%',     'Taxa de resposta'],
                    ['48h',     'Tempo médio de resolução'],
                ] as [$num, $label])
                    <div class="text-center">
                        <div class="font-display text-3xl font-extrabold text-cv-navy">{{ $num }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ $label }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-20 grid md:grid-cols-3 gap-6">
            @foreach([
                ['cv-blue',  'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'Seguro e Oficial',     'Plataforma governamental oficial que garante a proteção legal dos seus direitos como consumidor.'],
                ['cv-green', 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2', 'Processo Simplificado','Registe a sua reclamação online de forma rápida, simples e sem burocracias desnecessárias.'],
                ['cv-red',   'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'Acompanhamento Total', 'Acompanhe em tempo real o estado da sua reclamação e receba notificações.'],
            ] as [$color, $path, $title, $desc])
                <div class="bg-white rounded-2xl p-7 shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 reveal">
                    <div class="w-12 h-12 rounded-xl bg-{{ $color }}/10 flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 text-{{ $color }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}"/>
                        </svg>
                    </div>
                    <h3 class="font-display font-bold text-lg text-cv-navy mb-2">{{ $title }}</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="relative pb-10 flex justify-center">
        <a href="#quem-somos" class="text-gray-400 hover:text-cv-blue transition-colors animate-bounce-y">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </a>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     QUEM SOMOS
═══════════════════════════════════════════════ --}}
<section id="quem-somos" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-bold text-cv-blue tracking-widest uppercase mb-3">A Nossa Identidade</p>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-cv-navy">Quem Somos</h2>
            <div class="mt-4 mx-auto w-16 h-1 bg-gradient-to-r from-cv-blue to-cv-green rounded-full"></div>
        </div>
        <div class="max-w-4xl mx-auto">
            <div class="relative bg-gradient-to-br from-blue-50 to-green-50 rounded-3xl p-10 mb-8 overflow-hidden reveal">
                <div class="blob w-48 h-48 bg-cv-blue -top-12 -right-12"></div>
                <p class="relative text-lg text-gray-700 leading-relaxed mb-5">
                    O Livro de Reclamações Eletrónico é uma iniciativa do Governo de Cabo Verde, gerida pela
                    <strong class="text-cv-navy">Direção-Geral de Proteção e Defesa do Consumidor</strong>, com o objetivo
                    de facilitar o acesso dos consumidores cabo-verdianos aos mecanismos de defesa dos seus direitos.
                </p>
                <p class="relative text-lg text-gray-700 leading-relaxed">
                    Através desta plataforma digital, pretendemos modernizar e tornar mais acessível o processo
                    de apresentação de reclamações, garantindo transparência, celeridade e eficácia na resolução
                    de conflitos entre consumidores e fornecedores de bens e serviços.
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="group bg-white border-2 border-blue-100 hover:border-cv-blue rounded-2xl p-7 transition-colors duration-200 reveal">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-cv-blue transition-colors">
                        <svg class="w-5 h-5 text-cv-blue group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                    </div>
                    <h3 class="font-display font-bold text-xl text-cv-blue mb-3">Nossa Missão</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Proteger e defender os direitos dos consumidores cabo-verdianos, promovendo relações equilibradas e justas no mercado de consumo.</p>
                </div>
                <div class="group bg-white border-2 border-green-100 hover:border-cv-green rounded-2xl p-7 transition-colors duration-200 reveal">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mb-4 group-hover:bg-cv-green transition-colors">
                        <svg class="w-5 h-5 text-cv-green group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <h3 class="font-display font-bold text-xl text-cv-green mb-3">Nossa Visão</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Ser uma referência na proteção ao consumidor, garantindo um mercado transparente e ético em todo o território nacional.</p>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     DIREITOS DO CONSUMIDOR
═══════════════════════════════════════════════ --}}
<section id="direitos" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-bold text-cv-green tracking-widest uppercase mb-3">O Que Lhe Pertence</p>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-cv-navy">Direitos do Consumidor</h2>
            <div class="mt-4 mx-auto w-16 h-1 bg-gradient-to-r from-cv-green to-cv-blue rounded-full"></div>
            <p class="mt-5 text-gray-500 max-w-2xl mx-auto">Conheça os seus direitos fundamentais como consumidor em Cabo Verde</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach([
                ['cv-blue',  'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'Proteção da Vida e Saúde', 'Direito a produtos e serviços que não apresentem riscos à saúde ou segurança.'],
                ['cv-blue',  'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'Informação Adequada', 'Direito a informação clara, precisa e em língua portuguesa sobre produtos e serviços.'],
                ['cv-blue',  'M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636', 'Proteção Contra Publicidade Enganosa', 'Direito a não ser enganado por práticas comerciais desleais ou abusivas.'],
                ['cv-green', 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z', 'Garantias e Assistência', 'Direito a reparação, substituição ou reembolso em caso de produtos defeituosos.'],
                ['cv-green', 'M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3', 'Acesso à Justiça', 'Direito a mecanismos eficazes de resolução de conflitos de consumo.'],
                ['cv-green', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'Educação para o Consumo', 'Direito a programas de educação e informação sobre consumo responsável.'],
            ] as [$color, $path, $title, $desc])
                <div class="group bg-white rounded-2xl p-6 shadow-sm hover:shadow-md border-l-4 border-{{ $color }} hover:-translate-y-1 transition-all duration-200 reveal">
                    <div class="flex items-start gap-4">
                        <div class="w-9 h-9 rounded-lg bg-{{ $color }}/10 flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:scale-110 transition-transform">
                            <svg class="w-5 h-5 text-{{ $color }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-display font-bold text-base text-cv-navy mb-1.5">{{ $title }}</h3>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $desc }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     LEGISLAÇÃO
═══════════════════════════════════════════════ --}}
<section id="legislacao" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-bold text-cv-red tracking-widest uppercase mb-3">Enquadramento Jurídico</p>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-cv-navy">Legislação</h2>
            <div class="mt-4 mx-auto w-16 h-1 bg-gradient-to-r from-cv-red to-cv-blue rounded-full"></div>
            <p class="mt-5 text-gray-500 max-w-2xl mx-auto">Enquadramento legal da proteção ao consumidor em Cabo Verde</p>
        </div>
        <div class="max-w-4xl mx-auto space-y-5">
            @foreach([
                ['cv-blue',  'M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3', 'Lei de Defesa do Consumidor', 'A Lei n.º 7/VIII/2011, de 14 de março, estabelece o regime jurídico da defesa do consumidor em Cabo Verde, definindo os direitos básicos dos consumidores e as obrigações dos fornecedores de bens e serviços.', 'Consultar legislação completa'],
                ['cv-green', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'Livro de Reclamações', 'O Decreto-Lei n.º 28/2015 regulamenta a obrigatoriedade do Livro de Reclamações para todos os estabelecimentos comerciais e de prestação de serviços, incluindo a modalidade eletrónica.', 'Consultar decreto-lei'],
                ['cv-red',   'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z', 'Práticas Comerciais Desleais', 'Legislação específica que proíbe práticas comerciais enganosas, agressivas ou que induzem o consumidor em erro, protegendo a transparência nas relações de consumo.', 'Ver mais informações'],
            ] as [$color, $iconPath, $title, $desc, $linkLabel])
                <div class="group flex items-start gap-6 bg-gradient-to-r from-{{ $color }}/5 to-white border border-{{ $color }}/20 hover:border-{{ $color }}/50 rounded-2xl p-7 transition-all duration-200 reveal">
                    <div class="w-12 h-12 rounded-xl bg-{{ $color }}/10 flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-{{ $color }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-lg text-cv-navy mb-2">{{ $title }}</h3>
                        <p class="text-sm text-gray-600 leading-relaxed mb-3">{{ $desc }}</p>
                        <button type="button" class="text-sm font-semibold text-{{ $color }} hover:underline">{{ $linkLabel }} →</button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-10 max-w-4xl mx-auto bg-blue-50 border border-blue-200 rounded-2xl p-7 reveal">
            <h3 class="font-display font-bold text-cv-navy mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-cv-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Importante Saber
            </h3>
            <ul class="space-y-2.5 text-sm text-gray-700">
                @foreach([
                    'Todas as empresas são obrigadas a ter Livro de Reclamações disponível',
                    'A reclamação deve ser processada e enviada às autoridades competentes em 48 horas',
                    'O consumidor tem direito a cópia da reclamação registada',
                    'As reclamações são analisadas pela entidade reguladora competente',
                ] as $item)
                    <li class="flex items-start gap-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-cv-blue mt-2 flex-shrink-0"></span>
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     COMO FUNCIONA
═══════════════════════════════════════════════ --}}
<section class="py-24 relative overflow-hidden bg-gradient-to-br from-cv-navy via-blue-900 to-cv-navy">
    <div class="blob w-80 h-80 bg-cv-blue top-0 left-0 opacity-30"></div>
    <div class="blob w-64 h-64 bg-cv-green bottom-0 right-0 opacity-20"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
            <p class="text-xs font-bold text-blue-300 tracking-widest uppercase mb-3">Passo a Passo</p>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-white">Como Funciona</h2>
            <div class="mt-4 mx-auto w-16 h-1 bg-gradient-to-r from-cv-blue to-cv-green rounded-full"></div>
        </div>
        <div class="grid md:grid-cols-4 gap-6 relative">
            @foreach([
                ['1', 'Registe-se',          'Crie a sua conta na plataforma com os seus dados pessoais'],
                ['2', 'Descreva o Problema', 'Preencha o formulário com os detalhes da sua reclamação'],
                ['3', 'Submeta',             'Envie a reclamação que será registada oficialmente'],
                ['4', 'Acompanhe',           'Receba atualizações sobre o processo de resolução'],
            ] as [$n, $title, $desc])
                <div class="step-connector text-center reveal">
                    <div class="relative inline-flex items-center justify-center w-14 h-14 rounded-full bg-cv-blue text-white font-display font-extrabold text-xl mb-5 shadow-lg shadow-blue-900/50">
                        {{ $n }}
                        <div class="absolute -inset-1 rounded-full border-2 border-blue-400/30"></div>
                    </div>
                    <h3 class="font-display font-bold text-white text-base mb-2">{{ $title }}</h3>
                    <p class="text-blue-200 text-sm leading-relaxed">{{ $desc }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-14 text-center reveal">
            <button type="button" class="px-12 py-4 bg-cv-red text-white font-display font-bold text-lg rounded-xl shadow-lg shadow-red-900/40 hover:bg-red-700 hover:-translate-y-0.5 transition-all duration-200">
                Fazer uma Reclamação
            </button>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     CONTATO
═══════════════════════════════════════════════ --}}
<section id="contato" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 reveal">
            <p class="text-xs font-bold text-cv-blue tracking-widest uppercase mb-3">Fale Connosco</p>
            <h2 class="font-display text-4xl md:text-5xl font-extrabold text-cv-navy">Contato</h2>
            <div class="mt-4 mx-auto w-16 h-1 bg-gradient-to-r from-cv-blue to-cv-green rounded-full"></div>
            <p class="mt-5 text-gray-500">Entre em contato connosco. Estamos aqui para ajudar.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            <div class="reveal">
                <h3 class="font-display font-bold text-2xl text-cv-navy mb-8">Informações de Contato</h3>
                <div class="space-y-6">
                    @foreach([
                        ['cv-blue',  'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'Endereço', "Av. Cidade de Lisboa\nPraia, Santiago\nCabo Verde"],
                        ['cv-green', 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z', 'Telefone', "+238 260 89 00\n+238 260 89 10"],
                        ['cv-blue',  'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'Email', "info@livroreclamacoes.cv\nsuporte@livroreclamacoes.cv"],
                        ['cv-red',   'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'Horário de Atendimento', "Segunda a Sexta: 08:00 – 16:00\nSáb., Dom. e Feriados: Encerrado"],
                    ] as [$color, $iconPath, $label, $value])
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-xl bg-{{ $color }}/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-{{ $color }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconPath }}"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-cv-navy text-sm mb-1">{{ $label }}</h4>
                                <p class="text-gray-500 text-sm leading-relaxed whitespace-pre-line">{{ $value }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-gray-50 rounded-2xl p-8 reveal">
                <h3 class="font-display font-bold text-2xl text-cv-navy mb-7">Envie uma Mensagem</h3>
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nome Completo</label>
                        <input type="text" placeholder="Seu nome" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cv-blue focus:border-transparent transition-shadow">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" placeholder="seu@email.com" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cv-blue focus:border-transparent transition-shadow">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Assunto</label>
                        <input type="text" placeholder="Assunto da mensagem" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cv-blue focus:border-transparent transition-shadow">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Mensagem</label>
                        <textarea rows="4" placeholder="Escreva a sua mensagem..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-cv-blue focus:border-transparent transition-shadow resize-none"></textarea>
                    </div>
                    <button type="button" class="w-full py-3.5 bg-cv-blue text-white font-display font-bold rounded-xl hover:bg-blue-700 hover:-translate-y-0.5 shadow-md shadow-blue-200 transition-all duration-200">
                        Enviar Mensagem
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     FOOTER
═══════════════════════════════════════════════ --}}
<footer class="bg-cv-navy text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid md:grid-cols-4 gap-10 mb-10">

            {{-- Brand — new logo white version --}}
            <div class="md:col-span-1">
                <div class="mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 420 200" width="180" height="86">
                        <path d="M30 62 L30 148 Q30 156 38 158 L105 162" stroke="white" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity="0.7"/>
                        <path d="M180 62 L180 148 Q180 156 172 158 L105 162" stroke="white" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity="0.7"/>
                        <path d="M38 54 Q38 46 46 45 L105 42 L105 158 Q72 155 46 158 Q38 159 38 152 Z" fill="rgba(255,255,255,0.1)" stroke="white" stroke-width="4.5" stroke-linejoin="round" opacity="0.85"/>
                        <path d="M172 54 Q172 46 164 45 L105 42 L105 158 Q138 155 164 158 Q172 159 172 152 Z" fill="rgba(255,255,255,0.1)" stroke="white" stroke-width="4.5" stroke-linejoin="round" opacity="0.85"/>
                        <path d="M38 152 Q70 168 105 170 Q140 168 172 152" stroke="white" stroke-width="4.5" fill="none" stroke-linecap="round" opacity="0.85"/>
                        <path d="M105 42 Q102 100 105 170" stroke="white" stroke-width="2.5" fill="none" stroke-linecap="round" opacity="0.6"/>
                        <path d="M49 64 Q76 62 100 64"    stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.2"/>
                        <path d="M48 76 Q75 74 100 76"    stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.2"/>
                        <path d="M47 88 Q75 86 100 88"    stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.2"/>
                        <path d="M47 100 Q75 98 100 100"  stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.15"/>
                        <path d="M110 64 Q120 62 128 64"  stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.2"/>
                        <path d="M110 76 Q120 74 128 76"  stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.2"/>
                        <path d="M110 88 Q120 86 128 88"  stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.2"/>
                        <path d="M110 100 Q120 98 128 100" stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.15"/>
                        <path d="M148 64 Q158 62 163 64"  stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.2"/>
                        <path d="M148 76 Q158 74 163 76"  stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.2"/>
                        <path d="M148 88 Q158 86 163 88"  stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.2"/>
                        <path d="M148 100 Q158 98 163 100" stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.15"/>
                        <rect x="131" y="62" width="14" height="54" rx="7" fill="#D32F2F"/>
                        <circle cx="138" cy="130" r="9" fill="#D32F2F"/>
                        <text x="200" y="110" font-family="Sora,sans-serif" font-size="52" font-weight="800" fill="white">reklama</text>
                        <text x="202" y="138" font-family="Inter,sans-serif" font-size="11" font-weight="600" fill="#93C5FD" letter-spacing="4">CABO VERDE</text>
                    </svg>
                </div>
                <p class="text-blue-200 text-sm leading-relaxed">
                    Plataforma oficial do Governo de Cabo Verde para proteção e defesa dos direitos do consumidor.
                </p>
            </div>

            <div>
                <h4 class="font-display font-bold text-sm uppercase tracking-wider text-blue-300 mb-5">Links Rápidos</h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach(['Página Inicial' => 'inicio', 'Quem Somos' => 'quem-somos', 'Direitos do Consumidor' => 'direitos', 'Legislação' => 'legislacao'] as $label => $anchor)
                        <li><a href="#{{ $anchor }}" class="text-blue-200 hover:text-white transition-colors">{{ $label }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="font-display font-bold text-sm uppercase tracking-wider text-blue-300 mb-5">Recursos</h4>
                <ul class="space-y-2.5 text-sm">
                    @foreach(['Perguntas Frequentes', 'Guias e Manuais', 'Documentos Legais', 'Termos de Uso'] as $item)
                        <li><button type="button" class="text-blue-200 hover:text-white transition-colors">{{ $item }}</button></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="font-display font-bold text-sm uppercase tracking-wider text-blue-300 mb-5">Contato</h4>
                <ul class="space-y-2.5 text-sm text-blue-200">
                    <li>+238 260 89 00</li>
                    <li>info@livroreclamacoes.cv</li>
                    <li>Praia, Santiago</li>
                    <li>Cabo Verde</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-blue-300">
            <p>&copy; {{ date('Y') }} Livro de Reclamações – República de Cabo Verde. Todos os direitos reservados.</p>
            <div class="flex gap-5">
                <button type="button" class="hover:text-white transition-colors">Política de Privacidade</button>
                <button type="button" class="hover:text-white transition-colors">Termos de Serviço</button>
            </div>
        </div>
    </div>
</footer>


<script>
    const btn       = document.getElementById('mobile-menu-btn');
    const menu      = document.getElementById('mobile-menu');
    const iconMenu  = document.getElementById('icon-menu');
    const iconClose = document.getElementById('icon-close');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        iconMenu.classList.toggle('hidden');
        iconClose.classList.toggle('hidden');
    });

    document.querySelectorAll('.mobile-nav-link').forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.add('hidden');
            iconMenu.classList.remove('hidden');
            iconClose.classList.add('hidden');
        });
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => entry.target.classList.add('visible'), i * 80);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    const header = document.getElementById('header');
    window.addEventListener('scroll', () => {
        header.classList.toggle('shadow-md', window.scrollY > 10);
    });
</script>

</body>
</html>
