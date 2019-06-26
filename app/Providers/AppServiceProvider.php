<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        URL::forceScheme('https');

        Blade::directive('asMoney', function ($value) {
            return "<?php echo '$'. number_format($value, 2); ?>";
        });
        Blade::include('components.input', 'input');
        Blade::include('components.select', 'select');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
