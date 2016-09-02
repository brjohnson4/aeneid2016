<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('includes.header', function($view)
        	{
	        	$view->with('series', Collection::all());
        	});
        view()->composer('welcome', function($view)
        	{
	        	$view->with('series', Collection::all());
        	});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
