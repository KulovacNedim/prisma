<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;

use App\Models\SailPoint;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
{
    public function index()
    {
        $sailPoints = SailPoint::all();
        return view('contact-us.index')->with([
            'sailPoints' => $sailPoints,
        ]);
    }

    public function store(Request $request)
    {
        Mail::send(new ContactUsMail($request));
        Alert::success('Vaš mail je zaprimljen.', 'Odgovor možete očekivati u roku od 24 sata.');
        return back();
    }
}
