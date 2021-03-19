<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;

class ServiceController extends Controller
{
    public function show($id)
    {
        $service = Service::findOrFail($id);

        SEOMeta::setTitle($service->title);
        SEOMeta::setDescription($service->description);

        OpenGraph::setTitle($service->title);
        OpenGraph::setDescription($service->description);
        OpenGraph::addImage(productImage($service->image));

        return view('service.show', ["service" => $service]);
    }
}
