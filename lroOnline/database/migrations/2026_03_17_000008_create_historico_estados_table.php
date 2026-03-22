<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historico_estados', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reclamacao_id')
                  ->constrained('reclamacoes')
                  ->onDelete('cascade');

            $table->string('estado_anterior')->nullable();
            $table->string('estado_novo');
            $table->text('observacao')->nullable(); // Optional note on why it changed

            // Polymorphic: who made the change (user, empresa, or regulador)
            $table->morphs('alterado_por');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historico_estados');
    }
};
