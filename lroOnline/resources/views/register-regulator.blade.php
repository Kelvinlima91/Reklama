<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registo DGPDC – Reklama Cabo Verde</title>

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
                        cv: { blue:'#1B4FD8', green:'#0F9B58', red:'#D32F2F', navy:'#0D1B3E' }
                    },
                    animation: { 'fade-up': 'fadeUp 0.6s ease both' },
                    keyframes: {
                        fadeUp: { '0%':{ opacity:'0', transform:'translateY(20px)' }, '100%':{ opacity:'1', transform:'translateY(0)' } }
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }
        .input-field {
            width: 100%; padding: .875rem 1rem .875rem 3rem;
            background: white; border: 1.5px solid #E5E7EB; border-radius: .75rem;
            font-size: .875rem; color: #0D1B3E; outline: none;
            transition: border-color .2s, box-shadow .2s; font-family: 'Inter', sans-serif;
        }
        .input-field:focus    { border-color: #D32F2F; box-shadow: 0 0 0 3px rgba(211,47,47,.10); }
        .input-field::placeholder { color: #9CA3AF; }
        .input-field.error    { border-color: #D32F2F; box-shadow: 0 0 0 3px rgba(211,47,47,.10); }
        select.input-field    { padding-left: 3rem; padding-right: 2.5rem; cursor: pointer; appearance: none; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #D32F2F; border-radius: 3px; }
    </style>
</head>

<body class="font-sans antialiased min-h-screen bg-gray-50 flex items-center justify-center px-4 py-12">
<div class="w-full max-w-xl animate-fade-up">

    {{-- Logo --}}
    <div class="text-center mb-8">
        <a href="{{ route('home') }}" class="inline-block mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 420 200" width="160" height="76">
                <path d="M30 62 L30 148 Q30 156 38 158 L105 162" stroke="#D32F2F" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M180 62 L180 148 Q180 156 172 158 L105 162" stroke="#D32F2F" stroke-width="5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M38 54 Q38 46 46 45 L105 42 L105 158 Q72 155 46 158 Q38 159 38 152 Z" fill="white" stroke="#D32F2F" stroke-width="4.5" stroke-linejoin="round"/>
                <path d="M172 54 Q172 46 164 45 L105 42 L105 158 Q138 155 164 158 Q172 159 172 152 Z" fill="white" stroke="#D32F2F" stroke-width="4.5" stroke-linejoin="round"/>
                <path d="M38 152 Q70 168 105 170 Q140 168 172 152" stroke="#D32F2F" stroke-width="4.5" fill="none" stroke-linecap="round"/>
                <path d="M105 42 Q102 100 105 170" stroke="#D32F2F" stroke-width="2.5" fill="none" stroke-linecap="round"/>
                <path d="M49 64 Q76 62 100 64" stroke="#D32F2F" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.3"/>
                <path d="M48 76 Q75 74 100 76" stroke="#D32F2F" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.3"/>
                <path d="M47 88 Q75 86 100 88" stroke="#D32F2F" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.3"/>
                <path d="M110 64 Q120 62 128 64" stroke="#D32F2F" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.3"/>
                <path d="M110 76 Q120 74 128 76" stroke="#D32F2F" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.3"/>
                <path d="M110 88 Q120 86 128 88" stroke="#D32F2F" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.3"/>
                <path d="M148 64 Q158 62 163 64" stroke="#D32F2F" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.3"/>
                <path d="M148 76 Q158 74 163 76" stroke="#D32F2F" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.3"/>
                <path d="M148 88 Q158 86 163 88" stroke="#D32F2F" stroke-width="1.8" fill="none" stroke-linecap="round" opacity="0.3"/>
                <rect x="131" y="62" width="14" height="54" rx="7" fill="#D32F2F"/>
                <circle cx="138" cy="130" r="9" fill="#D32F2F"/>
                <text x="200" y="110" font-family="Sora,sans-serif" font-size="52" font-weight="800" fill="#0D1B3E">reklama</text>
                <text x="202" y="138" font-family="Inter,sans-serif" font-size="11" font-weight="600" fill="#D32F2F" letter-spacing="4">CABO VERDE</text>
            </svg>
        </a>
        <h1 class="font-display text-2xl font-extrabold text-cv-navy mb-1">Acesso DGPDC</h1>
        <p class="text-gray-400 text-sm">Registo reservado a funcionários da DGPDC</p>
    </div>

    {{-- Info banner --}}
    <div class="mb-6 flex items-start gap-3 px-4 py-3.5 bg-red-50 border border-red-100 rounded-xl">
        <svg class="w-4 h-4 text-cv-red flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <p class="text-xs text-red-700 leading-relaxed">A conta criada ficará <strong>pendente de aprovação</strong> por um administrador antes de ser activada.</p>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

        @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-600 flex items-start gap-2">
            <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('regulador.register.post') }}" class="space-y-4">
            @csrf

            {{-- Row 1: Nome + Apelido --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nome</label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <input type="text" name="nome" value="{{ old('nome') }}"
                               placeholder="Primeiro nome"
                               class="input-field @error('nome') error @enderror">
                    </div>
                    @error('nome') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Apelido</label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <input type="text" name="apelido" value="{{ old('apelido') }}"
                               placeholder="Apelido"
                               class="input-field @error('apelido') error @enderror">
                    </div>
                    @error('apelido') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email institucional</label>
                <div class="relative">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                        <svg class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}"
                           placeholder="nome@dgpdc.cv"
                           class="input-field @error('email') error @enderror">
                </div>
                @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            {{-- Row 2: Nº Funcionário + Cargo --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Nº de Funcionário</label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/></svg>
                        </div>
                        <input type="text" name="numero_funcionario" value="{{ old('numero_funcionario') }}"
                               placeholder="Ex: DGPDC-001"
                               class="input-field @error('numero_funcionario') error @enderror">
                    </div>
                    @error('numero_funcionario') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Cargo</label>
                    <div class="relative">
                        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <svg class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <select name="cargo" class="input-field appearance-none pr-8 @error('cargo') error @enderror">
                            <option value="" disabled {{ old('cargo') ? '' : 'selected' }}>Selecionar</option>
                            @foreach(['Técnico Superior','Inspector','Coordenador','Director','Administrador'] as $c)
                                <option value="{{ $c }}" {{ old('cargo') === $c ? 'selected' : '' }}>{{ $c }}</option>
                            @endforeach
                        </select>
                        <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                    @error('cargo') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Departamento --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Departamento</label>
                <div class="relative">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <svg class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <select name="departamento" class="input-field appearance-none pr-8 @error('departamento') error @enderror">
                        <option value="" disabled {{ old('departamento') ? '' : 'selected' }}>Selecionar</option>
                        @foreach(['Defesa do Consumidor','Fiscalização e Controlo','Regulação de Mercados','Tecnologia e Sistemas','Jurídico','Administração Geral'] as $d)
                            <option value="{{ $d }}" {{ old('departamento') === $d ? 'selected' : '' }}>{{ $d }}</option>
                        @endforeach
                    </select>
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
                @error('departamento') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Palavra-passe</label>
                <div class="relative">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                        <svg class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    </div>
                    <input type="password" id="password-input" name="password"
                           placeholder="Mínimo 8 caracteres"
                           class="input-field @error('password') error @enderror">
                    <button type="button" onclick="togglePassword()" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </button>
                </div>
                <div class="mt-2 flex items-center gap-2">
                    <div id="strength-bars" class="flex-1 grid grid-cols-4 gap-1">
                        <div class="h-1 rounded-full bg-gray-200"></div>
                        <div class="h-1 rounded-full bg-gray-200"></div>
                        <div class="h-1 rounded-full bg-gray-200"></div>
                        <div class="h-1 rounded-full bg-gray-200"></div>
                    </div>
                    <span class="text-xs text-gray-400">Força da senha</span>
                </div>
                @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">Confirmar Palavra-passe</label>
                <div class="relative">
                    <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                        <svg class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <input type="password" name="password_confirmation"
                           placeholder="Repita a palavra-passe"
                           class="input-field">
                </div>
            </div>

            {{-- Telefone --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                    Telefone de Serviço <span class="text-gray-400 font-normal">(opcional)</span>
                </label>
                <div class="flex gap-2">
                    <div class="flex items-center gap-1.5 px-3 py-3 bg-white border-[1.5px] border-gray-200 rounded-xl text-sm text-gray-700 font-medium whitespace-nowrap">
                        🇨🇻 +238
                    </div>
                    <input type="tel" name="telefone" value="{{ old('telefone') }}"
                           placeholder="260 89 00"
                           class="input-no-icon flex-1">
                </div>
            </div>

            {{-- Terms --}}
            <div class="flex items-start gap-2.5 pt-1">
                <input type="checkbox" name="terms" id="terms"
                       class="w-4 h-4 mt-0.5 rounded border-gray-300 cursor-pointer accent-red-600 flex-shrink-0">
                <label for="terms" class="text-sm text-gray-500 cursor-pointer leading-relaxed">
                    Confirmo que sou funcionário autorizado da DGPDC e aceito os
                    <a href="#" class="text-cv-red font-semibold hover:underline">Termos de Utilização</a>
                    e a
                    <a href="#" class="text-cv-red font-semibold hover:underline">Política de Segurança</a>.
                </label>
            </div>

            {{-- Submit --}}
            <button type="submit"
                    class="w-full py-3.5 bg-cv-red text-white font-display font-bold text-base rounded-xl hover:bg-red-700 hover:-translate-y-0.5 shadow-md shadow-red-200 transition-all duration-200">
                Solicitar Acesso
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-400">
            Já tem conta?
            <a href="{{ route('login') }}?tab=regulador" class="text-cv-red font-semibold hover:underline ml-1">Entrar aqui</a>
        </p>
    </div>

    {{-- Trust badge --}}
    <div class="mt-5 flex items-center justify-center gap-2 text-xs text-gray-400">
        <svg class="w-3.5 h-3.5 text-cv-red" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        DGPDC · Governo de Cabo Verde
        <span class="text-gray-300">·</span>
        <a href="{{ route('home') }}" class="hover:text-cv-red transition-colors">Voltar ao início</a>
    </div>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password-input');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
    document.getElementById('password-input').addEventListener('input', function () {
        const val = this.value;
        const bars = document.querySelectorAll('#strength-bars div');
        const colors = ['bg-red-400', 'bg-yellow-400', 'bg-blue-400', 'bg-green-500'];
        let strength = 0;
        if (val.length >= 8) strength++;
        if (/[A-Z]/.test(val)) strength++;
        if (/[0-9]/.test(val)) strength++;
        if (/[^A-Za-z0-9]/.test(val)) strength++;
        bars.forEach((bar, i) => {
            bar.className = 'h-1 rounded-full ' + (i < strength ? colors[strength - 1] : 'bg-gray-200');
        });
    });
</script>
</body>
</html>
