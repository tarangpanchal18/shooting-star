<?php

namespace App\Http\Controllers;

use App\Models\OpenCall;
use Illuminate\Support\Str;
use App\Models\OpenCallResponse;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CreateOpenCallUserForm;
use App\Mail\OpenCallFormFilledMail;
use App\Repositories\UploadFileRepository;

class OpenCallUserFormController extends Controller
{

    public function __construct(public UploadFileRepository $uploadFileRepository) {
        $this->uploadFileRepository = $uploadFileRepository;
    }
    /**
     * Display a form page for opencall.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OpenCall $opencall)
    {
        return view('opencall_form', [
            'pageName' => $opencall->title,
            'opencall' => $opencall,
            'opencallList' => OpenCall::where('end_date', '>=', date('Y-m-d'))->where('status', 'Active')->get(),
            'customField' => $opencall->formfield->where('status', 'Active'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  app\Http\Request\CreateOpenCallUserForm  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOpenCallUserForm $request)
    {
        $response = $request->validated();

        $customItems = array_filter($response, function($key) {
            return strpos($key, 'custom_') === 0;
        }, ARRAY_FILTER_USE_KEY);

        foreach ($customItems as $key => $val) {

            if (is_object($val)) {
                $val = $this->uploadFileRepository->uploadFile('front_opencall', $val, $response['open_call_id'].'/'.Str::slug($response['name']));
            }

            $newData[] = [str_replace("custom_", "", $key) => $val];
        }

        //Art Work Image Upload
        if ($request->file('art_work_image')) {
            foreach ($request->file('art_work_image') as $file) {
                $artwork[] = $this->uploadFileRepository->uploadFile('front_opencall', $file, $response['open_call_id'].'/'.Str::slug($response['name']));
            }

            $response['art_work_title'] = json_encode($response['art_work_title']);
            $response['art_work_size'] = json_encode($response['art_work_size']);
            $response['art_work_medium'] = json_encode($response['art_work_medium']);
            $response['art_work_image'] = json_encode($artwork);
        }

        $response['other_field'] = json_encode($newData, TRUE);
        OpenCallResponse::create($response);

        Mail::to(config('mail.from.address'))->send(new OpenCallFormFilledMail('Admin', $response));
        Mail::to($response['email'])->send(new OpenCallFormFilledMail('User', $response));

        return redirect(route('opencall.thanks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('opencall_form_thank_you');
    }

}
