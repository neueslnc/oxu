<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

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
        Paginator::defaultView('vendor.pagination.bootstrap-5');

        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-5');

        DB::listen(function ($query) {

            Log::info('---------');
            Log::info($query->sql);
            Log::info($query->bindings);
            Log::info($query->time);
            Log::info('---------');

        });
    }
}
