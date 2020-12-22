<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Contracts\Routing\UrlGenerator;
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
        app()->make(UrlGenerator::class)->forceScheme('https');


        //Paginator::defaultView('vendor.Pagination.resources.views.emantic-ui');
    }
}
