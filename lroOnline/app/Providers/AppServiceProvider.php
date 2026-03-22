<?php

namespace App\Providers;

use App\Models\Reclamacao;
use App\Observers\ReclamacaoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Bind the service as a singleton so the same instance is
        // reused throughout the request lifecycle
        $this->app->singleton(
            \App\Services\ReclamacaoReferenceService::class
        );
    }

    public function boot(): void
    {
        // Register the observer — this wires the auto-generation
        // fallback on every Reclamacao::create() call
        Reclamacao::observe(ReclamacaoObserver::class);
    }
}
