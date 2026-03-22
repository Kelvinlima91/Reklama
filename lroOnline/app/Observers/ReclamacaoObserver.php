<?php

namespace App\Observers;

use App\Models\Reclamacao;
use App\Services\ReclamacaoReferenceService;
use Illuminate\Support\Facades\Log;

class ReclamacaoObserver
{
    public function __construct(
        protected ReclamacaoReferenceService $referenceService
    ) {}

    /**
     * Fires BEFORE the model is saved to the database.
     * If numero_referencia is not already set (e.g. the controller
     * didn't call the service), the observer generates it here.
     *
     * This acts as a safety net — the service should always be
     * called explicitly in the controller, but if it isn't (e.g.
     * during seeding, imports, or future API endpoints), the
     * observer guarantees the field is always populated.
     */
    public function creating(Reclamacao $reclamacao): void
    {
        if (! empty($reclamacao->numero_referencia)) {
            return; // Already set by the controller — nothing to do
        }

        try {
            // Resolve island from the related user if available,
            // otherwise fall back to the stored ilha field
            $ilha = $reclamacao->user?->ilha ?? $reclamacao->ilha ?? null;

            $reclamacao->numero_referencia = $this->referenceService->generate($ilha);

        } catch (\Throwable $e) {
            // Never let a failed reference generation block saving.
            // Log the error and use a timestamp-based fallback.
            Log::error('ReclamacaoObserver: failed to generate reference', [
                'error'         => $e->getMessage(),
                'reclamacao_id' => $reclamacao->id ?? null,
            ]);

            $reclamacao->numero_referencia = 'LRO-CVD-' . now()->year . '-' . now()->format('His');
        }
    }
}
