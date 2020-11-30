<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        // config(['app.locale' => 'id']);
        // Carbon::setLocale('id');
        Blade::directive('rupiah', function($price){
            return "IDR <?php echo number_format($price, 0, ',', '.')?>";
        });

        Blade::directive('datetime', function($datetime){
            return "<?php echo date('D, d M y', strtotime($datetime))?>";
        });

        Blade::directive('time', function($time){
            return "<?php echo date('H:i', strtotime($time))?>";
        });
    }
}
