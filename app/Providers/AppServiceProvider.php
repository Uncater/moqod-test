<?php

namespace App\Providers;

use App\Contracts\Brawlable;
use App\Services\ArrayBrawlService;
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
    public function boot()
    {
        $this->app->bind(Brawlable::class, ArrayBrawlService::class);
    }
}
