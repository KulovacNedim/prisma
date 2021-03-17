<?php

namespace App\Http\ViewComposers;

use App\Models\SailPoint;
use Illuminate\Contracts\View\View;

class FooterComposer
{
  public function compose(View $view)
  {
    $sailPoints = SailPoint::all();
    $view->with('sailPoints', $sailPoints);
  }
}
