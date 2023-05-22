@extends('adminlte::page')
@section('title', 'Create Page')
@section('content_header')
    <h1>{{ $data['action'] }} Page</h1>
@stop

@section('content')
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{ $data['action'] . " " . $data['page']['title'] }} Page Data</h3>
        </div>
        <form action="{{ $data['formUrl'] }}" method="POST">
            @if($data['method'] != 'POST')
            <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="card-body">
                @include('admin.component.alert_msg')
                @csrf
                <div class="form-group">
                    <label>Page Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Page Title" value="{{ old('title', $data['page']['title']) }}" required>
                </div>
                <div class="form-group">
                    <label>Page SEO Keywords</label>
                    <input type="text" name="seo_keywords" class="form-control" placeholder="Enter SEO Desciption" value="{{ old('seo_keywords', $data['page']['seo_keywords']) }}" required>
                </div>
                <div class="form-group">
                    <label>Page SEO Description</label>
                    <input type="text" name="seo_description" class="form-control" placeholder="Enter SEO Keywords" value="{{ old('seo_description', $data['page']['seo_description']) }}" required>
                </div>
                <div class="form-group">
                    <label>Page Description</label>
                    <textarea name="description" id="editor" cols="30" rows="10" class="form-control" placeholder="Enter Page Description">{{ old('description', $data['page']['description']) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Page Status</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Active" {{($data['page']['status'] == 'Active') ? "checked" : ""}} id="status_active">
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="InActive" {{($data['page']['status'] == 'InActive') ? "checked" : ""}} id="status_inactive">
                            <label class="form-check-label" for="status_inactive">InActive</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ $data['action'] }} Page</button>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.2/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: "#editor"
    });
</script>
@stop
