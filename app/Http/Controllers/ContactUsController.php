<?php

namespace App\Http\Controllers;

use App\Models\SailPoint;

class ContactUsController extends Controller
{
    public function index()
    {
        $sailPoints = SailPoint::all();
        return view('contact-us.index')->with([
            'sailPoints' => $sailPoints,
        ]);
    }
}
