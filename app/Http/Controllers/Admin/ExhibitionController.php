<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Exhibition;
use Illuminate\Http\Request;
use App\Models\ExhibitionImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateExhibition;
use App\Repositories\UploadFileRepository;

class ExhibitionController extends Controller
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
        $data = $request->validated();
        if ($file = $request->file('cover_image')) {
            $data['cover_image'] = $this->uploadFileRepository->uploadFile('exhibition_cover', $file, );
        }
        Exhibition::create($data);

        return redirect()->route('admin.exhibition.index')
            ->with('success', 'Data Added Successfully !');
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
        $data = $request->validated();
        if ($file = $request->file('cover_image')) {
            unlink(Exhibition::UPLOAD_COVER_PATH.$exhibition->cover_image);
            $data['cover_image'] = $this->uploadFileRepository->uploadFile('exhibition_cover', $file);
        }
        $exhibition->update($data);

        return redirect()->route('admin.exhibition.index')
            ->with('success', 'Data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exhibition  $exhibition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibition $exhibition)
    {
        $path = public_path(Exhibition::UPLOAD_COVER_PATH);
        unlink($path.'/'.$exhibition->cover_image);
        $exhibition->delete();

        return redirect()->route('admin.exhibition.index')
            ->with('success', 'Data Updated Successfully !');
    }

    /**
     * Return the page for upload images.
     *
     * @param App\Models\Exhibition $exhibition
     * @return \Illuminate\Http\Response
     */
    public function gallery(Exhibition $exhibition)
    {
        $data['exhibition'] = $exhibition;
        return view('admin.exhibition.gallery.index', compact('data'));
    }

    /**
     * Upload images.
     *
     * @param App\Models\Exhibition $exhibition
     * @return json
     */
    public function upload(Request $request, Exhibition $exhibition)
    {
        $imageSize = $request->file('file')->getSize();
        $imageName = $this->uploadFileRepository->uploadFile(
            'exhibition',
            $request->file('file'),
            $exhibition->id
        );

        $imageUpload = new ExhibitionImage();
        $imageUpload->exhibition_id = $exhibition->id;
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
     * @param App\Models\Exhibition $exhibition
     * @return json
     */
    public function removeUpload(Request $request, Exhibition $exhibition)
    {
        $path = public_path(Exhibition::UPLOAD_PATH.$exhibition->id);
        unlink($path.'/'.$request->file_name);
        $data = ExhibitionImage::where('filename', $request->file_name);
        $data->delete();

        return response()->json([
            'success' => $request->file_name
        ]);
    }
}
