<?php

namespace App\Http\Controllers\Voyager;

use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class CategoriesController extends VoyagerBaseController
{
  use BreadRelationshipParser;

  public function destroy(Request $request, $id)
  {
    // my costumizations - deleting categories
    CategoryProduct::where('category_id', $id)->delete();
    // end of my costumizations

    $slug = $this->getSlug($request);

    $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

    // Init array of IDs
    $ids = [];
    if (empty($id)) {
      // Bulk delete, get IDs from POST
      $ids = explode(',', $request->ids);
    } else {
      // Single item delete, get ID from URL
      $ids[] = $id;
    }
    foreach ($ids as $id) {
      $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

      // Check permission
      $this->authorize('delete', $data);

      $model = app($dataType->model_name);
      if (!($model && in_array(SoftDeletes::class, class_uses_recursive($model)))) {
        $this->cleanup($dataType, $data);
      }
    }

    $displayName = count($ids) > 1 ? $dataType->getTranslatedAttribute('display_name_plural') : $dataType->getTranslatedAttribute('display_name_singular');

    $res = $data->destroy($ids);
    $data = $res
      ? [
        'message'    => __('voyager::generic.successfully_deleted') . " {$displayName}",
        'alert-type' => 'success',
      ]
      : [
        'message'    => __('voyager::generic.error_deleting') . " {$displayName}",
        'alert-type' => 'error',
      ];

    if ($res) {
      event(new BreadDataDeleted($dataType, $data));
    }

    return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
  }
}
