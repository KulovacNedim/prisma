<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FooterProvider extends ServiceProvider
{
    public function register()
    {
        $this->composeFooter();
    }

    public function composeFooter()
    {
        view()->composer('partials.footer', 'App\Http\ViewComposers\FooterComposer');
    }
}
