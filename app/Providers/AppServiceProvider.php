<?php

namespace App\Providers;

use Carbon\Carbon;
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
        Carbon::macro('greet', function () {
            $hour = Carbon::now()->format('H');

            if ($hour < 12) {
                return 'Good morning';
            }
            if ($hour < 17) {
                return 'Good afternoon';
            }

            return 'Good evening';
        });

    }
}
