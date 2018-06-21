<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\MySanitizer;
use Rees\Sanitizer\Sanitizer;


class SanitizerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //$sanitizer = $this->app->make('sanitizer');
        $this->app->make('sanitizer')->register('remove_tags',function($value){
            return strip_tags($value);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        /*
        $this->app->bind('App\Library\Services\Sanitizer', function ($app) {
            return new MySanitizer();
        });
        */
    }
}
