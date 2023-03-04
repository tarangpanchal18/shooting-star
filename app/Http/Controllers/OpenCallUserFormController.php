<?php

namespace App\Http\Controllers;

use App\Models\OpenCall;
use Illuminate\Http\Request;

class OpenCallUserFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OpenCall $opencall)
    {
        $openCallList = OpenCall::where('end_date', '>=', date('Y-m-d'))->where('status', 'Active')->get();

        return view('opencall_form', [
            'pageName' => $opencall->title,
            'opencall' => $opencall,
            'opencallList' => $openCallList,
            'customField' => $opencall->formfield->where('status', 'Active'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
