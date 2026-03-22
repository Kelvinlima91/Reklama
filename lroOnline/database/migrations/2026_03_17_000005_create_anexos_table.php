<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anexos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reclamacao_id')
                  ->constrained('reclamacoes')
                  ->onDelete('cascade');
            $table->string('nome_original');   // Original filename
            $table->string('caminho');         // Storage path
            $table->string('tipo_mime');       // image/jpeg, application/pdf, etc.
            $table->unsignedBigInteger('tamanho'); // File size in bytes
            // Who uploaded: user, empresa, or regulador
            $table->enum('uploaded_por', ['user', 'empresa', 'regulador']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anexos');
    }
};
