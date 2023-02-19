<?php

namespace App\Http\Controllers\Admin;

use App\Models\OpenCall;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOpenCall;

class OpenCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = OpenCall::orderBy('id', 'DESC')->paginate(10);
        return view('admin.opencall.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['action'] = "Add";
        $data['method'] = "POST";
        $data['formUrl'] = route('admin.opencall.store');

        return view('admin.opencall.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateOpenCall  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOpenCall $request)
    {
        OpenCall::create($request->validated());
        return redirect()->route('admin.opencall.index')->with('success', 'Data Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function show(OpenCall $openCall)
    {
        return view('admin.opencall.show', compact('openCall'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function edit(OpenCall $openCall)
    {
        $data['action'] = "Edit";
        $data['method'] = "PUT";
        $data['opencall'] = $openCall;
        $data['formUrl'] = route('admin.opencall.update', $openCall['id']);

        return view('admin.opencall.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CreateOpenCall  $request
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOpenCall $request, OpenCall $openCall)
    {
        $openCall->update($request->validated());
        return redirect()->route('admin.opencall.index')->with('success', 'Data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpenCall $openCall)
    {
        $openCall->delete();
        return redirect()->route('admin.opencall.index')->with('success', 'Data Updated Successfully !');
    }
}
