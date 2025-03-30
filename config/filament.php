<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | By uncommenting the Laravel Echo configuration, you may connect Filament
    | to any Pusher-compatible websockets server.
    |
    | This will allow your users to receive real-time notifications.
    |
    */

    'broadcasting' => [

        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'wsHost' => env('VITE_PUSHER_HOST'),
        //     'wsPort' => env('VITE_PUSHER_PORT'),
        //     'wssPort' => env('VITE_PUSHER_PORT'),
        //     'authEndpoint' => '/api/v1/broadcasting/auth',
        //     'disableStats' => true,
        //     'encrypted' => true,
        // ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This is the storage disk Filament will use to store files. You may use
    | any of the disks defined in the `config/filesystems.php`.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    'default_panel' => env('FILAMENT_PANEL', 'admin'),

    /*
    |--------------------------------------------------------------------------
    | Panels
    |--------------------------------------------------------------------------
    |
    | Here you can define your Filament panels. The default panel "admin"
    | below is configured to use resources from your application's
    | Filament resources directory.
    |
    */
    'panels' => [
        'admin' => [
            'resources' => [
                'directories' => [
                    app_path('Filament/Resources'),
                ],
                'namespaces' => [
                    'App\\Filament\\Resources',
                ],
            ],
        ],

        'customer' => [
            'path'  => 'customer',
            'guard' => 'customer',

            'auth' => [
                'pages' => [
                    'login' => \App\Filament\Resources\CustomerLogin::class,
                ],
            ],

            'resources' => [
                'directories' => [
                    app_path('Filament/CustomerResources'),
                ],
                'namespaces' => [
                    'App\\Filament\\CustomerResources',
                ],
            ],
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Assets Path
    |--------------------------------------------------------------------------
    |
    | This is the directory where Filament's assets will be published to. It
    | is relative to the `public` directory of your Laravel application.
    |
    | After changing the path, you should run `php artisan filament:assets`.
    |
    */

    'assets_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Cache Path
    |--------------------------------------------------------------------------
    |
    | This is the directory that Filament will use to store cache files that
    | are used to optimize the registration of components.
    |
    | After changing the path, you should run `php artisan filament:cache-components`.
    |
    */

    'cache_path' => base_path('bootstrap/cache/filament'),

    /*
    |--------------------------------------------------------------------------
    | Livewire Loading Delay
    |--------------------------------------------------------------------------
    |
    | This sets the delay before loading indicators appear.
    |
    | Setting this to 'none' makes indicators appear immediately, which can be
    | desirable for high-latency connections. Setting it to 'default' applies
    | Livewire's standard 200ms delay.
    |
    */

    'livewire_loading_delay' => 'default',

];
