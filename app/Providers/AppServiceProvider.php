<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\View\Composers\UserComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Carbon\Carbon;

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
        // Data share globally in all view file
        View::share('ap_nm', 'Laravel Learning');

        // View composer
        View::composer('*', function ($view) {
            $data = 'View Composers';
            $view->with('vc', $data);
        });
        View::composer(
            'pages.photos', UserComposer::class
        );

        // Extending Blade
        Blade::directive('datetime', function () {
            $date = Carbon::now();
            return $date;
        });
    }
}
