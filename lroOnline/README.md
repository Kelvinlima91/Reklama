# Reklama Cabo Verde
**Livro de Reclamações Eletrónico — República de Cabo Verde**

Plataforma oficial de registo e gestão de reclamações de consumidores, desenvolvida para a DGPDC (Direção Geral de Proteção do Consumidor). Permite que cidadãos submetam reclamações contra empresas, que as empresas respondam, e que os reguladores fiscalizem e intervenham.

---

## Stack

| Camada | Tecnologia |
|--------|-----------|
| Framework | Laravel 12 · PHP 8.2 |
| Base de dados | SQLite (dev) · MySQL (prod) |
| Frontend | Blade · Tailwind CSS CDN |
| Tipografia | Sora (display) · Inter (corpo) |
| Servidor local | Laravel Herd — `http://127.0.0.1:8000` |

---

## Funcionalidades

### Consumidor
- Registo e autenticação
- Submissão de reclamações com número de referência automático (`LRO-SVT-2026-00001`)
- Acompanhamento do estado das reclamações
- Painel com estatísticas pessoais e histórico

### Empresa
- Autenticação separada
- Visualização e resposta às reclamações recebidas
- Dashboard com taxa de resolução

### Regulador (DGPDC)
- Autenticação com 2FA
- Conta sujeita a aprovação administrativa
- Supervisão de todas as reclamações
- Emissão de infrações

---

## Estrutura de Utilizadores

```
users          → Consumidores
empresas       → Empresas registadas
reguladores    → Funcionários da DGPDC
```

Cada grupo tem o seu próprio guard, middleware, controller de autenticação e dashboard.

---

## Referência de Reclamação

Formato: `LRO-{ILHA}-{ANO}-{SEQUÊNCIA}`

```
LRO-SVT-2026-00001   →  Santiago, 2026, primeira reclamação
LRO-SVI-2026-00003   →  São Vicente, 2026, terceira reclamação
```

Códigos de ilha: `SVT` Santiago · `SVI` São Vicente · `STA` Santo Antão · `FOG` Fogo · `SAL` Sal · `BVT` Boa Vista · `SNI` São Nicolau · `MAI` Maio · `BRA` Brava

A sequência reinicia por ilha a cada ano. Gerada pelo `ReclamacaoReferenceService` com fallback automático via `ReclamacaoObserver`.

---

## Estados de uma Reclamação

```
pendente → em_analise → encaminhada → resolvida
                                    → recusada
                                    → infracao
```

---

## Instalação

```bash
git clone <repo>
cd lroOnline

composer install
cp .env.example .env
php artisan key:generate

php artisan migrate
php artisan db:seed --class=TestUsersSeeder
```

Iniciar servidor:
```bash
php artisan serve
# ou via Laravel Herd
```

---

## Contas de Teste

| Tipo | Email | Password |
|------|-------|----------|
| Consumidor | `ana.tavares@email.cv` | `secret123` |
| Empresa | `geral@tchonfogo.cv` | `secret123` |
| Regulador | `c.mendes@dgpdc.cv` | `secret123` |

> Em ambiente `local` o 2FA do Regulador é ignorado automaticamente.

---

## Rotas Principais

```
GET  /                        → Página inicial
GET  /login                   → Login unificado (Consumidor / Empresa / Regulador)
GET  /dashboard/user          → Painel do consumidor
GET  /dashboard/company       → Painel da empresa
GET  /dashboard/regulator     → Painel do regulador
POST /reclamacoes             → Submeter nova reclamação
DELETE /reclamacoes/{id}      → Eliminar reclamação (apenas pendentes)
```

---

## Design

| Elemento | Valor |
|---------|-------|
| Consumidor | Azul `#1B4FD8` |
| Empresa | Verde `#0F9B58` |
| Regulador | Vermelho `#D32F2F` |
| Fundo escuro | Navy `#0D1B3E` |

---

## Estrutura de Ficheiros Relevantes

```
app/
├── Http/Controllers/
│   ├── Auth/UserAuthController.php
│   ├── Auth/EmpresaAuthController.php
│   ├── Auth/ReguladorAuthController.php
│   ├── DashboardController.php
│   └── ReclamacaoController.php
├── Models/
│   ├── User.php · Empresa.php · Regulador.php
│   └── Reclamacao.php · Notificacao.php · Infracao.php
├── Services/ReclamacaoReferenceService.php
├── Observers/ReclamacaoObserver.php
└── Middleware/
    ├── AuthUser.php · AuthEmpresa.php · AuthRegulador.php

resources/views/
├── welcome.blade.php
├── login.blade.php
├── register.blade.php
├── dashboard-user.blade.php
├── dashboard_company.blade.php
└── dashboard_regulator.blade.php

database/migrations/
├── create_users_table.php
├── create_empresas_table.php
├── create_reguladores_table.php
├── create_reclamacoes_table.php
├── create_notificacoes_table.php
├── create_infracoes_table.php
└── add_numero_referencia_to_reclamacoes.php
```

---

## Licença

Desenvolvido para uso interno da DGPDC — República de Cabo Verde.  
© 2026 Reklama Cabo Verde. Todos os direitos reservados.
