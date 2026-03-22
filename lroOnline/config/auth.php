<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    | Default guard for consumers (users).
    */

    'defaults' => [
        'guard'     => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    | Three separate guards — one per user type.
    */

    'guards' => [

        // ── Consumer ──────────────────────────────────────────
        'web' => [
            'driver'   => 'session',
            'provider' => 'users',
        ],

        // ── Company ───────────────────────────────────────────
        'empresa' => [
            'driver'   => 'session',
            'provider' => 'empresas',
        ],

        // ── Regulator ─────────────────────────────────────────
        'regulador' => [
            'driver'   => 'session',
            'provider' => 'reguladores',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    | Each guard maps to its own model/table.
    */

    'providers' => [

        'users' => [
            'driver' => 'eloquent',
            'model'  => App\Models\User::class,
        ],

        'empresas' => [
            'driver' => 'eloquent',
            'model'  => App\Models\Empresa::class,
        ],

        'reguladores' => [
            'driver' => 'eloquent',
            'model'  => App\Models\Regulador::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Reset
    |--------------------------------------------------------------------------
    | Separate password reset tables per user type.
    */

    'passwords' => [

        'users' => [
            'provider' => 'users',
            'table'    => 'password_reset_tokens',
            'expire'   => 60,
            'throttle' => 60,
        ],

        'empresas' => [
            'provider' => 'empresas',
            'table'    => 'password_reset_tokens_empresas',
            'expire'   => 60,
            'throttle' => 60,
        ],

        'reguladores' => [
            'provider' => 'reguladores',
            'table'    => 'password_reset_tokens_reguladores',
            'expire'   => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
