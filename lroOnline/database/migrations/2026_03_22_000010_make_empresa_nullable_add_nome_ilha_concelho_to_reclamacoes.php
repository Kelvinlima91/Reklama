<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reclamacoes', function (Blueprint $table) {
            // Make empresa_id nullable — user may type a company
            // that isn't registered in the platform yet
            $table->foreignId('empresa_id')
                  ->nullable()
                  ->change();

            // Store the typed company name regardless of registration
            $table->string('empresa_nome')->nullable()->after('empresa_id');

            // Store the user's location at time of submission
            $table->string('ilha')->nullable()->after('empresa_nome');
            $table->string('concelho')->nullable()->after('ilha');
        });
    }

    public function down(): void
    {
        Schema::table('reclamacoes', function (Blueprint $table) {
            $table->dropColumn(['empresa_nome', 'ilha', 'concelho']);

            $table->foreignId('empresa_id')
                  ->nullable(false)
                  ->change();
        });
    }
};
