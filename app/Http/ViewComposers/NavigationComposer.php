<?php

namespace App\Http\ViewComposers;

use App\Models\Service;
use Illuminate\Contracts\View\View;

class NavigationComposer
{
  public function compose(View $view)
  {
    $services = $services = Service::where('is_active', 1)->get();
    $view->with('services', $services);
  }
}
