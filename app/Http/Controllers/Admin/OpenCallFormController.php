<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOpenCallForm;
use App\Models\OpenCall;
use App\Models\OpenCallFormField;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OpenCallFormController extends Controller
{
    protected $fieldType = ['text', 'number', 'email', 'password', 'textarea', 'select', 'multiselect', 'image', 'file'];

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param int $openCallId
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $openCallId)
    {
        $data = [
            'openCall' => OpenCall::findOrFail($openCallId),
            'openCallId' => $openCallId,
            'fields' => OpenCallFormField::where('open_call_id', $openCallId)->paginate(),
        ];

        return view('admin.opencall.form.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $openCallId
     * @return \Illuminate\Http\Response
     */
    public function create($openCallId)
    {
        $data = [
            'action' => "Add",
            'method' => "POST",
            'openCallId' => $openCallId,
            'field_type' => $this->fieldType,
            'formUrl' => route('admin.opencall.opencall-form.store', $openCallId),
        ];

        return view('admin.opencall.form.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CreateOpenCallForm  $request
     * @param int $openCallId
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOpenCallForm $request, $openCallId)
    {
        $data = array_merge(['open_call_id' => $openCallId], $request->validated());
        $data['field_name'] = Str::slug($data['field_name']);
        OpenCallFormField::create($data);

        return redirect()->route('admin.opencall.opencall-form.index', $openCallId)
            ->with('success', 'Data Added Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OpenCallFormField $opencallFormField
     * @param int $openCallFormId
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $openCallFormId)
    {
        $opencallFormField = OpenCallFormField::findOrFail($openCallFormId);
        $data = [
            'action' => "Edit",
            'method' => "PUT",
            'openCallId' => $id,
            'field_type' => $this->fieldType,
            'opencallForm' => $opencallFormField,
            'formUrl' => route('admin.opencall.opencall-form.update', [
                $id,
                $opencallFormField['id']
            ]),
        ];

        return view('admin.opencall.form.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CreateOpenCallForm $request
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function update(CreateOpenCallForm $request, $id, $openCallFormId)
    {
        $opencallFormField = OpenCallFormField::findOrFail($openCallFormId);
        $data = array_merge(['open_call_id' => $id], $request->validated());
        $data['field_name'] = Str::slug($data['field_name']);
        $opencallFormField->update($data);

        return redirect()->route('admin.opencall.opencall-form.index', $id)
            ->with('success', 'Data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OpenCall  $openCall
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $openCallFormId)
    {
        $opencallFormField = OpenCallFormField::findOrFail($openCallFormId);
        $opencallFormField->delete();

        return redirect()->route('admin.opencall.opencall-form.index', $id)
            ->with('success', 'Data Updated Successfully !');
    }
}
