<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Infracao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'infracoes';

    protected $fillable = [
        'numero_auto',
        'reclamacao_id',
        'empresa_id',
        'regulador_id',
        'motivo',
        'multa',
        'estado',
        'prazo_pagamento',
        'paga_em',
    ];

    protected function casts(): array
    {
        return [
            'multa'           => 'decimal:2',
            'prazo_pagamento' => 'datetime',
            'paga_em'         => 'datetime',
        ];
    }

    // ── Relationships ──────────────────────────────────────────

    public function reclamacao()
    {
        return $this->belongsTo(Reclamacao::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function regulador()
    {
        return $this->belongsTo(Regulador::class);
    }

    // ── Helpers ────────────────────────────────────────────────

    /**
     * Formatted fine amount in CVE.
     */
    public function getMultaFormatadaAttribute(): string
    {
        return number_format($this->multa, 2, ',', '.') . ' CVE';
    }

    /**
     * Human-readable estado label.
     */
    public function getEstadoLabelAttribute(): string
    {
        return match ($this->estado) {
            'emitida'    => 'Emitida',
            'notificada' => 'Notificada',
            'contestada' => 'Contestada',
            'paga'       => 'Paga',
            'arquivada'  => 'Arquivada',
            default      => ucfirst($this->estado),
        };
    }

    /**
     * Whether the payment deadline has passed.
     */
    public function getForaDoPrazoAttribute(): bool
    {
        return $this->prazo_pagamento
            && now()->isAfter($this->prazo_pagamento)
            && $this->estado !== 'paga';
    }

    /**
     * Generates a unique auto number e.g. AUTO-2026-00042.
     */
    public static function gerarNumeroAuto(): string
    {
        $ano    = now()->year;
        $ultimo = static::withTrashed()->whereYear('created_at', $ano)->count();
        return 'AUTO-' . $ano . '-' . str_pad($ultimo + 1, 5, '0', STR_PAD_LEFT);
    }
}
