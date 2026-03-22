<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Consumer dashboard.
     */
    public function user()
    {
        $user        = Auth::guard('web')->user();
        $reclamacoes = $user->reclamacoes()
            ->with('empresa')
            ->latest()
            ->take(10)
            ->get();

        $notificacoes = $user->notificacoes()
            ->latest()
            ->take(5)
            ->get();

        $stats = [
            'total'      => $user->reclamacoes()->count(),
            'analise'    => $user->reclamacoes()->whereIn('estado', ['pendente', 'em_analise'])->count(),
            'resolvidas' => $user->reclamacoes()->where('estado', 'resolvida')->count(),
            'recusadas'  => $user->reclamacoes()->where('estado', 'recusada')->count(),
        ];

        // Stats for current month — used in welcome banner
        $mesStats = [
            'analise'    => $user->reclamacoes()
                ->whereIn('estado', ['pendente', 'em_analise'])
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
            'resolvidas' => $user->reclamacoes()
                ->where('estado', 'resolvida')
                ->whereMonth('updated_at', now()->month)
                ->whereYear('updated_at', now()->year)
                ->count(),
        ];

        return view('dashboard-user', compact('user', 'reclamacoes', 'notificacoes', 'stats', 'mesStats'));
    }

    /**
     * Company dashboard.
     */
    public function company()
    {
        $empresa     = Auth::guard('empresa')->user();
        $reclamacoes = $empresa->reclamacoes()
            ->with('user')
            ->whereIn('estado', ['pendente', 'em_analise', 'encaminhada'])
            ->latest()
            ->take(10)
            ->get();

        $total      = $empresa->reclamacoes()->count();
        $resolvidas = $empresa->reclamacoes()->where('estado', 'resolvida')->count();

        $stats = [
            'total'      => $total,
            'pendentes'  => $empresa->reclamacoes()->whereIn('estado', ['pendente', 'em_analise'])->count(),
            'resolvidas' => $resolvidas,
            'taxa'       => $total > 0 ? round(($resolvidas / $total) * 100) : 0,
        ];

        return view('dashboard_company', compact('empresa', 'reclamacoes', 'stats'));
    }

    /**
     * Regulator dashboard.
     */
    public function regulator()
    {
        $regulador    = Auth::guard('regulador')->user();
        $reclamacoes  = \App\Models\Reclamacao::with(['user', 'empresa'])
            ->latest()
            ->take(10)
            ->get();
        $infracoes    = \App\Models\Infracao::with('empresa')
            ->whereIn('estado', ['emitida', 'notificada'])
            ->latest()
            ->take(5)
            ->get();

        $stats = [
            'total'      => \App\Models\Reclamacao::count(),
            'abertas'    => \App\Models\Reclamacao::whereIn('estado', ['pendente', 'em_analise'])->count(),
            'empresas'   => \App\Models\Empresa::count(),
            'infracoes'  => \App\Models\Infracao::whereIn('estado', ['emitida', 'notificada'])->count(),
        ];

        return view('dashboard_regulator', compact('regulador', 'reclamacoes', 'infracoes', 'stats'));
    }
}
