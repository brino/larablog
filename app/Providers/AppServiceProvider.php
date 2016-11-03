<?php

namespace App\Providers;

use App\Scout\Engines\ElasticEngine;
use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;
use Elasticsearch\ClientBuilder as Elasticsearch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
