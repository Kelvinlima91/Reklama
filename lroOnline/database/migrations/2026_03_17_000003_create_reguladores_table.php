<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reguladores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('apelido');
            $table->string('numero_funcionario')->unique();  // e.g. DGPDC-2024-0042
            $table->string('cargo');
            $table->string('departamento');
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('password');
            $table->string('two_factor_secret')->nullable();   // 2FA secret key
            $table->boolean('aprovado')->default(false);       // Must be approved by admin
            $table->boolean('ativo')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('aprovado_em')->nullable();
            $table->unsignedBigInteger('aprovado_por')->nullable(); // ID of admin who approved
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reguladores');
    }
};
