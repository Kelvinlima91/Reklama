<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Minha Área – Reklama Cabo Verde</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans:    ['Inter', 'sans-serif'],
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
        .blob { position:absolute; border-radius:9999px; filter:blur(80px); opacity:.12; pointer-events:none; }
        .pattern-dots { background-image:radial-gradient(rgba(255,255,255,.07) 1px,transparent 1px); background-size:24px 24px; }
        .nav-item { display:flex; align-items:center; gap:10px; padding:10px 14px; border-radius:10px; font-size:.875rem; font-weight:500; color:#93C5FD; transition:all .2s; cursor:pointer; width:100%; text-align:left; border:none; background:transparent; }
        .nav-item:hover { background:rgba(255,255,255,.08); color:white; }
        .nav-item.active { background:#1B4FD8; color:white; }
        .stat-card { background:white; border-radius:1.25rem; padding:1.5rem; box-shadow:0 1px 4px rgba(0,0,0,.06); border:1.5px solid #F3F4F6; }
        .badge { display:inline-flex; align-items:center; padding:3px 10px; border-radius:9999px; font-size:.7rem; font-weight:600; }
        ::-webkit-scrollbar { width:5px; }
        ::-webkit-scrollbar-track { background:#f1f1f1; }
        ::-webkit-scrollbar-thumb { background:#1B4FD8; border-radius:3px; }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">
<div class="flex min-h-screen">

    {{-- ═══ SIDEBAR ═══ --}}
    <aside class="hidden lg:flex w-64 flex-col fixed top-0 left-0 h-full bg-cv-navy pattern-dots z-40">
        <div class="blob w-64 h-64 bg-cv-blue -top-10 -left-10"></div>
        <div class="blob w-48 h-48 bg-cv-green bottom-10 right-0"></div>

        {{-- Logo --}}
        <div class="relative z-10 px-6 py-7 border-b border-white/10">
            <a href="{{ route('home') }}" class="inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 420 200" width="160" height="76">
                    <path d="M30 62 L30 148 Q30 156 38 158 L105 162" stroke="white" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity="0.7"/>
                    <path d="M180 62 L180 148 Q180 156 172 158 L105 162" stroke="white" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity="0.7"/>
                    <path d="M38 54 Q38 46 46 45 L105 42 L105 158 Q72 155 46 158 Q38 159 38 152 Z" fill="rgba(255,255,255,0.1)" stroke="white" stroke-width="4.5" stroke-linejoin="round" opacity="0.85"/>
                    <path d="M172 54 Q172 46 164 45 L105 42 L105 158 Q138 155 164 158 Q172 159 172 152 Z" fill="rgba(255,255,255,0.1)" stroke="white" stroke-width="4.5" stroke-linejoin="round" opacity="0.85"/>
                    <path d="M38 152 Q70 168 105 170 Q140 168 172 152" stroke="white" stroke-width="4.5" fill="none" stroke-linecap="round" opacity="0.85"/>
                    <path d="M105 42 Q102 100 105 170" stroke="white" stroke-width="2.5" fill="none" stroke-linecap="round" opacity="0.6"/>
                    <rect x="131" y="62" width="14" height="54" rx="7" fill="#D32F2F"/>
                    <circle cx="138" cy="130" r="9" fill="#D32F2F"/>
                    <text x="200" y="110" font-family="Sora,sans-serif" font-size="52" font-weight="800" fill="white">reklama</text>
                    <text x="202" y="138" font-family="Inter,sans-serif" font-size="11" font-weight="600" fill="#93C5FD" letter-spacing="4">CABO VERDE</text>
                </svg>
            </a>
        </div>

        {{-- User info --}}
        <div class="relative z-10 px-6 py-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-cv-blue flex items-center justify-center font-display font-bold text-white text-sm flex-shrink-0">
                    {{ strtoupper(substr($user->nome_completo, 0, 1)) }}{{ strtoupper(substr(strrchr($user->nome_completo, ' ') ?: $user->nome_completo, 1, 1)) }}
                </div>
                <div>
                    <div class="text-white text-sm font-semibold">{{ $user->nome_completo }}</div>
                    <div class="text-blue-300 text-xs">Consumidor</div>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="relative z-10 flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <p class="text-blue-400 text-xs font-bold uppercase tracking-widest px-3 mb-3">Principal</p>
            <button onclick="showPage('dashboard')" class="nav-item active" id="nav-dashboard">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Painel Principal
            </button>
            <button onclick="showPage('reclamacoes')" class="nav-item" id="nav-reclamacoes">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Minhas Reclamações
            </button>
            <button onclick="showPage('nova')" class="nav-item" id="nav-nova">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Nova Reclamação
            </button>

            <p class="text-blue-400 text-xs font-bold uppercase tracking-widest px-3 mt-6 mb-3">Conta</p>
            <button onclick="showPage('perfil')" class="nav-item" id="nav-perfil">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Perfil
            </button>
            <button onclick="showPage('definicoes')" class="nav-item" id="nav-definicoes">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Definições
            </button>
        </nav>

        {{-- Logout --}}
        <div class="relative z-10 px-4 py-5 border-t border-white/10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-item text-red-300 hover:text-red-200 hover:bg-red-900/30">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Sair da Conta
                </button>
            </form>
        </div>
    </aside>

    {{-- ═══ MAIN ═══ --}}
    <main class="flex-1 lg:ml-64 flex flex-col min-h-screen">

        {{-- Topbar --}}
        <header class="bg-white border-b border-gray-100 px-6 lg:px-8 py-4 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h1 class="font-display font-extrabold text-cv-navy text-xl" id="page-title">Painel Principal</h1>
                <p class="text-gray-400 text-xs mt-0.5">{{ ucfirst(now()->locale('pt')->isoFormat('dddd, D [de] MMMM [de] YYYY')) }}</p>
            </div>
            <div class="flex items-center gap-3">
                {{-- Notification bell --}}
                <div class="relative" id="notif-wrapper">
                    <button type="button" id="notif-btn" onclick="toggleNotif()"
                            class="relative p-2 rounded-xl hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-cv-red rounded-full" id="notif-dot"></span>
                    </button>

                    <div id="notif-dropdown" class="hidden absolute right-0 top-12 w-96 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden z-50">
                        <div class="px-4 py-3 border-b border-gray-100 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="font-display font-bold text-sm text-cv-navy">Notificações</span>
                                <span id="notif-badge" class="bg-cv-red text-white text-xs font-bold px-2 py-0.5 rounded-full">2</span>
                            </div>
                            <button type="button" onclick="markAllRead()" class="text-xs text-cv-blue font-medium hover:underline">Marcar tudo como lido</button>
                        </div>

                        <div class="notif-item flex items-start gap-3 px-4 py-3.5 border-b border-gray-50 bg-blue-50/40 hover:bg-blue-50 transition-colors cursor-pointer" data-read="false" onclick="markRead(this)">
                            <div class="w-9 h-9 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-cv-green" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5 mb-0.5">
                                    <p class="text-xs font-bold text-cv-navy truncate">Reclamação #00498 resolvida</p>
                                    <span class="flex-shrink-0 px-1.5 py-0.5 rounded text-xs font-bold bg-red-100 text-cv-red leading-none">Alta</span>
                                </div>
                                <p class="text-xs text-gray-600 leading-relaxed">A Electra respondeu e confirmou a reposição do fornecimento de energia eléctrica em Santiago.</p>
                                <div class="flex items-center gap-2 mt-1.5">
                                    <span class="px-1.5 py-0.5 rounded bg-yellow-100 text-yellow-700 text-xs font-semibold">Energia</span>
                                    <span class="text-xs text-gray-400">Há 2 dias · 16 Mar 2026, 14:32</span>
                                </div>
                            </div>
                            <div class="w-2 h-2 rounded-full bg-cv-blue flex-shrink-0 mt-2 unread-dot"></div>
                        </div>

                        <div class="notif-item flex items-start gap-3 px-4 py-3.5 border-b border-gray-50 bg-blue-50/40 hover:bg-blue-50 transition-colors cursor-pointer" data-read="false" onclick="markRead(this)">
                            <div class="w-9 h-9 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-cv-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5 mb-0.5">
                                    <p class="text-xs font-bold text-cv-navy truncate">Reclamação #00521 encaminhada</p>
                                    <span class="flex-shrink-0 px-1.5 py-0.5 rounded text-xs font-bold bg-gray-100 text-gray-500 leading-none">Normal</span>
                                </div>
                                <p class="text-xs text-gray-600 leading-relaxed">O processo foi encaminhado à ARME para mediação com a CVTELECOM sobre a falha de internet em São Vicente.</p>
                                <div class="flex items-center gap-2 mt-1.5">
                                    <span class="px-1.5 py-0.5 rounded bg-blue-100 text-cv-blue text-xs font-semibold">Telecomunicações</span>
                                    <span class="text-xs text-gray-400">Há 5 dias · 13 Mar 2026, 09:15</span>
                                </div>
                            </div>
                            <div class="w-2 h-2 rounded-full bg-cv-blue flex-shrink-0 mt-2 unread-dot"></div>
                        </div>

                        <div class="notif-item flex items-start gap-3 px-4 py-3.5 hover:bg-gray-50 transition-colors cursor-pointer" data-read="true" onclick="markRead(this)">
                            <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-cv-red" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-1.5 mb-0.5">
                                    <p class="text-xs font-semibold text-gray-500 truncate">Documentos em falta — #00389</p>
                                    <span class="flex-shrink-0 px-1.5 py-0.5 rounded text-xs font-bold bg-red-100 text-cv-red leading-none">Alta</span>
                                </div>
                                <p class="text-xs text-gray-400 leading-relaxed">O prazo para submeter o comprovativo de compra no Supermercado Sol termina em 3 dias.</p>
                                <div class="flex items-center gap-2 mt-1.5">
                                    <span class="px-1.5 py-0.5 rounded bg-purple-100 text-purple-700 text-xs font-semibold">Documentação</span>
                                    <span class="text-xs text-gray-400">Há 1 semana · 11 Mar 2026, 16:00</span>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-2.5 border-t border-gray-100 bg-gray-50/50 text-center">
                            <button type="button" class="text-xs text-cv-blue font-semibold hover:underline">Ver todas as notificações</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        {{-- ═══ PAGE: DASHBOARD ═══ --}}
        <div id="page-dashboard" class="flex-1 px-6 lg:px-8 py-8 space-y-8">

            {{-- Success flash --}}
            @if(session('sucesso'))
                <div class="p-4 bg-green-50 border border-green-200 rounded-xl text-sm text-green-700 flex items-center gap-2">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('sucesso') }}
                </div>
            @endif

            {{-- Welcome banner --}}
            <div class="relative overflow-hidden bg-cv-navy rounded-2xl p-7 pattern-dots">
                <div class="blob w-48 h-48 bg-cv-blue top-0 right-0"></div>
                <div class="blob w-32 h-32 bg-cv-green bottom-0 left-20"></div>
                <div class="relative z-10 flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <p class="text-blue-300 text-sm mb-1">Bem-vindo de volta,</p>
                        <h2 class="font-display font-extrabold text-white text-2xl mb-2">
                            {{ explode(' ', $user->nome_completo)[0] }}
                        </h2>
                        <p class="text-blue-200 text-sm">
                            @if($mesStats['analise'] > 0 || $mesStats['resolvidas'] > 0)
                                Tem
                                @if($mesStats['analise'] > 0)
                                    <span class="text-white font-semibold">{{ $mesStats['analise'] }} {{ $mesStats['analise'] == 1 ? 'reclamação' : 'reclamações' }}</span> em análise
                                @endif
                                @if($mesStats['analise'] > 0 && $mesStats['resolvidas'] > 0) e @endif
                                @if($mesStats['resolvidas'] > 0)
                                    <span class="text-cv-green font-semibold">{{ $mesStats['resolvidas'] }} {{ $mesStats['resolvidas'] == 1 ? 'resolvida' : 'resolvidas' }}</span>
                                @endif
                                este mês.
                            @else
                                Ainda não tem actividade este mês. <span class="text-white font-semibold">Registe a sua primeira reclamação.</span>
                            @endif
                        </p>
                    </div>
                    <button type="button" onclick="showPage('nova')"
                            class="px-6 py-3 bg-cv-red text-white font-display font-bold rounded-xl hover:bg-red-700 transition-colors text-sm shadow-lg shadow-red-900/30">
                        + Nova Reclamação
                    </button>
                </div>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">{{ $stats['total'] }}</div>
                    <div class="text-gray-500 text-xs mt-1">Total de Reclamações</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-yellow-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">{{ $stats['analise'] }}</div>
                    <div class="text-gray-500 text-xs mt-1">Em Análise</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-green" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">{{ $stats['resolvidas'] }}</div>
                    <div class="text-gray-500 text-xs mt-1">Resolvidas</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-red" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">{{ $stats['recusadas'] }}</div>
                    <div class="text-gray-500 text-xs mt-1">Recusadas</div>
                </div>
            </div>

            {{-- Table --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <div class="flex flex-wrap items-center gap-3 justify-between">
                        <h3 class="font-display font-bold text-cv-navy">Reclamações Recentes</h3>
                        <div class="flex items-center gap-2 flex-wrap">
                            <div class="flex items-center gap-1.5">
                                <label class="text-xs text-gray-400 font-medium whitespace-nowrap">De</label>
                                <input type="date" id="filter-from" onchange="filterTable()"
                                       class="text-xs border border-gray-200 rounded-lg px-2.5 py-1.5 text-gray-600 focus:outline-none focus:border-cv-blue transition-colors">
                            </div>
                            <div class="flex items-center gap-1.5">
                                <label class="text-xs text-gray-400 font-medium whitespace-nowrap">Até</label>
                                <input type="date" id="filter-to" onchange="filterTable()"
                                       class="text-xs border border-gray-200 rounded-lg px-2.5 py-1.5 text-gray-600 focus:outline-none focus:border-cv-blue transition-colors">
                            </div>
                            <select id="filter-estado" onchange="filterTable()"
                                    class="text-xs border border-gray-200 rounded-lg px-2.5 py-1.5 text-gray-600 focus:outline-none focus:border-cv-blue transition-colors appearance-none">
                                <option value="">Todos os estados</option>
                                <option value="Pendente">Pendente</option>
                                <option value="Em Análise">Em Análise</option>
                                <option value="Encaminhada">Encaminhada</option>
                                <option value="Resolvida">Resolvida</option>
                                <option value="Recusada">Recusada</option>
                            </select>
                            <button type="button" onclick="clearFilters()"
                                    class="text-xs text-gray-400 hover:text-cv-blue font-medium transition-colors flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                Limpar
                            </button>
                        </div>
                    </div>
                    <p id="filter-empty" class="hidden text-xs text-gray-400 mt-3">Nenhuma reclamação encontrada com os filtros aplicados.</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                        <tr class="bg-gray-50 text-xs text-gray-400 font-semibold uppercase tracking-wider">
                            <th class="px-6 py-3 text-left">Nº Referência</th>
                            <th class="px-6 py-3 text-left">Empresa</th>
                            <th class="px-6 py-3 text-left">Assunto</th>
                            <th class="px-6 py-3 text-left">Estado</th>
                            <th class="px-6 py-3 text-left">Data</th>
                            <th class="px-6 py-3 text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50" id="reclamacoes-tbody">
                        @forelse($reclamacoes as $rec)
                            @php
                                $el = match($rec->estado) {
                                    'pendente'    => ['label' => 'Pendente',    'class' => 'bg-gray-100 text-gray-600'],
                                    'em_analise'  => ['label' => 'Em Análise',  'class' => 'bg-yellow-100 text-yellow-700'],
                                    'encaminhada' => ['label' => 'Encaminhada', 'class' => 'bg-blue-100 text-blue-700'],
                                    'resolvida'   => ['label' => 'Resolvida',   'class' => 'bg-green-100 text-green-700'],
                                    'recusada'    => ['label' => 'Recusada',    'class' => 'bg-red-100 text-red-700'],
                                    'infracao'    => ['label' => 'Infração',    'class' => 'bg-purple-100 text-purple-700'],
                                    default       => ['label' => ucfirst($rec->estado), 'class' => 'bg-gray-100 text-gray-600'],
                                };
                                $canEdit   = in_array($rec->estado, ['pendente', 'em_analise']);
                                $canDelete = $rec->estado === 'pendente';
                            @endphp
                            <tr class="hover:bg-gray-50/50 transition-colors"
                                data-date="{{ $rec->created_at->format('Y-m-d') }}"
                                data-estado="{{ $el['label'] }}">
                                <td class="px-6 py-4 font-mono text-xs text-gray-400">
                                    {{ $rec->numero_referencia ?? '#'.str_pad($rec->id, 5, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-cv-navy">
                                    {{ $rec->empresa_nome ?? $rec->empresa?->nome_comercial ?? '—' }}
                                </td>
                                <td class="px-6 py-4 text-gray-600 max-w-xs truncate">{{ $rec->assunto }}</td>
                                <td class="px-6 py-4"><span class="badge {{ $el['class'] }}">{{ $el['label'] }}</span></td>
                                <td class="px-6 py-4 text-gray-400 text-xs whitespace-nowrap">{{ $rec->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" title="Ver detalhes" class="p-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-cv-blue transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </button>
                                        @if($canDelete)
                                            <button type="button" title="Eliminar"
                                                    onclick="abrirModalEliminar({{ $rec->id }}, '{{ addslashes($rec->numero_referencia ?? '#'.str_pad($rec->id, 5, '0', STR_PAD_LEFT)) }}')"
                                                    class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-cv-red transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        @else
                                            <button disabled title="Não pode ser eliminada neste estado" class="p-1.5 rounded-lg bg-gray-50 text-gray-300 cursor-not-allowed">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-400">
                                    <svg class="w-10 h-10 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    Ainda não tem reclamações registadas.
                                    <button onclick="showPage('nova')" class="block mx-auto mt-2 text-cv-blue font-semibold hover:underline text-xs">Registar primeira reclamação</button>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- ═══ PAGE: MINHAS RECLAMAÇÕES ═══ --}}
        <div id="page-reclamacoes" class="hidden flex-1 px-6 lg:px-8 py-8">
            <div class="max-w-5xl">
                <h2 class="font-display font-extrabold text-cv-navy text-xl mb-1">Minhas Reclamações</h2>
                <p class="text-gray-400 text-sm mb-6">Histórico completo das suas reclamações</p>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <span class="font-display font-bold text-cv-navy text-sm">
                        {{ $reclamacoes->count() }} {{ $reclamacoes->count() == 1 ? 'reclamação' : 'reclamações' }}
                    </span>
                        <button onclick="showPage('nova')" class="px-4 py-2 bg-cv-blue text-white text-xs font-bold rounded-lg hover:bg-blue-700 transition-colors">
                            + Nova Reclamação
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                            <tr class="bg-gray-50 text-xs text-gray-400 font-semibold uppercase tracking-wider">
                                <th class="px-6 py-3 text-left">Nº Referência</th>
                                <th class="px-6 py-3 text-left">Empresa</th>
                                <th class="px-6 py-3 text-left">Assunto</th>
                                <th class="px-6 py-3 text-left">Estado</th>
                                <th class="px-6 py-3 text-left">Data</th>
                                <th class="px-6 py-3 text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                            @forelse($reclamacoes as $rec)
                                @php
                                    $el2 = match($rec->estado) {
                                        'pendente'    => ['label' => 'Pendente',    'class' => 'bg-gray-100 text-gray-600'],
                                        'em_analise'  => ['label' => 'Em Análise',  'class' => 'bg-yellow-100 text-yellow-700'],
                                        'encaminhada' => ['label' => 'Encaminhada', 'class' => 'bg-blue-100 text-blue-700'],
                                        'resolvida'   => ['label' => 'Resolvida',   'class' => 'bg-green-100 text-green-700'],
                                        'recusada'    => ['label' => 'Recusada',    'class' => 'bg-red-100 text-red-700'],
                                        default       => ['label' => ucfirst($rec->estado), 'class' => 'bg-gray-100 text-gray-600'],
                                    };
                                    $ce = in_array($rec->estado, ['pendente', 'em_analise']);
                                    $cd = $rec->estado === 'pendente';
                                @endphp
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 font-mono text-xs text-gray-400">
                                        {{ $rec->numero_referencia ?? '#'.str_pad($rec->id, 5, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-cv-navy">{{ $rec->empresa_nome ?? $rec->empresa?->nome_comercial ?? '—' }}</td>
                                    <td class="px-6 py-4 text-gray-600 max-w-xs truncate">{{ $rec->assunto }}</td>
                                    <td class="px-6 py-4"><span class="badge {{ $el2['class'] }}">{{ $el2['label'] }}</span></td>
                                    <td class="px-6 py-4 text-gray-400 text-xs whitespace-nowrap">{{ $rec->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button type="button" title="Ver detalhes" class="p-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-cv-blue transition-colors">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </button>
                                            @if($cd)
                                                <button type="button" title="Eliminar"
                                                        onclick="abrirModalEliminar({{ $rec->id }}, '{{ addslashes($rec->numero_referencia ?? '#'.str_pad($rec->id, 5, '0', STR_PAD_LEFT)) }}')"
                                                        class="p-1.5 rounded-lg bg-red-50 hover:bg-red-100 text-cv-red transition-colors">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            @else
                                                <button disabled title="Não pode ser eliminada neste estado" class="p-1.5 rounded-lg bg-gray-50 text-gray-300 cursor-not-allowed">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-400">
                                        Ainda não tem reclamações registadas.
                                        <button onclick="showPage('nova')" class="block mx-auto mt-2 text-cv-blue font-semibold hover:underline text-xs">Registar primeira reclamação</button>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ PAGE: PERFIL ═══ --}}
        <div id="page-perfil" class="hidden flex-1 px-6 lg:px-8 py-8">
            <div class="max-w-2xl">
                <h2 class="font-display font-extrabold text-cv-navy text-xl mb-1">O Meu Perfil</h2>
                <p class="text-gray-400 text-sm mb-6">Informações da sua conta</p>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex items-center gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-cv-blue flex items-center justify-center font-display font-bold text-white text-xl">
                            {{ strtoupper(substr($user->nome_completo, 0, 1)) }}{{ strtoupper(substr(strrchr($user->nome_completo, ' ') ?: $user->nome_completo, 1, 1)) }}
                        </div>
                        <div>
                            <div class="font-display font-bold text-cv-navy text-lg">{{ $user->nome_completo }}</div>
                            <div class="text-gray-400 text-sm">{{ $user->email }}</div>
                            <span class="inline-flex items-center mt-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-cv-blue">Consumidor</span>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-50">
                        <div class="px-6 py-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500 font-medium">NIF / Nº de BI</span>
                            <span class="text-sm font-semibold text-cv-navy">{{ $user->nif ?? '—' }}</span>
                        </div>
                        <div class="px-6 py-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500 font-medium">Telefone</span>
                            <span class="text-sm font-semibold text-cv-navy">{{ $user->telefone ? '+238 '.$user->telefone : '—' }}</span>
                        </div>
                        <div class="px-6 py-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500 font-medium">Ilha</span>
                            <span class="text-sm font-semibold text-cv-navy">{{ $user->ilha ?? '—' }}</span>
                        </div>
                        <div class="px-6 py-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500 font-medium">Concelho</span>
                            <span class="text-sm font-semibold text-cv-navy">{{ $user->concelho ?? '—' }}</span>
                        </div>
                        <div class="px-6 py-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500 font-medium">Membro desde</span>
                            <span class="text-sm font-semibold text-cv-navy">{{ $user->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <p class="text-xs text-gray-400">Para alterar os seus dados, contacte o suporte em <span class="text-cv-blue"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="394a4c49564b4d5c7955504f4b564b5c5a555854585a565c4a175a4f">[email&#160;protected]</a></span></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ PAGE: DEFINIÇÕES ═══ --}}
        <div id="page-definicoes" class="hidden flex-1 px-6 lg:px-8 py-8">
            <div class="max-w-2xl">
                <h2 class="font-display font-extrabold text-cv-navy text-xl mb-1">Definições</h2>
                <p class="text-gray-400 text-sm mb-6">Preferências da sua conta</p>
                <div class="space-y-4">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <h3 class="font-display font-bold text-cv-navy text-sm mb-4">Notificações</h3>
                        <div class="space-y-4">
                            @foreach(['Receber email quando a reclamação é atualizada','Receber email quando a reclamação é resolvida','Receber alertas de documentos em falta'] as $pref)
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">{{ $pref }}</span>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" checked class="sr-only peer">
                                        <div class="w-9 h-5 bg-gray-200 peer-checked:bg-cv-blue rounded-full peer transition-colors"></div>
                                        <div class="absolute left-0.5 top-0.5 w-4 h-4 bg-white rounded-full peer-checked:translate-x-4 transition-transform shadow-sm"></div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                        <h3 class="font-display font-bold text-cv-navy text-sm mb-4">Segurança</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-medium text-gray-700">Palavra-passe</div>
                                    <div class="text-xs text-gray-400 mt-0.5">Última alteração desconhecida</div>
                                </div>
                                <button type="button" class="text-xs text-cv-blue font-semibold hover:underline">Alterar</button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-medium text-gray-700">Sessões ativas</div>
                                    <div class="text-xs text-gray-400 mt-0.5">Este dispositivo</div>
                                </div>
                                <button type="button" class="text-xs text-cv-red font-semibold hover:underline">Terminar todas</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl border border-red-100 shadow-sm p-6">
                        <h3 class="font-display font-bold text-cv-red text-sm mb-2">Zona de risco</h3>
                        <p class="text-xs text-gray-400 mb-4">Estas ações são irreversíveis. Tenha cuidado.</p>
                        <button type="button" class="text-xs text-cv-red font-semibold border border-red-200 px-4 py-2 rounded-lg hover:bg-red-50 transition-colors">
                            Eliminar conta
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ PAGE: NOVA RECLAMAÇÃO ═══ --}}
        <div id="page-nova" class="hidden flex-1 px-6 lg:px-8 py-8">
            <div class="max-w-2xl">
                <h2 class="font-display font-extrabold text-cv-navy text-xl mb-1">Nova Reclamação</h2>
                <p class="text-gray-400 text-sm mb-6">Preencha os dados abaixo para registar a sua reclamação</p>

                <div class="bg-blue-50 border border-blue-100 rounded-xl px-4 py-3 mb-5 flex items-center gap-3">
                    <svg class="w-4 h-4 text-cv-blue flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="text-xs text-cv-blue">Os seus dados pessoais são preenchidos automaticamente a partir da sua conta.</p>
                </div>

                <form method="POST" action="{{ route('reclamacoes.store') }}" id="nova-reclamacao-form">
                    @csrf
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 space-y-5">

                        {{-- Pre-filled: Nome + NIF --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Nome Completo</label>
                                <input type="text" value="{{ $user->nome_completo }}" readonly class="w-full px-4 py-3 border border-gray-100 rounded-xl text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">NIF / Nº de BI</label>
                                <input type="text" value="{{ $user->nif ?? '' }}" readonly class="w-full px-4 py-3 border border-gray-100 rounded-xl text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                            </div>
                        </div>

                        {{-- Pre-filled: Email + Telefone --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Email</label>
                                <input type="email" value="{{ $user->email }}" readonly class="w-full px-4 py-3 border border-gray-100 rounded-xl text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Telefone</label>
                                <input type="text" value="{{ $user->telefone ? '+238 '.$user->telefone : '' }}" readonly class="w-full px-4 py-3 border border-gray-100 rounded-xl text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                            </div>
                        </div>

                        {{-- Pre-filled: Ilha + Concelho --}}
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Ilha</label>
                                <input type="text" value="{{ $user->ilha ?? '' }}" readonly placeholder="—" class="w-full px-4 py-3 border border-gray-100 rounded-xl text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Concelho</label>
                                <input type="text" value="{{ $user->concelho ?? '' }}" readonly placeholder="—" class="w-full px-4 py-3 border border-gray-100 rounded-xl text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
                            </div>
                        </div>

                        <div class="border-t border-gray-100 pt-5 space-y-5">

                            {{-- Validation errors --}}
                            @if($errors->any())
                                <div class="p-3.5 bg-red-50 border border-red-200 rounded-xl text-xs text-red-600 space-y-1">
                                    @foreach($errors->all() as $error)
                                        <p>• {{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Empresa --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Empresa <span class="text-cv-red">*</span></label>
                                <input type="text" name="empresa_nome" value="{{ old('empresa_nome') }}" placeholder="Nome da empresa visada"
                                       class="w-full px-4 py-3 border {{ $errors->has('empresa_nome') ? 'border-red-400' : 'border-gray-200' }} rounded-xl text-sm focus:outline-none focus:border-cv-blue focus:ring-2 focus:ring-blue-100 transition-all">
                            </div>

                            {{-- Assunto + Categoria --}}
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Assunto <span class="text-cv-red">*</span></label>
                                    <input type="text" name="assunto" value="{{ old('assunto') }}" placeholder="Resumo da reclamação"
                                           class="w-full px-4 py-3 border {{ $errors->has('assunto') ? 'border-red-400' : 'border-gray-200' }} rounded-xl text-sm focus:outline-none focus:border-cv-blue focus:ring-2 focus:ring-blue-100 transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Categoria <span class="text-cv-red">*</span></label>
                                    <select name="categoria"
                                            class="w-full px-4 py-3 border {{ $errors->has('categoria') ? 'border-red-400' : 'border-gray-200' }} rounded-xl text-sm focus:outline-none focus:border-cv-blue focus:ring-2 focus:ring-blue-100 transition-all appearance-none bg-white">
                                        <option value="" disabled {{ old('categoria') ? '' : 'selected' }}>Selecionar</option>
                                        @foreach(['Telecomunicações','Energia e água','Transporte aéreo','Serviços bancários','Comércio a retalho','Saúde','Seguros','Transportes terrestres','Outro'] as $cat)
                                            <option value="{{ $cat }}" {{ old('categoria') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Descrição --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">Descrição <span class="text-cv-red">*</span></label>
                                <textarea name="descricao" rows="5" placeholder="Descreva detalhadamente o problema, incluindo datas, valores e o que espera como resolução..."
                                          class="w-full px-4 py-3 border {{ $errors->has('descricao') ? 'border-red-400' : 'border-gray-200' }} rounded-xl text-sm focus:outline-none focus:border-cv-blue focus:ring-2 focus:ring-blue-100 transition-all resize-none">{{ old('descricao') }}</textarea>
                                <p class="text-xs text-gray-400 mt-1">Mínimo 30 caracteres.</p>
                            </div>

                            {{-- Buttons --}}
                            <div class="flex gap-3">
                                <button type="button" onclick="showPage('dashboard')"
                                        class="flex-1 py-3 border border-gray-200 text-gray-500 font-semibold rounded-xl hover:bg-gray-50 transition-colors text-sm">
                                    Cancelar
                                </button>
                                <button type="button"
                                        onclick="abrirModalSubmeter(event)"
                                        class="flex-1 py-3 bg-cv-blue text-white font-display font-bold rounded-xl hover:bg-blue-700 transition-colors text-sm shadow-md shadow-blue-200">
                                    Submeter Reclamação
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- ═══ DELETE CONFIRMATION MODAL ═══ --}}
        <div id="modal-eliminar"
             class="hidden fixed inset-0 z-50 flex items-center justify-center px-4"
             style="background: rgba(13,27,62,0.5);">
            <div class="bg-white rounded-2xl shadow-2xl p-7 w-full max-w-sm"
                 style="animation: fadeUp .2s ease both;">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-cv-red" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-cv-navy text-base">Eliminar Reclamação</h3>
                        <p class="text-xs text-gray-400 mt-0.5" id="modal-ref-text"></p>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mb-6 leading-relaxed">
                    Tem a certeza que deseja eliminar esta reclamação? <span class="font-semibold text-gray-700">Esta ação não pode ser desfeita.</span>
                </p>
                <div class="flex gap-3">
                    <button type="button" onclick="fecharModalEliminar()"
                            class="flex-1 py-2.5 border border-gray-200 text-gray-500 font-semibold rounded-xl hover:bg-gray-50 transition-colors text-sm">
                        Cancelar
                    </button>
                    <button type="button" onclick="confirmarEliminar()"
                            class="flex-1 py-2.5 bg-cv-red text-white font-display font-bold rounded-xl hover:bg-red-700 transition-colors text-sm shadow-sm shadow-red-200">
                        Sim, eliminar
                    </button>
                </div>
            </div>
        </div>

        {{-- ═══ SUBMIT CONFIRMATION MODAL ═══ --}}
        <div id="modal-submeter"
             class="hidden fixed inset-0 z-50 flex items-center justify-center px-4"
             style="background: rgba(13,27,62,0.5);">
            <div class="bg-white rounded-2xl shadow-2xl p-7 w-full max-w-sm">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-cv-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-cv-navy text-base">Confirmar Reclamação</h3>
                        <p class="text-xs text-gray-400 mt-0.5">Reveja antes de submeter</p>
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl p-4 mb-5 space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span class="text-gray-400">Empresa</span>
                        <span class="font-semibold text-cv-navy text-right max-w-[180px] truncate" id="confirm-empresa">—</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Assunto</span>
                        <span class="font-semibold text-cv-navy text-right max-w-[180px] truncate" id="confirm-assunto">—</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Categoria</span>
                        <span class="font-semibold text-cv-navy" id="confirm-categoria">—</span>
                    </div>
                </div>
                <p class="text-xs text-gray-400 mb-5 leading-relaxed">
                    Ao confirmar, a sua reclamação será registada e a empresa notificada.
                    Tem a certeza que os dados estão corretos?
                </p>
                <div class="flex gap-3">
                    <button type="button" onclick="fecharModalSubmeter()"
                            class="flex-1 py-2.5 border border-gray-200 text-gray-500 font-semibold rounded-xl hover:bg-gray-50 transition-colors text-sm">
                        Rever
                    </button>
                    <button type="button" onclick="submeterReclamacao()"
                            class="flex-1 py-2.5 bg-cv-blue text-white font-display font-bold rounded-xl hover:bg-blue-700 transition-colors text-sm">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>

    </main>
</div>

<script>
    const pages = ['dashboard', 'reclamacoes', 'perfil', 'definicoes', 'nova'];
    const pageTitles = {
        dashboard:   'Painel Principal',
        reclamacoes: 'Minhas Reclamações',
        perfil:      'O Meu Perfil',
        definicoes:  'Definições',
        nova:        'Nova Reclamação',
    };

    function showPage(page) {
        pages.forEach(p => {
            const el  = document.getElementById('page-' + p);
            const nav = document.getElementById('nav-' + p);
            if (el)  el.classList.add('hidden');
            if (nav) nav.classList.remove('active');
        });
        const target = document.getElementById('page-' + page);
        const navBtn = document.getElementById('nav-' + page);
        if (target) target.classList.remove('hidden');
        if (navBtn) navBtn.classList.add('active');
        const titleEl = document.getElementById('page-title');
        if (titleEl) titleEl.textContent = pageTitles[page] || 'Painel Principal';
    }

    // ── Submit confirmation modal ─────────────────────────────
    function abrirModalSubmeter(e) {
        e.preventDefault();
        const empresa   = document.querySelector('input[name="empresa_nome"]')?.value?.trim() || '—';
        const assunto   = document.querySelector('input[name="assunto"]')?.value?.trim()     || '—';
        const categoria = document.querySelector('select[name="categoria"]')?.value          || '—';

        if (!empresa || empresa === '—') {
            document.querySelector('input[name="empresa_nome"]').focus();
            return;
        }

        document.getElementById('confirm-empresa').textContent   = empresa;
        document.getElementById('confirm-assunto').textContent   = assunto   || '—';
        document.getElementById('confirm-categoria').textContent = categoria || '—';
        document.getElementById('modal-submeter').classList.remove('hidden');
    }

    function fecharModalSubmeter() {
        document.getElementById('modal-submeter').classList.add('hidden');
    }

    function submeterReclamacao() {
        document.getElementById('modal-submeter').classList.add('hidden');
        document.getElementById('nova-reclamacao-form').submit();
    }

    document.getElementById('modal-submeter').addEventListener('click', function(e) {
        if (e.target === this) fecharModalSubmeter();
    });

    // ── Delete confirmation modal ─────────────────────────────
    let _deleteId = null;

    function abrirModalEliminar(id, ref) {
        _deleteId = id;
        document.getElementById('modal-ref-text').textContent = ref;
        document.getElementById('modal-eliminar').classList.remove('hidden');
    }

    function fecharModalEliminar() {
        _deleteId = null;
        document.getElementById('modal-eliminar').classList.add('hidden');
    }

    function confirmarEliminar() {
        if (!_deleteId) return;
        const form   = document.createElement('form');
        form.method  = 'POST';
        form.action  = '/reclamacoes/' + _deleteId;
        const csrf   = document.createElement('input');
        csrf.type    = 'hidden';
        csrf.name    = '_token';
        csrf.value   = document.querySelector('meta[name="csrf-token"]').content;
        const method = document.createElement('input');
        method.type  = 'hidden';
        method.name  = '_method';
        method.value = 'DELETE';
        form.appendChild(csrf);
        form.appendChild(method);
        document.body.appendChild(form);
        form.submit();
    }

    document.getElementById('modal-eliminar').addEventListener('click', function(e) {
        if (e.target === this) fecharModalEliminar();
    });

    // ── Filter ────────────────────────────────────────────────
    function filterTable() {
        const from   = document.getElementById('filter-from').value;
        const to     = document.getElementById('filter-to').value;
        const estado = document.getElementById('filter-estado').value;
        const rows   = document.querySelectorAll('#reclamacoes-tbody tr');
        let visible  = 0;
        rows.forEach(row => {
            const date     = row.dataset.date  || '';
            const rowState = row.dataset.estado || '';
            let show = true;
            if (from   && date     < from)    show = false;
            if (to     && date     > to)      show = false;
            if (estado && rowState !== estado) show = false;
            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        document.getElementById('filter-empty').classList.toggle('hidden', visible > 0);
    }

    function clearFilters() {
        document.getElementById('filter-from').value   = '';
        document.getElementById('filter-to').value     = '';
        document.getElementById('filter-estado').value = '';
        document.querySelectorAll('#reclamacoes-tbody tr').forEach(r => r.style.display = '');
        document.getElementById('filter-empty').classList.add('hidden');
    }

    // ── Notifications ─────────────────────────────────────────
    function toggleNotif() {
        document.getElementById('notif-dropdown').classList.toggle('hidden');
    }

    function markRead(el) {
        if (el.dataset.read === 'true') return;
        el.dataset.read = 'true';
        el.classList.remove('bg-blue-50/40');
        const dot = el.querySelector('.unread-dot');
        if (dot) dot.remove();
        updateBadge();
    }

    function markAllRead() {
        document.querySelectorAll('.notif-item[data-read="false"]').forEach(el => markRead(el));
    }

    function updateBadge() {
        const unread = document.querySelectorAll('.notif-item[data-read="false"]').length;
        const badge  = document.getElementById('notif-badge');
        const dot    = document.getElementById('notif-dot');
        if (badge) { badge.textContent = unread; badge.style.display = unread ? '' : 'none'; }
        if (dot)   { dot.style.display = unread ? '' : 'none'; }
    }

    document.addEventListener('click', function(e) {
        const wrapper = document.getElementById('notif-wrapper');
        if (wrapper && !wrapper.contains(e.target)) {
            document.getElementById('notif-dropdown').classList.add('hidden');
        }
    });
</script>

</body>
</html>
