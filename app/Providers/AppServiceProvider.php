<?php

namespace App\Providers;

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
        //

        $this->app->singleton('settings', function(){
            $settings =  \App\Models\Setting::all();
                foreach( $settings as $setting )
             $data[$setting->items] = $setting->values;
         return $data;
     });
    }
}
