<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Regulador – Reklama Cabo Verde</title>

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
        .nav-item.active { background: #D32F2F; color: white; }
        .stat-card { background: white; border-radius: 1.25rem; padding: 1.5rem; box-shadow: 0 1px 4px rgba(0,0,0,0.06); border: 1.5px solid #F3F4F6; }
        .badge { display: inline-flex; align-items: center; padding: 3px 10px; border-radius: 9999px; font-size: 0.7rem; font-weight: 600; }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #D32F2F; border-radius: 3px; }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">

<div class="flex min-h-screen">

    {{-- ═══════ SIDEBAR ═══════ --}}
    <aside class="hidden lg:flex w-64 flex-col fixed top-0 left-0 h-full bg-cv-navy pattern-dots z-40">
        <div class="blob w-64 h-64 bg-cv-red -top-10 -left-10"></div>
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

        {{-- Regulator info --}}
        <div class="relative z-10 px-6 py-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-cv-red flex items-center justify-center font-display font-bold text-white text-sm flex-shrink-0">DG</div>
                <div>
                    <div class="text-white text-sm font-semibold">DGPDC</div>
                    <div class="text-red-300 text-xs">Regulador · Admin</div>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="relative z-10 flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <p class="text-blue-400 text-xs font-bold uppercase tracking-widest px-3 mb-3">Supervisão</p>
            <div class="nav-item active">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Painel Principal
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Todas as Reclamações
                <span class="ml-auto bg-cv-red text-white text-xs font-bold px-2 py-0.5 rounded-full">24</span>
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                Infrações
                <span class="ml-auto bg-yellow-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">5</span>
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                Estatísticas
            </div>

            <p class="text-blue-400 text-xs font-bold uppercase tracking-widest px-3 mt-6 mb-3">Administração</p>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Empresas
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Consumidores
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                Legislação
            </div>
            <div class="nav-item">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Configurações
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
                <h1 class="font-display font-extrabold text-cv-navy text-xl">Painel do Regulador</h1>
                <p class="text-gray-400 text-xs mt-0.5">Segunda-feira, 16 de Março de 2026 · DGPDC</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" class="relative p-2 rounded-xl hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-cv-red rounded-full"></span>
                </button>
                <div class="w-9 h-9 rounded-xl bg-cv-red flex items-center justify-center font-display font-bold text-white text-xs">DG</div>
            </div>
        </header>

        <div class="flex-1 px-6 lg:px-8 py-8 space-y-8">

            {{-- Banner --}}
            <div class="relative overflow-hidden bg-cv-navy rounded-2xl p-7 pattern-dots">
                <div class="blob w-48 h-48 bg-cv-red top-0 right-0"></div>
                <div class="blob w-32 h-32 bg-cv-blue bottom-0 left-20"></div>
                <div class="relative z-10 flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <p class="text-red-300 text-sm mb-1">Visão Geral do Sistema</p>
                        <h2 class="font-display font-extrabold text-white text-2xl mb-2">Direção-Geral de Proteção do Consumidor 🏛️</h2>
                        <p class="text-blue-200 text-sm">
                            <span class="text-cv-red font-semibold">5 infrações</span> detectadas este mês ·
                            <span class="text-cv-green font-semibold">12 000+</span> reclamações no sistema ·
                            <span class="text-white font-semibold">98%</span> taxa de resposta geral
                        </p>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" class="px-5 py-3 bg-cv-red text-white font-display font-bold rounded-xl hover:bg-red-700 transition-colors text-sm">
                            Ver Infrações
                        </button>
                        <button type="button" class="px-5 py-3 bg-white/10 text-white font-display font-bold rounded-xl hover:bg-white/20 transition-colors text-sm">
                            Relatório Geral
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
                    <div class="font-display font-extrabold text-2xl text-cv-navy">12 041</div>
                    <div class="text-gray-500 text-xs mt-1">Total no Sistema</div>
                    <div class="text-cv-green text-xs font-semibold mt-1">↑ +143 este mês</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">24</div>
                    <div class="text-gray-500 text-xs mt-1">Em Aberto</div>
                    <div class="text-cv-red text-xs font-semibold mt-1">↑ Urgente: 6</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-green" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">318</div>
                    <div class="text-gray-500 text-xs mt-1">Empresas Ativas</div>
                    <div class="text-cv-green text-xs font-semibold mt-1">↑ +12 este mês</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-red" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">5</div>
                    <div class="text-gray-500 text-xs mt-1">Infrações Detectadas</div>
                    <div class="text-cv-red text-xs font-semibold mt-1">Requerem ação</div>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 gap-6">

                {{-- Main table --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Infractions alert --}}
                    <div class="bg-red-50 border border-red-200 rounded-2xl p-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 rounded-lg bg-cv-red flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            </div>
                            <h3 class="font-display font-bold text-cv-navy">Infrações que Requerem Ação</h3>
                        </div>
                        <div class="space-y-2.5">
                            <div class="flex items-center justify-between bg-white rounded-xl px-4 py-3 border border-red-100">
                                <div>
                                    <span class="text-sm font-semibold text-cv-navy">TACV</span>
                                    <span class="text-xs text-gray-400 ml-2">Sem resposta há 72h</span>
                                </div>
                                <button type="button" class="text-xs font-bold text-cv-red hover:underline">Notificar</button>
                            </div>
                            <div class="flex items-center justify-between bg-white rounded-xl px-4 py-3 border border-red-100">
                                <div>
                                    <span class="text-sm font-semibold text-cv-navy">Supermercado Sol</span>
                                    <span class="text-xs text-gray-400 ml-2">Recusou responder</span>
                                </div>
                                <button type="button" class="text-xs font-bold text-cv-red hover:underline">Autuar</button>
                            </div>
                            <div class="flex items-center justify-between bg-white rounded-xl px-4 py-3 border border-red-100">
                                <div>
                                    <span class="text-sm font-semibold text-cv-navy">AutoRent CV</span>
                                    <span class="text-xs text-gray-400 ml-2">3 reclamações não resolvidas</span>
                                </div>
                                <button type="button" class="text-xs font-bold text-cv-red hover:underline">Intervir</button>
                            </div>
                        </div>
                    </div>

                    {{-- All complaints table --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
                            <h3 class="font-display font-bold text-cv-navy">Reclamações Recentes</h3>
                            <button type="button" class="text-xs text-cv-blue font-semibold hover:underline">Ver todas</button>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-gray-50 text-xs text-gray-400 font-semibold uppercase tracking-wider">
                                        <th class="px-6 py-3 text-left">Nº</th>
                                        <th class="px-6 py-3 text-left">Empresa</th>
                                        <th class="px-6 py-3 text-left">Consumidor</th>
                                        <th class="px-6 py-3 text-left">Estado</th>
                                        <th class="px-6 py-3 text-left">Ação</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 font-mono text-xs text-gray-400">#00521</td>
                                        <td class="px-6 py-4 font-semibold text-cv-navy">CVTELECOM</td>
                                        <td class="px-6 py-4 text-gray-600">João Cardoso</td>
                                        <td class="px-6 py-4"><span class="badge bg-yellow-100 text-yellow-700">Em Análise</span></td>
                                        <td class="px-6 py-4"><button type="button" class="text-xs font-semibold text-cv-blue hover:underline">Ver</button></td>
                                    </tr>
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 font-mono text-xs text-gray-400">#00520</td>
                                        <td class="px-6 py-4 font-semibold text-cv-navy">TACV</td>
                                        <td class="px-6 py-4 text-gray-600">Marta Évora</td>
                                        <td class="px-6 py-4"><span class="badge bg-red-100 text-red-700">Infração</span></td>
                                        <td class="px-6 py-4"><button type="button" class="text-xs font-semibold text-cv-red hover:underline">Autuar</button></td>
                                    </tr>
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 font-mono text-xs text-gray-400">#00519</td>
                                        <td class="px-6 py-4 font-semibold text-cv-navy">BCA</td>
                                        <td class="px-6 py-4 text-gray-600">Rui Monteiro</td>
                                        <td class="px-6 py-4"><span class="badge bg-green-100 text-green-700">Resolvida</span></td>
                                        <td class="px-6 py-4"><button type="button" class="text-xs font-semibold text-cv-blue hover:underline">Ver</button></td>
                                    </tr>
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 font-mono text-xs text-gray-400">#00518</td>
                                        <td class="px-6 py-4 font-semibold text-cv-navy">Electra</td>
                                        <td class="px-6 py-4 text-gray-600">Lúcia Santos</td>
                                        <td class="px-6 py-4"><span class="badge bg-blue-100 text-blue-700">Encaminhada</span></td>
                                        <td class="px-6 py-4"><button type="button" class="text-xs font-semibold text-cv-blue hover:underline">Ver</button></td>
                                    </tr>
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 font-mono text-xs text-gray-400">#00517</td>
                                        <td class="px-6 py-4 font-semibold text-cv-navy">AutoRent CV</td>
                                        <td class="px-6 py-4 text-gray-600">Nuno Tavares</td>
                                        <td class="px-6 py-4"><span class="badge bg-red-100 text-red-700">Infração</span></td>
                                        <td class="px-6 py-4"><button type="button" class="text-xs font-semibold text-cv-red hover:underline">Autuar</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Right panel --}}
                <div class="space-y-5">

                    {{-- System health --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="font-display font-bold text-cv-navy mb-5">Saúde do Sistema</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="font-semibold text-gray-600">Taxa de Resposta Geral</span>
                                    <span class="font-bold text-cv-green">98%</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-cv-green h-2 rounded-full" style="width:98%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="font-semibold text-gray-600">Conformidade das Empresas</span>
                                    <span class="font-bold text-cv-blue">84%</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-cv-blue h-2 rounded-full" style="width:84%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="font-semibold text-gray-600">Resolução em 48h</span>
                                    <span class="font-bold text-yellow-500">71%</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-yellow-400 h-2 rounded-full" style="width:71%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="font-semibold text-gray-600">Infrações Resolvidas</span>
                                    <span class="font-bold text-cv-red">40%</span>
                                </div>
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-cv-red h-2 rounded-full" style="width:40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Top offenders --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="font-display font-bold text-cv-navy mb-4">Mais Reclamadas</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-gray-400 w-4">1</span>
                                    <span class="text-xs font-semibold text-cv-navy">CVTELECOM</span>
                                </div>
                                <span class="badge bg-red-100 text-red-600">47</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-gray-400 w-4">2</span>
                                    <span class="text-xs font-semibold text-cv-navy">Electra</span>
                                </div>
                                <span class="badge bg-yellow-100 text-yellow-600">31</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-gray-400 w-4">3</span>
                                    <span class="text-xs font-semibold text-cv-navy">TACV</span>
                                </div>
                                <span class="badge bg-yellow-100 text-yellow-600">28</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-gray-400 w-4">4</span>
                                    <span class="text-xs font-semibold text-cv-navy">BCA</span>
                                </div>
                                <span class="badge bg-green-100 text-green-600">19</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="text-xs font-bold text-gray-400 w-4">5</span>
                                    <span class="text-xs font-semibold text-cv-navy">AutoRent CV</span>
                                </div>
                                <span class="badge bg-green-100 text-green-600">12</span>
                            </div>
                        </div>
                    </div>

                    {{-- Quick actions --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <h3 class="font-display font-bold text-cv-navy mb-4">Ações Admin</h3>
                        <div class="space-y-2">
                            <button type="button" class="w-full text-left flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-7 h-7 rounded-lg bg-red-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5 text-cv-red" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01"/></svg>
                                </div>
                                <span class="text-xs font-semibold text-cv-navy">Emitir Auto de Infração</span>
                            </button>
                            <button type="button" class="w-full text-left flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-7 h-7 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5 text-cv-blue" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                </div>
                                <span class="text-xs font-semibold text-cv-navy">Registar Nova Empresa</span>
                            </button>
                            <button type="button" class="w-full text-left flex items-center gap-3 p-3 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-7 h-7 rounded-lg bg-green-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5 text-cv-green" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                                <span class="text-xs font-semibold text-cv-navy">Gerar Relatório Mensal</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>
