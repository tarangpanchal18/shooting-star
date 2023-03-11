<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\OpenCallResponse;
use App\Http\Controllers\Controller;

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
     * Display the specified resource.
     *
     * @param  \App\Models\OpenCallResponse  $openCallResponse
     * @return \Illuminate\Http\Response
     */
    public function show(OpenCallResponse $openCallResponse)
    {
        if ($openCallResponse->art_work_title) {
            $artworkData = [
                'art_work_title' => json_decode($openCallResponse->art_work_title),
                'art_work_size' => json_decode($openCallResponse->art_work_size),
                'art_work_medium' => json_decode($openCallResponse->art_work_medium),
                'art_work_image' => json_decode($openCallResponse->art_work_image),
            ];
        }

        return view('admin.opencall.response.show', [
            'opencallResponse' => $openCallResponse,
            'imagepath' => asset('images/opencall_form/'. $openCallResponse->opencall->id.'/'.Str::slug($openCallResponse->name)),
            'otherFieldData' => ($openCallResponse->other_field) ? json_decode($openCallResponse->other_field, TRUE) : '',
            'artworkData' => $artworkData,
        ]);
    }
}
