<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    protected $table = 'notificacoes';

    protected $fillable = [
        'notificavel_id',
        'notificavel_type',
        'reclamacao_id',
        'titulo',
        'mensagem',
        'tipo',
        'lida',
        'lida_em',
    ];

    protected function casts(): array
    {
        return [
            'lida'    => 'boolean',
            'lida_em' => 'datetime',
        ];
    }

    // ── Relationships ──────────────────────────────────────────

    /**
     * The owner of this notification (User, Empresa, or Regulador).
     */
    public function notificavel()
    {
        return $this->morphTo();
    }

    /**
     * The complaint this notification is about.
     */
    public function reclamacao()
    {
        return $this->belongsTo(Reclamacao::class);
    }

    // ── Helpers ────────────────────────────────────────────────

    /**
     * Mark this notification as read.
     */
    public function marcarComoLida(): void
    {
        if (! $this->lida) {
            $this->update([
                'lida'    => true,
                'lida_em' => now(),
            ]);
        }
    }

    /**
     * CSS colour class per type.
     */
    public function getCorAttribute(): string
    {
        return match ($this->tipo) {
            'sucesso' => 'bg-green-100 text-green-700',
            'aviso'   => 'bg-yellow-100 text-yellow-700',
            'erro'    => 'bg-red-100 text-red-700',
            default   => 'bg-blue-100 text-blue-700',
        };
    }

    /**
     * Dot colour for the notification indicator.
     */
    public function getPontoCorAttribute(): string
    {
        return match ($this->tipo) {
            'sucesso' => 'bg-green-500',
            'aviso'   => 'bg-yellow-500',
            'erro'    => 'bg-red-500',
            default   => 'bg-blue-500',
        };
    }
}
