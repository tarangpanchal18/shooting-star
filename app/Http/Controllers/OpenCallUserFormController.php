<?php

namespace App\Http\Controllers;

use App\Models\OpenCall;
use App\Models\OpenCallResponse;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CreateOpenCallUserForm;
use App\Mail\OpenCallFormFilledMail;

class OpenCallUserFormController extends Controller
{
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
            $newData[] = [str_replace("custom_", "", $key) => $val];
        }

        $response['other_field'] = json_encode($newData, TRUE);
        OpenCallResponse::create($response);

        //sending an email
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
