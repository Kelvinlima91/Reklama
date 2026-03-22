<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Empresa – Reklama Cabo Verde</title>

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
                    }
                }
            }
        }
    </script>

    <style>
        .blob { position: absolute; border-radius: 9999px; filter: blur(80px); opacity: 0.12; pointer-events: none; }
        .pattern-dots { background-image: radial-gradient(rgba(255,255,255,0.07) 1px, transparent 1px); background-size: 24px 24px; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 10px; font-size: 0.875rem; font-weight: 500; color: #93C5FD; transition: all .2s; cursor: pointer; }
        .nav-item:hover { background: rgba(255,255,255,0.08); color: white; }
        .nav-item.active { background: #0F9B58; color: white; }
        .stat-card { background: white; border-radius: 1.25rem; padding: 1.5rem; box-shadow: 0 1px 4px rgba(0,0,0,0.06); border: 1.5px solid #F3F4F6; }
        .badge { display: inline-flex; align-items: center; padding: 3px 10px; border-radius: 9999px; font-size: 0.7rem; font-weight: 600; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #0F9B58; border-radius: 3px; }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">

<div class="flex min-h-screen">

    {{-- ═══════ SIDEBAR ═══════ --}}
    <aside class="hidden lg:flex w-64 flex-col fixed top-0 left-0 h-full bg-cv-navy pattern-dots z-40">
        <div class="blob w-64 h-64 bg-cv-green -top-10 -left-10"></div>
        <div class="blob w-48 h-48 bg-cv-blue bottom-10 right-0"></div>

        {{-- Logo --}}
        <div class="relative z-10 px-6 py-7 border-b border-white/10">
            <a href="/" class="inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 60" width="160" height="30">
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
        </div>

        {{-- Company info --}}
        <div class="relative z-10 px-6 py-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-cv-green flex items-center justify-center font-display font-bold text-white text-sm flex-shrink-0">CV</div>
                <div>
                    <div class="text-white text-sm font-semibold">CVTELECOM</div>
                    <div class="text-green-300 text-xs">Empresa · Verificada</div>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="relative z-10 flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <p class="text-blue-400 text-xs font-bold uppercase tracking-widest px-3 mb-3">Gestão</p>
            <div class="nav-item active">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Painel Principal
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Reclamações Recebidas
                <span class="ml-auto bg-cv-red text-white text-xs font-bold px-2 py-0.5 rounded-full">8</span>
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Respostas Pendentes
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                Relatórios
            </div>

            <p class="text-blue-400 text-xs font-bold uppercase tracking-widest px-3 mt-6 mb-3">Empresa</p>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Perfil da Empresa
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Utilizadores
            </div>
        </nav>

        <div class="relative z-10 px-4 py-5 border-t border-white/10">
            <div class="nav-item text-red-300 hover:text-red-200 hover:bg-red-900/30">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                Sair da Conta
            </div>
        </div>
    </aside>

    {{-- ═══════ MAIN ═══════ --}}
    <main class="flex-1 lg:ml-64 flex flex-col min-h-screen">

        <header class="bg-white border-b border-gray-100 px-6 lg:px-8 py-4 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h1 class="font-display font-extrabold text-cv-navy text-xl">Painel da Empresa</h1>
                <p class="text-gray-400 text-xs mt-0.5">Segunda-feira, 16 de Março de 2026</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" class="relative p-2 rounded-xl hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-cv-red rounded-full"></span>
                </button>
                <div class="w-9 h-9 rounded-xl bg-cv-green flex items-center justify-center font-display font-bold text-white text-xs">CV</div>
            </div>
        </header>

        <div class="flex-1 px-6 lg:px-8 py-8 space-y-8">

            {{-- Banner --}}
            <div class="relative overflow-hidden bg-cv-navy rounded-2xl p-7 pattern-dots">
                <div class="blob w-48 h-48 bg-cv-green top-0 right-0"></div>
                <div class="blob w-32 h-32 bg-cv-blue bottom-0 left-20"></div>
                <div class="relative z-10 flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <p class="text-green-300 text-sm mb-1">Bem-vindo,</p>
                        <h2 class="font-display font-extrabold text-white text-2xl mb-2">CVTELECOM 🏢</h2>
                        <p class="text-blue-200 text-sm">Tem <span class="text-cv-red font-semibold">8 reclamações</span> pendentes de resposta e <span class="text-cv-green font-semibold">prazo de 48h</span> para responder.</p>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" class="px-5 py-3 bg-cv-green text-white font-display font-bold rounded-xl hover:bg-green-700 transition-colors text-sm">
                            Ver Pendentes
                        </button>
                        <button type="button" class="px-5 py-3 bg-white/10 text-white font-display font-bold rounded-xl hover:bg-white/20 transition-colors text-sm">
                            Relatório
                        </button>
                    </div>
                </div>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">47</div>
                    <div class="text-gray-500 text-xs mt-1">Total Recebidas</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-red" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">8</div>
                    <div class="text-gray-500 text-xs mt-1">Pendentes</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-green" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">35</div>
                    <div class="text-gray-500 text-xs mt-1">Resolvidas</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-green" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">74%</div>
                    <div class="text-gray-500 text-xs mt-1">Taxa de Resolução</div>
                </div>
            </div>

            {{-- Full-width table --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="font-display font-bold text-cv-navy">Reclamações Pendentes de Resposta</h3>
                    <span class="badge bg-red-100 text-red-600">8 pendentes</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                        <tr class="bg-gray-50 text-xs text-gray-400 font-semibold uppercase tracking-wider">
                            <th class="px-6 py-3 text-left">Nº</th>
                            <th class="px-6 py-3 text-left">Consumidor</th>
                            <th class="px-6 py-3 text-left">Assunto</th>
                            <th class="px-6 py-3 text-left">Prazo</th>
                            <th class="px-6 py-3 text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-gray-400">#00521</td>
                            <td class="px-6 py-4 font-semibold text-cv-navy">João Cardoso</td>
                            <td class="px-6 py-4 text-gray-600">Falha no serviço de internet</td>
                            <td class="px-6 py-4"><span class="badge bg-red-100 text-red-600">Urgente</span></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-cv-blue text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Ver Reclamação
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-50 hover:bg-green-100 text-cv-green text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                                        Responder
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-gray-400">#00519</td>
                            <td class="px-6 py-4 font-semibold text-cv-navy">Maria Silva</td>
                            <td class="px-6 py-4 text-gray-600">Débito incorreto na fatura</td>
                            <td class="px-6 py-4"><span class="badge bg-yellow-100 text-yellow-600">24h</span></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-cv-blue text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Ver Reclamação
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-50 hover:bg-green-100 text-cv-green text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                                        Responder
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-gray-400">#00515</td>
                            <td class="px-6 py-4 font-semibold text-cv-navy">Carlos Mendes</td>
                            <td class="px-6 py-4 text-gray-600">Contrato não cumprido</td>
                            <td class="px-6 py-4"><span class="badge bg-green-100 text-green-600">48h</span></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-cv-blue text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Ver Reclamação
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-50 hover:bg-green-100 text-cv-green text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                                        Responder
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-gray-400">#00512</td>
                            <td class="px-6 py-4 font-semibold text-cv-navy">Ana Fonseca</td>
                            <td class="px-6 py-4 text-gray-600">Velocidade inferior ao contratado</td>
                            <td class="px-6 py-4"><span class="badge bg-green-100 text-green-600">48h</span></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-cv-blue text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Ver Reclamação
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-50 hover:bg-green-100 text-cv-green text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                                        Responder
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 font-mono text-xs text-gray-400">#00508</td>
                            <td class="px-6 py-4 font-semibold text-cv-navy">Pedro Lopes</td>
                            <td class="px-6 py-4 text-gray-600">Atendimento ao cliente</td>
                            <td class="px-6 py-4"><span class="badge bg-yellow-100 text-yellow-600">24h</span></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-cv-blue text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        Ver Reclamação
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-green-50 hover:bg-green-100 text-cv-green text-xs font-semibold transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                                        Responder
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Performance + Categories below table --}}
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-display font-bold text-cv-navy mb-5">Desempenho Mensal</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-xs mb-1.5">
                                <span class="font-semibold text-gray-600">Taxa de Resolução</span>
                                <span class="font-bold text-cv-green">74%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-cv-green h-2 rounded-full" style="width:74%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs mb-1.5">
                                <span class="font-semibold text-gray-600">Resposta a Tempo</span>
                                <span class="font-bold text-cv-blue">88%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-cv-blue h-2 rounded-full" style="width:88%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-xs mb-1.5">
                                <span class="font-semibold text-gray-600">Satisfação</span>
                                <span class="font-bold text-yellow-500">62%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width:62%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-display font-bold text-cv-navy mb-4">Por Categoria</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-2.5 h-2.5 rounded-full bg-cv-blue"></div>
                                <span class="text-xs text-gray-600">Internet</span>
                            </div>
                            <span class="text-xs font-bold text-cv-navy">18</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-2.5 h-2.5 rounded-full bg-cv-green"></div>
                                <span class="text-xs text-gray-600">Faturação</span>
                            </div>
                            <span class="text-xs font-bold text-cv-navy">14</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-2.5 h-2.5 rounded-full bg-yellow-400"></div>
                                <span class="text-xs text-gray-600">Atendimento</span>
                            </div>
                            <span class="text-xs font-bold text-cv-navy">9</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-2.5 h-2.5 rounded-full bg-cv-red"></div>
                                <span class="text-xs text-gray-600">Outros</span>
                            </div>
                            <span class="text-xs font-bold text-cv-navy">6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>
