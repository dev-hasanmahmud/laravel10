<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\View\Composers\UserComposer;
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
        View::share('ap_nm', 'Laravel Learning');

        View::composer('*', function ($view) {
            $data = 'View Composers';
            $view->with('vc', $data);
        });

        View::composer(
            'pages.photos', UserComposer::class
        );
    }
}
