<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OpenCallResponse;
use Illuminate\Http\Request;

class OpenCallFormResponse extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.opencall.response.index', [
            'opencallResponse' => OpenCallResponse::with('opencall')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpenCallResponse  $openCallResponse
     * @return \Illuminate\Http\Response
     */
    public function show(OpenCallResponse $openCallResponse)
    {
        return view('admin.opencall.response.show', [
            'opencallResponse' => $openCallResponse,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpenCallResponse  $openCallResponse
     * @return \Illuminate\Http\Response
     */
    public function edit(OpenCallResponse $openCallResponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OpenCallResponse  $openCallResponse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpenCallResponse $openCallResponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpenCallResponse  $openCallResponse
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpenCallResponse $openCallResponse)
    {
        //
    }
}
