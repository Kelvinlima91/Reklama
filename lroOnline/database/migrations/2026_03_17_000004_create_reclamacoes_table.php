<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reclamacoes', function (Blueprint $table) {
            $table->id();

            // Reference number shown to user e.g. #00521
            $table->string('numero')->unique();

            // Who filed it
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Which company it's against
            $table->foreignId('empresa_id')
                  ->constrained('empresas')
                  ->onDelete('cascade');

            // Which regulator is handling it (assigned later)
            $table->foreignId('regulador_id')
                  ->nullable()
                  ->constrained('reguladores')
                  ->onDelete('set null');

            // Complaint details
            $table->string('assunto');
            $table->text('descricao');
            $table->string('categoria'); // Internet, Faturação, Atendimento, etc.

            // Status flow:
            // pendente -> em_analise -> encaminhada -> resolvida / recusada / infracao
            $table->enum('estado', [
                'pendente',
                'em_analise',
                'encaminhada',
                'resolvida',
                'recusada',
                'infracao',
            ])->default('pendente');

            // Priority set by regulator
            $table->enum('prioridade', ['normal', 'urgente'])->default('normal');

            // Deadlines
            $table->timestamp('prazo_empresa')->nullable();    // 48h from submission
            $table->timestamp('respondida_em')->nullable();    // When company responded
            $table->timestamp('resolvida_em')->nullable();     // When marked resolved

            // Company response
            $table->text('resposta_empresa')->nullable();

            // Regulator notes (internal)
            $table->text('notas_regulador')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reclamacoes');
    }
};
