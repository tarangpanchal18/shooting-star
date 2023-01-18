<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePage;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Page::orderBy('title', 'ASC')->paginate(10);
        return view('admin.pages.index', compact('data'));
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
        $data['formUrl'] = route('admin.pages.store');
        return view('admin.pages.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreatePage  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePage $request)
    {
        Page::create($request->validated());
        return redirect()->route('admin.pages.index')->with('success', 'Data Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $data['action'] = "Edit";
        $data['method'] = "PUT";
        $data['formUrl'] = route('admin.pages.update', $page['id']);
        $data['page'] = $page;
        return view('admin.pages.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CreatePage  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePage $request, Page $page)
    {
        $page->update($request->validated());
        return redirect()->route('admin.pages.index')->with('success', 'Data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Data Updated Successfully !');
    }
}
