<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Regulador;

class TestUsersSeeder extends Seeder
{
    public function run(): void
    {
        // ─── CONSUMIDOR ────────────────────────────────────────
        User::firstOrCreate(
            ['email' => 'ana.tavares@email.cv'],
            [
                'nome_completo' => 'Ana Luísa Tavares',
                'nif'           => '100123456',
                'telefone'      => '9911234',
                'ilha'          => 'Santiago',
                'concelho'      => 'Praia',
                'password'      => Hash::make('secret123'),
                'ativo'         => true,
            ]
        );

        // ─── EMPRESA ───────────────────────────────────────────
        Empresa::firstOrCreate(
            ['email' => 'geral@tchonfogo.cv'],
            [
                'nome_comercial' => 'Tchon di Fogo',
                'razao_social'   => 'Tchon di Fogo Restauração Lda.',
                'nif'            => '500987654',
                'setor'          => 'Restauração',
                'telefone'       => '2611234',
                'ilha'           => 'Fogo',
                'concelho'       => 'São Filipe',
                'password'       => Hash::make('secret123'),
                'verificada'     => true,
                'ativa'          => true,
            ]
        );

        // ─── REGULADOR ─────────────────────────────────────────
        Regulador::firstOrCreate(
            ['email' => 'c.mendes@dgpdc.cv'],
            [
                'nome'              => 'Carlos',
                'apelido'           => 'Mendes Silva',
                'numero_funcionario'=> 'DGPDC-001',
                'cargo'             => 'Inspetor',
                'departamento'      => 'Fiscalização',
                'telefone'          => '2609800',
                'password'          => Hash::make('secret123'),
                'aprovado'          => true,
                'ativo'             => true,
                'aprovado_em'       => now(),
            ]
        );

        $this->command->info('✓ Consumidor  →  ana.tavares@email.cv  /  secret123');
        $this->command->info('✓ Empresa     →  geral@tchonfogo.cv    /  secret123');
        $this->command->info('✓ Regulador   →  c.mendes@dgpdc.cv     /  secret123');
    }
}
