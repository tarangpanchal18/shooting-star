<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExhibition;
use App\Models\Category;
use App\Models\Exhibition;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Exhibition::orderBy('id', 'DESC')->paginate(10);
        return view('admin.exhibition.index', compact('data'));
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
        $data['category'] = Category::where('status', 'Active')->get();
        $data['formUrl'] = route('admin.exhibition.store');
        return view('admin.exhibition.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateExhibition  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateExhibition $request)
    {
        Exhibition::create($request->validated());
        return redirect()->route('admin.exhibition.index')->with('success', 'Data Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function show(Exhibition $exhibition)
    {
        return view('admin.exhibition.show', compact('exhibition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function edit(Exhibition $exhibition, )
    {
        $data['action'] = "Edit";
        $data['method'] = "PUT";
        $data['exhibition'] = $exhibition;
        $data['category'] = Category::where('status', 'Active')->get();
        $data['formUrl'] = route('admin.exhibition.update', $exhibition['id']);
        return view('admin.exhibition.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CreateExhibition  $request
     * @param  \App\Models\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function update(CreateExhibition $request, Exhibition $exhibition)
    {
        $exhibition->update($request->validated());
        return redirect()->route('admin.exhibition.index')->with('success', 'Data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibition $exhibition)
    {
        $exhibition->delete();
        return redirect()->route('admin.exhibition.index')->with('success', 'Data Updated Successfully !');
    }
}
