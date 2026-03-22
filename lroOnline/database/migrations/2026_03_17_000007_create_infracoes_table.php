<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('infracoes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_auto')->unique(); // Official infraction number

            $table->foreignId('reclamacao_id')
                  ->constrained('reclamacoes')
                  ->onDelete('cascade');

            $table->foreignId('empresa_id')
                  ->constrained('empresas')
                  ->onDelete('cascade');

            $table->foreignId('regulador_id')
                  ->constrained('reguladores')
                  ->onDelete('cascade');

            $table->text('motivo');                  // Reason for infraction
            $table->decimal('multa', 10, 2)->nullable(); // Fine amount (CVE)

            $table->enum('estado', [
                'emitida',      // Just issued
                'notificada',   // Company has been notified
                'contestada',   // Company is contesting
                'paga',         // Fine paid
                'arquivada',    // Closed/archived
            ])->default('emitida');

            $table->timestamp('prazo_pagamento')->nullable();
            $table->timestamp('paga_em')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('infracoes');
    }
};
