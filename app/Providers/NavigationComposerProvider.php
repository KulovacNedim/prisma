<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NavigationComposerProvider extends ServiceProvider
{

    public function register()
    {
        $this->composeNavigation();
    }

    public function composeNavigation()
    {
        view()->composer('partials.menus.main', 'App\Http\ViewComposers\NavigationComposer');
    }
}
