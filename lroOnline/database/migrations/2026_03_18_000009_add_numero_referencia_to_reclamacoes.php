<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reclamacoes', function (Blueprint $table) {
            $table->string('numero_referencia', 25)
                  ->nullable()
                  ->unique()
                  ->after('id')
                  ->comment('Ex: LRO-SVT-2026-00001');
        });
    }

    public function down(): void
    {
        Schema::table('reclamacoes', function (Blueprint $table) {
            $table->dropColumn('numero_referencia');
        });
    }
};
