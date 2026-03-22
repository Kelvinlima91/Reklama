<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anexo extends Model
{
    protected $table = 'anexos';

    protected $fillable = [
        'reclamacao_id',
        'nome_original',
        'caminho',
        'tipo_mime',
        'tamanho',
        'uploaded_por',
    ];

    public function reclamacao()
    {
        return $this->belongsTo(Reclamacao::class);
    }

    /**
     * Human-readable file size e.g. "1.2 MB".
     */
    public function getTamanhoFormatadoAttribute(): string
    {
        $bytes = $this->tamanho;
        if ($bytes < 1024)       return $bytes . ' B';
        if ($bytes < 1048576)    return round($bytes / 1024, 1) . ' KB';
        return round($bytes / 1048576, 1) . ' MB';
    }

    /**
     * Whether the file is an image.
     */
    public function getIsImageAttribute(): bool
    {
        return str_starts_with($this->tipo_mime, 'image/');
    }
}
