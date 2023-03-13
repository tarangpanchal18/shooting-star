<?php

namespace App\Http\Controllers;

use App\Models\OpenCall;
use App\Http\Requests\CreateOpenCallUserForm;
use App\Services\OpenCallFormService;

class OpenCallUserFormController extends Controller
{

    public function __construct(private OpenCallFormService $openCallUserFormService) {
        $this->openCallUserFormService = $openCallUserFormService;
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
        $this->openCallUserFormService->store($request->validated(), $request->file('art_work_image'));
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
