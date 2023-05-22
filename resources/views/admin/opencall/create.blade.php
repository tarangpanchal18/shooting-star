@extends('adminlte::page')
@section('title', 'Create Open Call')
@section('content_header')
<h1>{{ $data['action'] }} Open Call</h1>
@stop

@section('content')
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{ $data['action'] . " " . $data['page']['title'] }} Open Call Data</h3>
        </div>
        <form action="{{ $data['formUrl'] }}" method="POST" enctype="multipart/form-data">
            @if($data['method'] != 'POST')
            <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="card-body">
                @include('admin.component.alert_msg')
                @csrf
                <div class="form-group">
                    <label>Open Call Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Open Call Title"
                        value="{{ old('title', $data['opencall']['title']) }}" required>
                </div>
                <div class="form-group">
                    <label>Open Call Desciption (short)</label>
                    <input type="text" name="short_description" class="form-control"
                        placeholder="Open Call Desciption (short)"
                        value="{{ old('short_description', $data['opencall']['short_description']) }}" required>
                </div>
                <div class="form-group">
                    <label>Open Call Desciption (long)</label>
                    <textarea name="description" id="editor" cols="30" rows="10" class="form-control"
                        placeholder="Open Call Desciption (long)">{{ old('description', $data['opencall']['description']) }}</textarea>
                    @error('description')<p class="text-danger">Please Add Desciption</p>@enderror
                </div>
                @if($data['opencall']['cover_image'])
                <div class="form-group">
                    <label>Preview Image</label>
                    <p><img style="height:100px;width:100px;" class="img-thumbnail" src="{{asset('images/opencall/'. $data['opencall']['cover_image'])}}"></p>
                </div>
                @endif
                <div class="form-group">
                    <label>Cover Image</label>
                    <input type="file" name="cover_image" class="form-control">
                </div>
                <label>Start-End Date</label>
                <div class="form-group input-group">
                    <input type="text" name="start_date" autocomplete="off" class="form-control datepicker" placeholder="Enter Start Date"
                        value="{{ old('start_date', $data['opencall']['start_date']) }}" required>
                    <span class="input-group-addon">-</span>
                    <input type="text" name="end_date" autocomplete="off" class="form-control datepicker" placeholder="Enter End Date"
                        value="{{ old('end_date', $data['opencall']['end_date']) }}" required>
                </div>
                <div class="form-group">
                    <label>Do you want to show artwork upload in form ?</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_show_artwork" value="Yes"
                                {{($data['opencall']['is_show_artwork']=='Yes' ) ? "checked" : "" }} id="is_show_y_artwork">
                            <label class="form-check-label" for="is_show_y_artwork">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="is_show_artwork" value="No"
                                {{($data['opencall']['is_show_artwork']=='No' ) ? "checked" : "" }} id="is_show_n_artwork">
                            <label class="form-check-label" for="is_show_n_artwork">No</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Active"
                                {{($data['opencall']['status']=='Active' ) ? "checked" : "" }} id="status_active">
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="InActive"
                                {{($data['opencall']['status']=='InActive' ) ? "checked" : "" }} id="status_inactive">
                            <label class="form-check-label" for="status_inactive">InActive</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ $data['action'] }} Page</button>
                <a href="{{ route('admin.opencall.index') }}" class="btn btn-default">Cancel</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.2/tinymce.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    });

    tinymce.init({
        selector: "#editor"
    });
</script>
@stop
