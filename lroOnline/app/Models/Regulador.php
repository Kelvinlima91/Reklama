<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Regulador extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'reguladores';

    protected $fillable = [
        'nome',
        'apelido',
        'numero_funcionario',
        'cargo',
        'departamento',
        'email',
        'telefone',
        'password',
        'two_factor_secret',
        'aprovado',
        'ativo',
        'aprovado_em',
        'aprovado_por',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'aprovado_em'       => 'datetime',
            'password'          => 'hashed',
            'aprovado'          => 'boolean',
            'ativo'             => 'boolean',
        ];
    }

    // ── Relationships ──────────────────────────────────────────

    /**
     * Complaints assigned to this regulator.
     */
    public function reclamacoes()
    {
        return $this->hasMany(Reclamacao::class);
    }

    /**
     * Infractions issued by this regulator.
     */
    public function infracoes()
    {
        return $this->hasMany(Infracao::class);
    }

    /**
     * Notifications for this regulator (polymorphic).
     */
    public function notificacoes()
    {
        return $this->morphMany(Notificacao::class, 'notificavel');
    }

    /**
     * History entries created by this regulator (polymorphic).
     */
    public function historicoEstados()
    {
        return $this->morphMany(HistoricoEstado::class, 'alterado_por');
    }

    // ── Helpers ────────────────────────────────────────────────

    /**
     * Full name.
     */
    public function getNomeCompletoAttribute(): string
    {
        return $this->nome . ' ' . $this->apelido;
    }

    /**
     * Initials e.g. "MS" for Maria Silva.
     */
    public function getIniciaisAttribute(): string
    {
        return strtoupper(substr($this->nome, 0, 1) . substr($this->apelido, 0, 1));
    }

    /**
     * Unread notifications count.
     */
    public function getNotificacoesNaoLidasAttribute(): int
    {
        return $this->notificacoes()->where('lida', false)->count();
    }
}
