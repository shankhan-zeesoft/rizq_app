<?php

namespace App\Providers;

use App\View\Components\Forms\PermissionSwtich;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Blade::component(PermissionSwtich::class, 'permission-switch', 'forms.permission-switch');
        Blade::componentNamespace('App\View\Components\Forms', 'forms-components');
    }
}
