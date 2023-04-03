<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OpenCallResponseExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    public function index(Request $request)
    {
        if ($request->exportType == "opencallresponse") {
            return Excel::download(new OpenCallResponseExport, 'reponses.xlsx');
        }
    }

}
