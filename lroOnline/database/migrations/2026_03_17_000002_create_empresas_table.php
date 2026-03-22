<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_comercial');           // Name on the plate / known by public
            $table->string('razao_social');             // Official legal name
            $table->string('nif')->unique();
            $table->string('setor');
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('ilha')->nullable();
            $table->string('concelho')->nullable();
            $table->string('password');
            $table->boolean('verificada')->default(false);  // Verified by DGPDC
            $table->boolean('ativa')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
