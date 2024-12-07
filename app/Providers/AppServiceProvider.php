<?php

namespace App\Providers;

use App\View\Components\AppLayoutAdmin;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\AdminDashboard;

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
        //
        
        Blade::component('admin-dashboard', AdminDashboard::class);
        Blade::component('admin-app-layout', AppLayoutAdmin::class);
    
    }
}
