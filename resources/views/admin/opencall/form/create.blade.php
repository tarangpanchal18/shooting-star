@extends('adminlte::page')
@section('title', $data['action'] . ' Open Call Form Field')
@section('content_header')
    <h1>{{ $data['action'] }} Open Call Form Field</h1>
@stop

@section('content')
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{ $data['action'] . " " . $data['page']['title'] }} Open Call Form Field Data</h3>
        </div>
        <form action="{{ $data['formUrl'] }}" method="POST">
            @if($data['method'] != 'POST')
            <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="card-body">
                @include('admin.component.alert_msg')
                @csrf
                <div class="form-group">
                    <label>Field Label</label>
                    <input type="text" name="field_label" class="form-control" placeholder="field_label" value="{{ old('field_label', $data['opencallForm']['field_label']) }}" required>
                </div>
                <div class="form-group">
                    <label>Field Name</label>
                    <input type="text" name="field_name" class="form-control"
                        placeholder="field_name"
                        value="{{ old('field_name', $data['opencallForm']['field_name']) }}" required>
                </div>
                <div class="form-group">
                    <label>Field Type</label>
                    <select name="field_type" class="form-control" required>
                        <option value="">Select Value</option>
                        @foreach ($data['field_type'] as $row)
                        <option {{$data['opencallForm']['field_type'] == $row ? 'selected' : ''  }} value="{{ $row }}">{{ ucfirst($row) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Field Description</label>
                    <input type="text" name="field_description" class="form-control" placeholder="field_description" value="{{ old('field_description', $data['opencallForm']['field_description']) }}">
                </div>
                <div class="form-group">
                    <label>Is Required ?</label>
                    <select name="field_is_required" class="form-control" required>
                        <option {{($data['opencallForm']['field_is_required'] === 1 ? 'selected' : '' )}} value="1">Yes</option>
                        <option {{($data['opencallForm']['field_is_required'] === 0 ? 'selected' : '' )}} value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Field Status</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Active"
                                {{($data['opencallForm']['status']=='Active' ) ? "checked" : "" }} id="status_active">
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="InActive"
                                {{($data['opencallForm']['status']=='InActive' ) ? "checked" : "" }} id="status_inactive">
                            <label class="form-check-label" for="status_inactive">InActive</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ $data['action'] }} Page</button>
                <a href="{{ route('admin.opencall.opencall-form.index', $data['openCallId']) }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    });

    ClassicEditor.create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    });
</script>
@stop
