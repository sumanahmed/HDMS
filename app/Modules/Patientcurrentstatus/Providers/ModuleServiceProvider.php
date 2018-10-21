<?php

namespace App\Modules\Patientcurrentstatus\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'patientcurrentstatus');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'patientcurrentstatus');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'patientcurrentstatus');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
