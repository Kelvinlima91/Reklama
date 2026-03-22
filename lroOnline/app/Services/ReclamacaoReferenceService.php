<?php

namespace App\Services;

use App\Models\Reclamacao;
use Illuminate\Support\Facades\DB;

class ReclamacaoReferenceService
{
    /**
     * Island name → 3-letter code map.
     * Covers all 10 inhabited Cape Verde islands.
     */
    protected const ISLAND_CODES = [
        // Santiago
        'Santiago'      => 'SVT',
        // São Vicente
        'São Vicente'   => 'SVI',
        'Sao Vicente'   => 'SVI',
        // Santo Antão
        'Santo Antão'   => 'STA',
        'Santo Antao'   => 'STA',
        // Fogo
        'Fogo'          => 'FOG',
        // Sal
        'Sal'           => 'SAL',
        // Boa Vista
        'Boa Vista'     => 'BVT',
        // São Nicolau
        'São Nicolau'   => 'SNI',
        'Sao Nicolau'   => 'SNI',
        // Maio
        'Maio'          => 'MAI',
        // Brava
        'Brava'         => 'BRA',
        // Santa Luzia (uninhabited but included for completeness)
        'Santa Luzia'   => 'SLU',
    ];

    /**
     * Fallback code when island is unknown or not provided.
     */
    protected const FALLBACK_CODE = 'CVD';

    /**
     * Generate a unique reference number for a reclamação.
     *
     * Format: LRO-{ISLAND}-{YEAR}-{SEQUENCE}
     * Example: LRO-SVT-2026-00001
     *
     * The sequence is per island per year, starting at 1.
     * Uses a DB transaction with lock to prevent race conditions.
     *
     * @param  string|null  $ilha   Island name from the user's profile
     * @param  int|null     $year   Defaults to current year
     * @return string
     */
    public function generate(?string $ilha = null, ?int $year = null): string
    {
        $islandCode = $this->resolveIslandCode($ilha);
        $year       = $year ?? now()->year;

        // Wrap in a transaction with a lock so concurrent requests
        // don't generate duplicate sequence numbers
        return DB::transaction(function () use ($islandCode, $year) {

            // Count existing refs for this island+year to get next sequence
            $existing = Reclamacao::where('numero_referencia', 'like', "LRO-{$islandCode}-{$year}-%")
                                  ->lockForUpdate()
                                  ->count();

            $sequence = str_pad($existing + 1, 5, '0', STR_PAD_LEFT);

            return "LRO-{$islandCode}-{$year}-{$sequence}";
        });
    }

    /**
     * Resolve a human-readable island name to its 3-letter code.
     * Case-insensitive, accent-tolerant.
     */
    public function resolveIslandCode(?string $ilha): string
    {
        if (empty($ilha)) {
            return self::FALLBACK_CODE;
        }

        // Direct match first
        if (isset(self::ISLAND_CODES[$ilha])) {
            return self::ISLAND_CODES[$ilha];
        }

        // Case-insensitive fallback
        $lower = mb_strtolower(trim($ilha));
        foreach (self::ISLAND_CODES as $name => $code) {
            if (mb_strtolower($name) === $lower) {
                return $code;
            }
        }

        // Partial match (e.g. "s. vicente" → SVI)
        foreach (self::ISLAND_CODES as $name => $code) {
            if (str_contains($lower, mb_strtolower(explode(' ', $name)[0]))) {
                return $code;
            }
        }

        return self::FALLBACK_CODE;
    }

    /**
     * Parse a reference number back into its components.
     * Returns null if the format is invalid.
     *
     * @return array{prefix:string, island:string, year:int, sequence:int}|null
     */
    public function parse(string $referencia): ?array
    {
        $parts = explode('-', $referencia);

        if (count($parts) !== 4 || $parts[0] !== 'LRO') {
            return null;
        }

        return [
            'prefix'   => $parts[0],
            'island'   => $parts[1],
            'year'     => (int) $parts[2],
            'sequence' => (int) $parts[3],
        ];
    }
}
