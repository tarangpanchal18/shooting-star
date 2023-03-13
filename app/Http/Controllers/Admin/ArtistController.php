<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArtist;
use App\Models\Artist;
use App\Models\ArtistImage;
use App\Repositories\UploadFileRepository;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    /**
     * Constructor Function
     *
     * @param App\Repositories\UploadFileRepository $uploadFileRepository
     */
    public function __construct(public UploadFileRepository $uploadFileRepository)
    {
        $this->uploadFileRepository = $uploadFileRepository;
    }

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
        $data = $request->validated();
        if ($file = $request->file('cover_image')) {
            $data['artist_cover_image'] = $this->uploadFileRepository->uploadFile('artist_cover', $file, );
        }
        Artist::create($data);

        return to_route('admin.artist.index')
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
        $data = $request->validated();
        if ($file = $request->file('cover_image')) {
            unlink(Artist::UPLOAD_COVER_PATH.$artist->artist_cover_image);
            $data['artist_cover_image'] = $this->uploadFileRepository->uploadFile('artist_cover', $file);
        }
        $artist->update($data);

        return to_route('admin.artist.index')
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
        $path = public_path(Artist::UPLOAD_COVER_PATH);
        unlink($path.'/'.$artist->artist_cover_image);
        $artist->delete();

        return to_route('admin.artist.index')
            ->with('success', 'Data Updated Successfully !');
    }

    /**
     * Return the page for upload images.
     *
     * @param App\Models\Artist $artist
     * @return \Illuminate\Http\Response
     */
    public function gallery(Artist $artist)
    {
        return view('admin.artist.gallery.index', [
            'artist' => $artist
        ]);
    }

    /**
     * Upload images.
     *
     * @param App\Models\Artist $artist
     * @return json
     */
    public function upload(Request $request, Artist $artist)
    {
        $imageSize = $request->file('file')->getSize();
        $imageName = $this->uploadFileRepository->uploadFile(
            'artist',
            $request->file('file'),
            $artist->id
        );

        $imageUpload = new ArtistImage();
        $imageUpload->artist_id = $artist->id;
        $imageUpload->title = $imageName;
        $imageUpload->filename = $imageName;
        $imageUpload->file_size = $imageSize;
        $imageUpload->save();

        return response()->json([
            'success'=>$imageName
        ]);
    }

    /**
     * Delete Upload images.
     *
     * @param App\Models\Artist $artist
     * @return json
     */
    public function removeUpload(Request $request, Artist $artist)
    {
        $path = public_path(Artist::UPLOAD_PATH.$artist->id);
        unlink($path.'/'.$request->file_name);
        $data = ArtistImage::where('filename', $request->file_name);
        $data->delete();

        return response()->json([
            'success' => $request->file_name
        ]);
    }
}
