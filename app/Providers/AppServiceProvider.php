<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\Foundation\Application;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Admin::class, function (Application $app) {
            return new Admin();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ensure the Admin model is properly registered
        $this->app->bind(Admin::class, function (Application $app) {
            return new Admin();
        });
    }
}