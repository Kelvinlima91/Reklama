<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 10px; font-size: 0.875rem; font-weight: 500; color: #93C5FD; transition: all .2s; cursor: pointer; width: 100%; text-align: left; border: none; background: transparent; }
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

        {{-- Logo — open book white version --}}
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

        {{-- Company info — dynamic --}}
        <div class="relative z-10 px-6 py-5 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-cv-green flex items-center justify-center font-display font-bold text-white text-sm flex-shrink-0">
                    {{ strtoupper(substr($empresa->nome_comercial, 0, 1)) }}{{ strtoupper(substr(strrchr($empresa->nome_comercial, ' ') ?: $empresa->nome_comercial, 1, 1)) }}
                </div>
                <div>
                    <div class="text-white text-sm font-semibold">{{ $empresa->nome_comercial }}</div>
                    <div class="text-green-300 text-xs">Empresa · {{ $empresa->verificada ? 'Verificada' : 'Pendente' }}</div>
                </div>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="relative z-10 flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            <p class="text-blue-400 text-xs font-bold uppercase tracking-widest px-3 mb-3">Gestão</p>
            <button onclick="showPage('dashboard')" class="nav-item w-full active" id="nav-dashboard">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Painel Principal
            </button>
            <button onclick="showPage('reclamacoes')" class="nav-item w-full" id="nav-reclamacoes">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Reclamações Recebidas
                <span class="ml-auto bg-cv-red text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $stats['pendentes'] }}</span>
            </button>
            <button onclick="showPage('pendentes')" class="nav-item w-full" id="nav-pendentes">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                Respostas Pendentes
            </button>
            <button onclick="showPage('relatorios')" class="nav-item w-full" id="nav-relatorios">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                Relatórios
            </button>

            <p class="text-blue-400 text-xs font-bold uppercase tracking-widest px-3 mt-6 mb-3">Empresa</p>
            <button onclick="showPage('perfil')" class="nav-item w-full" id="nav-perfil">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                Perfil da Empresa
            </button>
            <button onclick="showPage('utilizadores')" class="nav-item w-full" id="nav-utilizadores">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Utilizadores
            </button>
        </nav>

        {{-- Logout --}}
        <div class="relative z-10 px-4 py-5 border-t border-white/10">
            <form method="POST" action="{{ route('empresa.logout') }}">
                @csrf
                <button type="submit" class="nav-item w-full text-red-300 hover:text-red-200 hover:bg-red-900/30">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Sair da Conta
                </button>
            </form>
        </div>
    </aside>

    {{-- ═══════ MAIN ═══════ --}}
    <main class="flex-1 lg:ml-64 flex flex-col min-h-screen">

        <header class="bg-white border-b border-gray-100 px-6 lg:px-8 py-4 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h1 class="font-display font-extrabold text-cv-navy text-xl" id="page-title">Painel da Empresa</h1>
                <p class="text-gray-400 text-xs mt-0.5">{{ ucfirst(now()->locale('pt')->isoFormat('dddd, D [de] MMMM [de] YYYY')) }}</p>
            </div>
            <div class="flex items-center gap-3">
                {{-- Notification bell --}}
                <div class="relative" id="notif-wrapper">
                    <button type="button" id="notif-btn" onclick="toggleNotif()"
                            class="relative p-2 rounded-xl hover:bg-gray-100 transition-colors">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span id="notif-dot" class="absolute top-1.5 right-1.5 w-2 h-2 bg-cv-red rounded-full {{ $notificacoes->where('lida', false)->count() === 0 ? 'hidden' : '' }}"></span>
                    </button>

                    <div id="notif-dropdown" class="hidden absolute right-0 top-12 w-96 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden z-50">
                        <div class="px-4 py-3 border-b border-gray-100 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="font-display font-bold text-sm text-cv-navy">Notificações</span>
                                <span id="notif-badge" class="bg-cv-red text-white text-xs font-bold px-2 py-0.5 rounded-full {{ $notificacoes->where('lida', false)->count() === 0 ? 'hidden' : '' }}">{{ $notificacoes->where('lida', false)->count() }}</span>
                            </div>
                            <button type="button" onclick="markAllRead()" class="text-xs text-cv-green font-medium hover:underline">Marcar tudo como lido</button>
                        </div>

                        @forelse($notificacoes as $notif)
                        @php
                            $isLast = $loop->last;
                            $iconBg = match($notif->tipo ?? 'info') {
                                'reclamacao_nova'      => 'bg-red-100',
                                'reclamacao_atualizada'=> 'bg-blue-100',
                                'prazo'                => 'bg-yellow-100',
                                'resolvida'            => 'bg-green-100',
                                default                => 'bg-gray-100',
                            };
                            $iconColor = match($notif->tipo ?? 'info') {
                                'reclamacao_nova'      => 'text-cv-red',
                                'reclamacao_atualizada'=> 'text-cv-blue',
                                'prazo'                => 'text-yellow-600',
                                'resolvida'            => 'text-cv-green',
                                default                => 'text-gray-500',
                            };
                        @endphp
                        <div class="notif-item flex items-start gap-3 px-4 py-3.5 {{ $isLast ? '' : 'border-b border-gray-50' }} {{ $notif->lida ? '' : 'bg-blue-50/40' }} hover:bg-gray-50 transition-colors cursor-pointer"
                             data-read="{{ $notif->lida ? 'true' : 'false' }}"
                             data-id="{{ $notif->id }}"
                             onclick="markRead(this)">
                            <div class="w-9 h-9 rounded-xl {{ $iconBg }} flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 {{ $iconColor }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-cv-navy truncate">{{ $notif->titulo }}</p>
                                <p class="text-xs text-gray-500 mt-0.5 leading-relaxed">{{ $notif->mensagem }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $notif->created_at->diffForHumans() }}</p>
                            </div>
                            @if(!$notif->lida)
                                <div class="w-2 h-2 rounded-full bg-cv-green flex-shrink-0 mt-2 unread-dot"></div>
                            @endif
                        </div>
                        @empty
                        <div class="px-4 py-8 text-center text-xs text-gray-400">
                            <svg class="w-8 h-8 mx-auto mb-2 text-gray-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                            Sem notificações
                        </div>
                        @endforelse

                        <div class="px-4 py-2.5 border-t border-gray-100 bg-gray-50/50 text-center">
                            <button type="button" class="text-xs text-cv-green font-semibold hover:underline">Ver todas as notificações</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 px-6 lg:px-8 py-8 space-y-8" id="page-dashboard">

            {{-- Banner --}}
            <div class="relative overflow-hidden bg-cv-navy rounded-2xl p-7 pattern-dots">
                <div class="blob w-48 h-48 bg-cv-green top-0 right-0"></div>
                <div class="blob w-32 h-32 bg-cv-blue bottom-0 left-20"></div>
                <div class="relative z-10">
                    <p class="text-green-300 text-sm mb-1">Bem-vindo,</p>
                    <h2 class="font-display font-extrabold text-white text-2xl mb-2">{{ $empresa->nome_comercial }}</h2>
                    <p class="text-blue-200 text-sm">Tem <span class="text-cv-red font-semibold">{{ $stats['pendentes'] }} {{ $stats['pendentes'] == 1 ? 'reclamação pendente' : 'reclamações pendentes' }}</span> de resposta e <span class="text-cv-green font-semibold">prazo de 48h</span> para responder.</p>
                </div>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-blue" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">{{ $stats['total'] }}</div>
                    <div class="text-gray-500 text-xs mt-1">Total Recebidas</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-red" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">{{ $stats['pendentes'] }}</div>
                    <div class="text-gray-500 text-xs mt-1">Pendentes</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-green" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">{{ $stats['resolvidas'] }}</div>
                    <div class="text-gray-500 text-xs mt-1">Resolvidas</div>
                </div>
                <div class="stat-card">
                    <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center mb-4">
                        <svg class="w-5 h-5 text-cv-green" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    </div>
                    <div class="font-display font-extrabold text-2xl text-cv-navy">{{ $stats['taxa'] }}%</div>
                    <div class="text-gray-500 text-xs mt-1">Taxa de Resolução</div>
                </div>
            </div>

            {{-- Full-width table --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                {{-- Table header with filter --}}
                <div class="px-6 py-4 border-b border-gray-100">
                    <div class="flex items-center justify-between flex-wrap gap-3">
                        <div class="flex items-center gap-3">
                            <h3 class="font-display font-bold text-cv-navy">Reclamações Pendentes de Resposta</h3>
                            <span class="badge bg-red-100 text-red-600">{{ $stats['pendentes'] }} {{ $stats['pendentes'] == 1 ? 'pendente' : 'pendentes' }}</span>
                        </div>
                        {{-- Filter toggle button --}}
                        <button type="button" onclick="toggleFilter()"
                                class="flex items-center gap-1.5 px-3 py-1.5 border border-gray-200 rounded-lg text-xs font-semibold text-gray-500 hover:border-cv-green hover:text-cv-green transition-colors"
                                id="filter-toggle-btn">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                            Filtrar
                        </button>
                    </div>

                    {{-- Filter panel (hidden by default) --}}
                    <div id="filter-panel" class="hidden mt-4 pt-4 border-t border-gray-100">
                        <div class="flex flex-wrap gap-3 items-end">
                            {{-- Search consumer --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1.5">Consumidor</label>
                                <input type="text" id="filter-consumidor" placeholder="Nome do consumidor"
                                       oninput="filterPendentes()"
                                       class="text-xs border border-gray-200 rounded-lg px-3 py-2 text-gray-600 focus:outline-none focus:border-cv-green transition-colors w-44">
                            </div>
                            {{-- Prazo filter --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1.5">Prazo</label>
                                <select id="filter-prazo" onchange="filterPendentes()"
                                        class="text-xs border border-gray-200 rounded-lg px-3 py-2 text-gray-600 focus:outline-none focus:border-cv-green transition-colors appearance-none">
                                    <option value="">Todos</option>
                                    <option value="urgente">Urgente</option>
                                    <option value="24h">24h</option>
                                    <option value="48h">48h</option>
                                </select>
                            </div>
                            {{-- Assunto search --}}
                            <div>
                                <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1.5">Assunto</label>
                                <input type="text" id="filter-assunto" placeholder="Palavra-chave"
                                       oninput="filterPendentes()"
                                       class="text-xs border border-gray-200 rounded-lg px-3 py-2 text-gray-600 focus:outline-none focus:border-cv-green transition-colors w-36">
                            </div>
                            {{-- Clear --}}
                            <button type="button" onclick="clearFilters()"
                                    class="flex items-center gap-1 text-xs text-gray-400 hover:text-cv-green font-medium transition-colors px-2 py-2">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                Limpar
                            </button>
                        </div>
                        <p id="filter-empty" class="hidden text-xs text-gray-400 mt-3">Nenhuma reclamação encontrada com os filtros aplicados.</p>
                    </div>
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
                        <tbody class="divide-y divide-gray-50" id="pendentes-tbody">
                            @forelse($reclamacoes as $rec)
                            @php
                                $deadline = $rec->prazo_empresa ?? $rec->created_at->addHours(48);
                                $prazo    = now()->diffInHours($deadline, false);
                                if ($prazo < 0) {
                                    $prazoLabel = 'Urgente';
                                    $prazoBadge = 'bg-red-100 text-red-600';
                                    $prazoData  = 'urgente';
                                } elseif ($prazo <= 24) {
                                    $prazoLabel = '24h';
                                    $prazoBadge = 'bg-yellow-100 text-yellow-600';
                                    $prazoData  = '24h';
                                } else {
                                    $prazoLabel = '48h';
                                    $prazoBadge = 'bg-green-100 text-green-600';
                                    $prazoData  = '48h';
                                }
                            @endphp
                            <tr class="hover:bg-gray-50/50 transition-colors"
                                data-consumidor="{{ strtolower($rec->user->nome_completo ?? '') }}"
                                data-assunto="{{ strtolower($rec->assunto) }}"
                                data-prazo="{{ $prazoData }}">
                                <td class="px-6 py-4 font-mono text-xs text-gray-400">
                                    {{ $rec->numero_referencia ?? '#'.str_pad($rec->id, 5, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-cv-navy">{{ $rec->user->nome_completo ?? '—' }}</td>
                                <td class="px-6 py-4 text-gray-600 max-w-xs truncate">{{ $rec->assunto }}</td>
                                <td class="px-6 py-4">
                                    <span class="badge {{ $prazoBadge }}">{{ $prazoLabel }}</span>
                                </td>
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
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-400">
                                    <svg class="w-10 h-10 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Sem reclamações pendentes de resposta.
                                </td>
                            </tr>
                            @endforelse
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
                                <span class="font-bold text-cv-green">{{ $stats['taxa'] }}%</span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-cv-green h-2 rounded-full" style="width:{{ $stats['taxa'] }}%"></div>
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
                            <div class="flex items-center gap-2"><div class="w-2.5 h-2.5 rounded-full bg-cv-blue"></div><span class="text-xs text-gray-600">Internet</span></div>
                            <span class="text-xs font-bold text-cv-navy">18</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2"><div class="w-2.5 h-2.5 rounded-full bg-cv-green"></div><span class="text-xs text-gray-600">Faturação</span></div>
                            <span class="text-xs font-bold text-cv-navy">14</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2"><div class="w-2.5 h-2.5 rounded-full bg-yellow-400"></div><span class="text-xs text-gray-600">Atendimento</span></div>
                            <span class="text-xs font-bold text-cv-navy">9</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2"><div class="w-2.5 h-2.5 rounded-full bg-cv-red"></div><span class="text-xs text-gray-600">Outros</span></div>
                            <span class="text-xs font-bold text-cv-navy">6</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{-- end page-dashboard --}}

        {{-- ═══ RECLAMAÇÕES PAGE (placeholder) ═══ --}}
        <div id="page-reclamacoes" class="hidden flex-1 px-6 lg:px-8 py-8">
            <div class="max-w-4xl">
                <h2 class="font-display font-extrabold text-cv-navy text-xl mb-1">Reclamações Recebidas</h2>
                <p class="text-gray-400 text-sm mb-6">Todas as reclamações associadas à sua empresa</p>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center text-sm text-gray-400">
                    <svg class="w-10 h-10 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Página em desenvolvimento.
                </div>
            </div>
        </div>

        {{-- ═══ PENDENTES PAGE (placeholder) ═══ --}}
        <div id="page-pendentes" class="hidden flex-1 px-6 lg:px-8 py-8">
            <div class="max-w-4xl">
                <h2 class="font-display font-extrabold text-cv-navy text-xl mb-1">Respostas Pendentes</h2>
                <p class="text-gray-400 text-sm mb-6">Reclamações que aguardam a sua resposta</p>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center text-sm text-gray-400">
                    <svg class="w-10 h-10 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Página em desenvolvimento.
                </div>
            </div>
        </div>

        {{-- ═══ RELATÓRIOS PAGE (placeholder) ═══ --}}
        <div id="page-relatorios" class="hidden flex-1 px-6 lg:px-8 py-8">
            <div class="max-w-4xl">
                <h2 class="font-display font-extrabold text-cv-navy text-xl mb-1">Relatórios</h2>
                <p class="text-gray-400 text-sm mb-6">Análise de desempenho e estatísticas</p>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center text-sm text-gray-400">
                    <svg class="w-10 h-10 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    Página em desenvolvimento.
                </div>
            </div>
        </div>

        {{-- ═══ PERFIL PAGE (placeholder) ═══ --}}
        <div id="page-perfil" class="hidden flex-1 px-6 lg:px-8 py-8">
            <div class="max-w-2xl">
                <h2 class="font-display font-extrabold text-cv-navy text-xl mb-1">Perfil da Empresa</h2>
                <p class="text-gray-400 text-sm mb-6">Informações da sua empresa</p>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-cv-green flex items-center justify-center font-display font-bold text-white text-lg">
                            {{ strtoupper(substr($empresa->nome_comercial, 0, 1)) }}{{ strtoupper(substr(strrchr($empresa->nome_comercial, ' ') ?: $empresa->nome_comercial, 1, 1)) }}
                        </div>
                        <div>
                            <div class="font-display font-bold text-cv-navy text-lg">{{ $empresa->nome_comercial }}</div>
                            <span class="inline-flex items-center mt-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-cv-green">
                                {{ $empresa->verificada ? 'Verificada' : 'Pendente de verificação' }}
                            </span>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-50">
                        <div class="px-6 py-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500 font-medium">Email</span>
                            <span class="text-sm font-semibold text-cv-navy">{{ $empresa->email }}</span>
                        </div>
                        <div class="px-6 py-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500 font-medium">Telefone</span>
                            <span class="text-sm font-semibold text-cv-navy">{{ $empresa->telefone ? '+238 '.$empresa->telefone : '—' }}</span>
                        </div>
                        <div class="px-6 py-4 flex justify-between items-center">
                            <span class="text-sm text-gray-500 font-medium">Membro desde</span>
                            <span class="text-sm font-semibold text-cv-navy">{{ $empresa->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                        <p class="text-xs text-gray-400">Para alterar os dados da empresa, contacte <span class="text-cv-green"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="047771746b76706144686d72766b76616768656965676b61772a6772">[email&#160;protected]</a></span></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ═══ UTILIZADORES PAGE (placeholder) ═══ --}}
        <div id="page-utilizadores" class="hidden flex-1 px-6 lg:px-8 py-8">
            <div class="max-w-2xl">
                <h2 class="font-display font-extrabold text-cv-navy text-xl mb-1">Utilizadores</h2>
                <p class="text-gray-400 text-sm mb-6">Membros da sua equipa com acesso à plataforma</p>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 text-center text-sm text-gray-400">
                    <svg class="w-10 h-10 mx-auto mb-3 text-gray-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Página em desenvolvimento.
                </div>
            </div>
        </div>

    </main>
</div>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
    const pages = ['dashboard', 'reclamacoes', 'pendentes', 'relatorios', 'perfil', 'utilizadores'];
    const pageTitles = {
        dashboard:    'Painel da Empresa',
        reclamacoes:  'Reclamações Recebidas',
        pendentes:    'Respostas Pendentes',
        relatorios:   'Relatórios',
        perfil:       'Perfil da Empresa',
        utilizadores: 'Utilizadores',
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
        if (titleEl) titleEl.textContent = pageTitles[page] || 'Painel da Empresa';
    }

    // ── Filter panel toggle ──────────────────────────────────
    function toggleFilter() {
        const panel = document.getElementById('filter-panel');
        const btn   = document.getElementById('filter-toggle-btn');
        const open  = panel.classList.toggle('hidden');
        btn.classList.toggle('border-cv-green', !open);
        btn.classList.toggle('text-cv-green',   !open);
        if (open) clearFilters();
    }

    function filterPendentes() {
        const consumidor = document.getElementById('filter-consumidor').value.toLowerCase().trim();
        const prazo      = document.getElementById('filter-prazo').value;
        const assunto    = document.getElementById('filter-assunto').value.toLowerCase().trim();
        const rows       = document.querySelectorAll('#pendentes-tbody tr');
        let visible      = 0;

        rows.forEach(row => {
            const rowCons   = row.dataset.consumidor || '';
            const rowPrazo  = row.dataset.prazo      || '';
            const rowAssunt = row.dataset.assunto     || '';
            let show = true;
            if (consumidor && !rowCons.includes(consumidor))   show = false;
            if (prazo      && rowPrazo !== prazo)              show = false;
            if (assunto    && !rowAssunt.includes(assunto))    show = false;
            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        document.getElementById('filter-empty').classList.toggle('hidden', visible > 0);
    }

    function clearFilters() {
        document.getElementById('filter-consumidor').value = '';
        document.getElementById('filter-prazo').value      = '';
        document.getElementById('filter-assunto').value    = '';
        document.querySelectorAll('#pendentes-tbody tr').forEach(r => r.style.display = '');
        document.getElementById('filter-empty').classList.add('hidden');
    }

    // ── Notifications ────────────────────────────────────────
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    function toggleNotif() {
        document.getElementById('notif-dropdown').classList.toggle('hidden');
    }

    /**
     * Mark a single notification as read:
     *   1. Update the UI immediately (optimistic)
     *   2. Persist lida=true to the DB via POST /empresa/notificacoes/{id}/lida
     *   3. On failure: fully revert UI including the unread dot
     */
    function markRead(el) {
        if (el.dataset.read === 'true') return; // already read — skip

        // Optimistic UI update
        el.dataset.read = 'true';
        el.classList.remove('bg-blue-50/40');
        const dot = el.querySelector('.unread-dot');
        if (dot) dot.remove();
        updateBadge();

        // Persist to DB
        const notifId = el.dataset.id;
        if (notifId) {
            fetch(`/empresa/notificacoes/${notifId}/lida`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            }).catch(() => {
                // Full revert on failure — including dot restoration
                el.dataset.read = 'false';
                el.classList.add('bg-blue-50/40');
                if (!el.querySelector('.unread-dot')) {
                    const newDot = document.createElement('div');
                    newDot.className = 'w-2 h-2 rounded-full bg-cv-green flex-shrink-0 mt-2 unread-dot';
                    el.appendChild(newDot);
                }
                updateBadge();
            });
        }
    }

    /**
     * Mark all as read in one single request — not N individual requests.
     */
    function markAllRead() {
        const unreadItems = document.querySelectorAll('.notif-item[data-read="false"]');
        if (unreadItems.length === 0) return;

        // Optimistic UI update for all items
        unreadItems.forEach(el => {
            el.dataset.read = 'true';
            el.classList.remove('bg-blue-50/40');
            const dot = el.querySelector('.unread-dot');
            if (dot) dot.remove();
        });
        updateBadge();

        // Single request for all
        fetch('/empresa/notificacoes/todas-lidas', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
        }).catch(() => {
            // Revert all on failure
            unreadItems.forEach(el => {
                el.dataset.read = 'false';
                el.classList.add('bg-blue-50/40');
                if (!el.querySelector('.unread-dot')) {
                    const newDot = document.createElement('div');
                    newDot.className = 'w-2 h-2 rounded-full bg-cv-green flex-shrink-0 mt-2 unread-dot';
                    el.appendChild(newDot);
                }
            });
            updateBadge();
        });
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