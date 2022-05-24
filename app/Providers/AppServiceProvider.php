<?php

namespace App\Providers;

use Illuminate\Support\Facades\Paginator;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        //
        // Paginator::useBootstrap();
        $charts->register([
            \App\Charts\SampleChart::class
        ]);
    }
}
