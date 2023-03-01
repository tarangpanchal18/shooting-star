<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArtist;
use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.artist.index', [
            'artist' => Artist::orderBy('id', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artist.create', [
            'action' => "Add",
            'method' => "POST",
            'formUrl' => route('admin.artist.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateArtist  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArtist $request)
    {
        Artist::create($request->validated());
        return redirect()->route('admin.artist.index')
            ->with('success', 'Data Added Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('admin.artist.create', [
            'action' => 'Edit',
            'method' => 'PUT',
            'artist' => $artist,
            'formUrl' => route('admin.artist.update', $artist['id']),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CreateArtist  $request
     * @param App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(CreateArtist $request, Artist $artist)
    {
        $artist->update($request->validated());
        return redirect()->route('admin.artist.index')
            ->with('success', 'Data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('admin.artist.index')
            ->with('success', 'Data Updated Successfully !');
    }
}
