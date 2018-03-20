<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WidgetComposerProvider extends ServiceProvider {

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function categoryWidget() {
        view()->composer('includes.header_nav_widget', '\App\Http\Composers\CategoryWidgetComposer');
    }

    public function register() {
        $this->categoryWidget();
    }

}
