<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar Empresa – Reklama Cabo Verde</title>

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
                    },
                    keyframes: {
                        fadeUp: { '0%': { opacity: '0', transform: 'translateY(24px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
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
            width: 100%; padding: 0.875rem 1rem 0.875rem 3rem;
            background: white; border: 1.5px solid #E5E7EB; border-radius: 0.75rem;
            font-size: 0.875rem; color: #0D1B3E; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            font-family: 'Inter', sans-serif;
        }
        .input-field:focus { border-color: #0F9B58; box-shadow: 0 0 0 3px rgba(15,155,88,0.12); }
        .input-field::placeholder { color: #9CA3AF; }

        .input-no-icon {
            width: 100%; padding: 0.875rem 1rem;
            background: white; border: 1.5px solid #E5E7EB; border-radius: 0.75rem;
            font-size: 0.875rem; color: #0D1B3E; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            font-family: 'Inter', sans-serif;
        }
        .input-no-icon:focus { border-color: #0F9B58; box-shadow: 0 0 0 3px rgba(15,155,88,0.12); }
        .input-no-icon::placeholder { color: #9CA3AF; }

        select.input-field { padding-left: 3rem; padding-right: 2.5rem; cursor: pointer; appearance: none; }
        select.input-field option { color: #0D1B3E; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #0F9B58; border-radius: 3px; }
    </style>
</head>

<body class="font-sans antialiased min-h-screen">
<div class="min-h-screen flex">

    {{-- LEFT PANEL --}}
    <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden bg-cv-navy pattern-dots flex-col justify-between p-14">
        <div class="blob w-96 h-96 bg-cv-green top-0 -left-20"></div>
        <div class="blob w-64 h-64 bg-cv-blue bottom-10 right-0"></div>
        <div class="blob w-48 h-48 bg-cv-red top-1/2 left-10 opacity-10"></div>

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

        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-cv-green/20 border border-white/10 rounded-full text-xs text-green-300 font-semibold mb-6">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                Registo Empresarial
            </div>
            <h2 class="font-display text-4xl xl:text-5xl font-extrabold text-white leading-[1.15] mb-6">
                Registe a sua<br>
                <span class="text-cv-green">empresa</span> na<br>
                plataforma oficial.
            </h2>
            <p class="text-blue-200 text-base leading-relaxed mb-10 max-w-sm">
                Crie o perfil da sua empresa, receba e gira reclamações de forma centralizada e dentro dos prazos legais.
            </p>
            <ul class="space-y-4">
                <li class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-cv-green/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-cv-green" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span class="text-blue-100 text-sm">Receba e responda reclamações num único painel</span>
                </li>
                <li class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-cv-green/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-cv-green" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span class="text-blue-100 text-sm">Alertas automáticos para cumprir os prazos de 48h</span>
                </li>
                <li class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-cv-green/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-cv-green" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span class="text-blue-100 text-sm">Relatórios de desempenho e estatísticas mensais</span>
                </li>
                <li class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-cv-green/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-cv-green" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                    </div>
                    <span class="text-blue-100 text-sm">Evite infrações e multas da DGPDC</span>
                </li>
            </ul>
        </div>

        <div class="relative z-10">
            <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-white/10 border border-white/15 rounded-full text-xs text-blue-200">
                <svg class="w-3.5 h-3.5 text-cv-green" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Plataforma Oficial · Governo de Cabo Verde
            </div>
        </div>
    </div>

    {{-- RIGHT PANEL --}}
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
                        <text x="88" y="52" font-family="Inter,sans-serif" font-size="9" font-weight="600" fill="#0F9B58" letter-spacing="2.5">CABO VERDE</text>
                    </svg>
                </a>
            </div>

            {{-- Card --}}
            <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/60 p-8 sm:p-10">

                <div class="inline-flex items-center gap-2 px-3 py-1.5 bg-green-50 border border-green-200 rounded-full text-xs text-cv-green font-semibold mb-6">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                    Registo Empresarial
                </div>

                <div class="mb-7">
                    <h1 class="font-display text-3xl font-extrabold text-cv-navy mb-2">Registar Empresa</h1>
                    <p class="text-gray-500 text-sm">Preencha os dados da sua empresa para criar o perfil</p>
                </div>

                <div class="space-y-5">

                    {{-- Nome Comercial + Razão Social --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nome Comercial
                                <span class="ml-1 text-xs text-gray-400 font-normal">(na placa)</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                </div>
                                <input type="text" placeholder="Ex: CVTELECOM" class="input-field">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Razão Social
                                <span class="ml-1 text-xs text-gray-400 font-normal">(nome jurídico)</span>
                            </label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                </div>
                                <input type="text" placeholder="Ex: CV Telecom S.A." class="input-field">
                            </div>
                        </div>
                    </div>

                    {{-- NIF --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">NIF da Empresa</label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/></svg>
                            </div>
                            <input type="text" placeholder="Ex: 500123456" class="input-field">
                        </div>
                    </div>

                    {{-- Setor --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Setor de Atividade</label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <select class="input-field">
                                <option value="" disabled selected>Selecionar setor</option>
                                <option>Telecomunicações</option>
                                <option>Energia e Água</option>
                                <option>Banca e Seguros</option>
                                <option>Transportes e Aviação</option>
                                <option>Comércio a Retalho</option>
                                <option>Saúde e Farmácia</option>
                                <option>Hotelaria e Turismo</option>
                                <option>Construção e Imobiliário</option>
                                <option>Alimentação e Restauração</option>
                                <option>Serviços Públicos</option>
                                <option>Tecnologia</option>
                                <option>Outro</option>
                            </select>
                            <div class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Email + Telefone --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Institucional</label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <input type="email" placeholder="info@empresa.cv" class="input-field">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Telefone</label>
                            <div class="flex gap-2">
                                <div class="flex items-center gap-1.5 px-3 py-3 bg-white border-[1.5px] border-gray-200 rounded-xl text-sm text-gray-700 font-medium whitespace-nowrap">
                                    🇨🇻 +238
                                </div>
                                <input type="tel" placeholder="260 00 00" class="input-no-icon flex-1">
                            </div>
                        </div>
                    </div>

                    {{-- Ilha + Concelho --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Ilha</label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <select class="input-field">
                                    <option value="" disabled selected>Selecionar</option>
                                    <option>Santiago</option>
                                    <option>São Vicente</option>
                                    <option>Santo Antão</option>
                                    <option>Fogo</option>
                                    <option>Sal</option>
                                    <option>Boa Vista</option>
                                    <option>São Nicolau</option>
                                    <option>Maio</option>
                                    <option>Brava</option>
                                </select>
                                <div class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Concelho</label>
                            <div class="relative">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                </div>
                                <select class="input-field">
                                    <option value="" disabled selected>Selecionar</option>
                                    <option>Praia</option>
                                    <option>Santa Catarina</option>
                                    <option>São Domingos</option>
                                    <option>Santa Cruz</option>
                                    <option>Tarrafal</option>
                                    <option>Mindelo</option>
                                    <option>São Vicente</option>
                                    <option>Ribeira Grande</option>
                                    <option>Paul</option>
                                    <option>Porto Novo</option>
                                    <option>São Filipe</option>
                                    <option>Mosteiros</option>
                                    <option>Sal Rei</option>
                                    <option>Vila do Maio</option>
                                    <option>Nova Sintra</option>
                                </select>
                                <div class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Palavra-passe</label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input type="password" placeholder="Mínimo 8 caracteres" class="input-field">
                            <button type="button" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </button>
                        </div>
                        <div class="mt-2 flex items-center gap-2">
                            <div class="flex-1 grid grid-cols-4 gap-1">
                                <div class="h-1 rounded-full bg-gray-200"></div>
                                <div class="h-1 rounded-full bg-gray-200"></div>
                                <div class="h-1 rounded-full bg-gray-200"></div>
                                <div class="h-1 rounded-full bg-gray-200"></div>
                            </div>
                            <span class="text-xs text-gray-400">Força da senha</span>
                        </div>
                    </div>

                    {{-- Confirm password --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Confirmar Palavra-passe</label>
                        <div class="relative">
                            <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            </div>
                            <input type="password" placeholder="Repita a palavra-passe" class="input-field">
                        </div>
                    </div>

                    {{-- Terms --}}
                    <div class="flex items-start gap-2.5 pt-1">
                        <input type="checkbox" id="terms" class="w-4 h-4 mt-0.5 rounded border-gray-300 cursor-pointer accent-green-600 flex-shrink-0">
                        <label for="terms" class="text-sm text-gray-600 cursor-pointer leading-relaxed">
                            Li e aceito os
                            <button type="button" class="text-cv-green font-semibold hover:underline">Termos de Serviço</button>
                            e a
                            <button type="button" class="text-cv-green font-semibold hover:underline">Política de Privacidade</button>
                            da plataforma.
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="button" class="w-full py-3.5 bg-cv-green text-white font-display font-bold text-base rounded-xl hover:bg-green-700 hover:-translate-y-0.5 shadow-md shadow-green-200 transition-all duration-200 mt-2">
                        Registar Empresa
                    </button>

                </div>

                <p class="mt-8 text-center text-sm text-gray-500">
                    A sua empresa já tem conta?
                    <a href="/login-company" class="text-cv-green font-semibold hover:underline ml-1">Entrar aqui</a>
                </p>
            </div>

            <p class="mt-6 text-center">
                <a href="/" class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-cv-green transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Voltar à Página Inicial
                </a>
            </p>
        </div>
    </div>
</div>
</body>
</html>
