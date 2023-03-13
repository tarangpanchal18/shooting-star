<?php

namespace App\Http\Controllers\Admin;

use App\Models\OpenCall;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOpenCall;
use App\Repositories\UploadFileRepository;

class OpenCallController extends Controller
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
        $data = $request->validated();
        if ($file = $request->file('cover_image')) {
            $data['cover_image'] = $this->uploadFileRepository->uploadFile('opencall', $file);
        }
        OpenCall::create($data);

        return to_route('admin.opencall.index')
            ->with('success', 'Data Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function show(OpenCall $opencall)
    {
        return view('admin.opencall.show', compact('opencall'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function edit(OpenCall $opencall)
    {
        $data['action'] = "Edit";
        $data['method'] = "PUT";
        $data['opencall'] = $opencall;
        $data['formUrl'] = route('admin.opencall.update', $opencall['id']);

        return view('admin.opencall.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CreateOpenCall  $request
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOpenCall $request, OpenCall $opencall)
    {
        $data = $request->validated();
        if ($file = $request->file('cover_image')) {
            unlink(Opencall::UPLOAD_PATH.$opencall->cover_image);
            $data['cover_image'] = $this->uploadFileRepository->uploadFile('opencall', $file);
        }
        $opencall->update($data);

        return to_route('admin.opencall.index')
            ->with('success', 'Data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpenCall $opencall)
    {
        $path = public_path(OpenCall::UPLOAD_PATH);
        unlink($path.'/'.$opencall->cover_image);
        $opencall->delete();

        return to_route('admin.opencall.index')->with('success', 'Data Updated Successfully !');
    }
}
