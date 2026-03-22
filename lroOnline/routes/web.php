<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\EmpresaAuthController;
use App\Http\Controllers\Auth\ReguladorAuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| Consumer (User) auth routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login',    [UserAuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [UserAuthController::class, 'login'])->name('login.post');

    Route::get('/register',  [UserAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [UserAuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [UserAuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| Company (Empresa) auth routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest:empresa')->group(function () {
    Route::get('/login_company',    [EmpresaAuthController::class, 'showLogin'])->name('empresa.login');
    Route::post('/login_company',   [EmpresaAuthController::class, 'login'])->name('empresa.login.post');

    Route::get('/register_company',  [EmpresaAuthController::class, 'showRegister'])->name('empresa.register');
    Route::post('/register_company', [EmpresaAuthController::class, 'register'])->name('empresa.register.post');
});

Route::post('/logout_company', [EmpresaAuthController::class, 'logout'])
    ->name('empresa.logout')
    ->middleware('auth:empresa');


/*
|--------------------------------------------------------------------------
| Regulator (Regulador) auth routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest:regulador')->group(function () {
    Route::get('/login_regulator',    [ReguladorAuthController::class, 'showLogin'])->name('regulador.login');
    Route::post('/login_regulator',   [ReguladorAuthController::class, 'login'])->name('regulador.login.post');

    Route::get('/register_regulator',  [ReguladorAuthController::class, 'showRegister'])->name('regulador.register');
    Route::post('/register_regulator', [ReguladorAuthController::class, 'register'])->name('regulador.register.post');
});

Route::post('/logout_regulator', [ReguladorAuthController::class, 'logout'])
    ->name('regulador.logout')
    ->middleware('auth:regulador');


use App\Http\Controllers\ReclamacaoController;

/*
|--------------------------------------------------------------------------
| Consumer dashboard (protected)
|--------------------------------------------------------------------------
*/

Route::middleware('auth.user')->prefix('dashboard')->group(function () {
    Route::get('/user', [DashboardController::class, 'user'])->name('dashboard.user');
});

/*
|--------------------------------------------------------------------------
| Reclamações (protected — consumer only)
|--------------------------------------------------------------------------
*/

Route::middleware('auth.user')->group(function () {
    Route::post('/reclamacoes',         [ReclamacaoController::class, 'store'])->name('reclamacoes.store');
    Route::delete('/reclamacoes/{reclamacao}', [ReclamacaoController::class, 'destroy'])->name('reclamacoes.destroy');
});


/*
|--------------------------------------------------------------------------
| Company dashboard (protected)
|--------------------------------------------------------------------------
*/

Route::middleware('auth.empresa')->prefix('dashboard')->group(function () {
    Route::get('/company', [DashboardController::class, 'company'])->name('dashboard.company');
});


/*
|--------------------------------------------------------------------------
| Regulator dashboard (protected)
|--------------------------------------------------------------------------
*/

Route::middleware('auth.regulador')->prefix('dashboard')->group(function () {
    Route::get('/regulator', [DashboardController::class, 'regulator'])->name('dashboard.regulator');
});
