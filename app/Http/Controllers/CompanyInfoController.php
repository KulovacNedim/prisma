<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\CompanyInfo;
use App\Models\SailPoint;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    public function index()
    {
        $info = CompanyInfo::findOrFail(1);
        $banks = Bank::all();
        $sailPoints = SailPoint::all();
        return view('company.index')->with([
            'info' => $info,
            'banks' => $banks,
            'sailPoints' => $sailPoints,
        ]);
    }
}
