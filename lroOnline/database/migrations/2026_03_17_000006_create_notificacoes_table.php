<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notificacoes', function (Blueprint $table) {
            $table->id();

            // Polymorphic: can notify a user, empresa, or regulador
            $table->morphs('notificavel'); // notificavel_id + notificavel_type

            $table->foreignId('reclamacao_id')
                  ->nullable()
                  ->constrained('reclamacoes')
                  ->onDelete('cascade');

            $table->string('titulo');
            $table->text('mensagem');
            $table->enum('tipo', ['info', 'sucesso', 'aviso', 'erro'])->default('info');
            $table->boolean('lida')->default(false);
            $table->timestamp('lida_em')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notificacoes');
    }
};
