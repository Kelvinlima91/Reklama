<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Empresa extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'empresas';

    protected $fillable = [
        'nome_comercial',
        'razao_social',
        'nif',
        'setor',
        'email',
        'telefone',
        'ilha',
        'concelho',
        'password',
        'verificada',
        'ativa',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'verificada'        => 'boolean',
            'ativa'             => 'boolean',
        ];
    }

    // ── Relationships ──────────────────────────────────────────

    /**
     * All complaints filed against this company.
     */
    public function reclamacoes()
    {
        return $this->hasMany(Reclamacao::class);
    }

    /**
     * Infractions issued against this company.
     */
    public function infracoes()
    {
        return $this->hasMany(Infracao::class);
    }

    /**
     * Notifications for this company (polymorphic).
     */
    public function notificacoes()
    {
        return $this->morphMany(Notificacao::class, 'notificavel');
    }

    /**
     * History entries created by this company (polymorphic).
     */
    public function historicoEstados()
    {
        return $this->morphMany(HistoricoEstado::class, 'alterado_por');
    }

    // ── Helpers ────────────────────────────────────────────────

    /**
     * Initials from nome_comercial e.g. "CV" for CVTELECOM.
     */
    public function getIniciaisAttribute(): string
    {
        $words = explode(' ', $this->nome_comercial);
        if (count($words) === 1) {
            return strtoupper(substr($this->nome_comercial, 0, 2));
        }
        return strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
    }

    /**
     * Pending complaints count (not yet responded to).
     */
    public function getReclamacoesPendentesAttribute(): int
    {
        return $this->reclamacoes()
            ->whereIn('estado', ['pendente', 'em_analise'])
            ->count();
    }

    /**
     * Resolution rate as a percentage.
     */
    public function getTaxaResolucaoAttribute(): float
    {
        $total    = $this->reclamacoes()->count();
        $resolved = $this->reclamacoes()->where('estado', 'resolvida')->count();
        return $total > 0 ? round(($resolved / $total) * 100, 1) : 0;
    }

    /**
     * Unread notifications count.
     */
    public function getNotificacoesNaoLidasAttribute(): int
    {
        return $this->notificacoes()->where('lida', false)->count();
    }
}
