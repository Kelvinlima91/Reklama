<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reclamacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reclamacoes';

    protected $fillable = [
        'numero',
        'user_id',
        'empresa_id',
        'regulador_id',
        'assunto',
        'descricao',
        'categoria',
        'estado',
        'prioridade',
        'prazo_empresa',
        'respondida_em',
        'resolvida_em',
        'resposta_empresa',
        'notas_regulador',
    ];

    protected function casts(): array
    {
        return [
            'prazo_empresa'  => 'datetime',
            'respondida_em'  => 'datetime',
            'resolvida_em'   => 'datetime',
        ];
    }

    // ── Relationships ──────────────────────────────────────────

    /**
     * The consumer who filed this complaint.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The company the complaint is against.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    /**
     * The regulator handling this complaint.
     */
    public function regulador()
    {
        return $this->belongsTo(Regulador::class);
    }

    /**
     * File attachments on this complaint.
     */
    public function anexos()
    {
        return $this->hasMany(Anexo::class);
    }

    /**
     * Full status history (audit log).
     */
    public function historico()
    {
        return $this->hasMany(HistoricoEstado::class)->orderBy('created_at', 'asc');
    }

    /**
     * Notifications triggered by this complaint.
     */
    public function notificacoes()
    {
        return $this->hasMany(Notificacao::class);
    }

    /**
     * Infraction linked to this complaint (if any).
     */
    public function infracao()
    {
        return $this->hasOne(Infracao::class);
    }

    // ── Scopes ─────────────────────────────────────────────────

    public function scopePendentes($query)
    {
        return $query->whereIn('estado', ['pendente', 'em_analise']);
    }

    public function scopeResolvidas($query)
    {
        return $query->where('estado', 'resolvida');
    }

    public function scopeUrgentes($query)
    {
        return $query->where('prioridade', 'urgente');
    }

    public function scopeForaDosPrazo($query)
    {
        return $query->where('prazo_empresa', '<', now())
                     ->whereNull('respondida_em');
    }

    // ── Helpers ────────────────────────────────────────────────

    /**
     * Generates a unique reference number like #00521.
     */
    public static function gerarNumero(): string
    {
        $ultimo = static::withTrashed()->max('id') ?? 0;
        return '#' . str_pad($ultimo + 1, 5, '0', STR_PAD_LEFT);
    }

    /**
     * Whether the company has exceeded their 48h deadline.
     */
    public function getForaDoPrazoAttribute(): bool
    {
        return $this->prazo_empresa
            && now()->isAfter($this->prazo_empresa)
            && is_null($this->respondida_em);
    }

    /**
     * Human-readable estado label.
     */
    public function getEstadoLabelAttribute(): string
    {
        return match ($this->estado) {
            'pendente'     => 'Pendente',
            'em_analise'   => 'Em Análise',
            'encaminhada'  => 'Encaminhada',
            'resolvida'    => 'Resolvida',
            'recusada'     => 'Recusada',
            'infracao'     => 'Infração',
            default        => ucfirst($this->estado),
        };
    }

    /**
     * CSS badge colour class for each estado.
     */
    public function getEstadoCorAttribute(): string
    {
        return match ($this->estado) {
            'pendente'     => 'bg-gray-100 text-gray-600',
            'em_analise'   => 'bg-yellow-100 text-yellow-700',
            'encaminhada'  => 'bg-blue-100 text-blue-700',
            'resolvida'    => 'bg-green-100 text-green-700',
            'recusada'     => 'bg-red-100 text-red-700',
            'infracao'     => 'bg-red-100 text-red-700',
            default        => 'bg-gray-100 text-gray-600',
        };
    }
}
