<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Wine;
use App\Policies\UserPolicy;
use App\Policies\WinePolicy;
use Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('layouts.wine', 'wine-layout');
        Gate::policy(Wine::class, WinePolicy::class);
        Gate::policy(User::class, UserPolicy::class);
    }
}
