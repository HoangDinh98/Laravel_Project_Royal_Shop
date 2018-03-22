<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoriesWidgetProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->categoryComposer();
    }
    
    public function categoryComposer() {
        view()->composer('includes.nav', 'App\Http\Composers\CategoryWidgetComposer');
    }
}
