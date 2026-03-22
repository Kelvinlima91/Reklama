<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoEstado extends Model
{
    protected $table = 'historico_estados';

    protected $fillable = [
        'reclamacao_id',
        'estado_anterior',
        'estado_novo',
        'observacao',
        'alterado_por_id',
        'alterado_por_type',
    ];

    // ── Relationships ──────────────────────────────────────────

    /**
     * The complaint this history entry belongs to.
     */
    public function reclamacao()
    {
        return $this->belongsTo(Reclamacao::class);
    }

    /**
     * Who made the change (User, Empresa, or Regulador).
     */
    public function alteradoPor()
    {
        return $this->morphTo();
    }

    // ── Helpers ────────────────────────────────────────────────

    /**
     * Human-readable description of the change.
     */
    public function getDescricaoAttribute(): string
    {
        $anterior = $this->estado_anterior ?? 'nenhum';
        return "Estado alterado de \"{$anterior}\" para \"{$this->estado_novo}\"";
    }
}
