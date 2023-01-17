@extends('adminlte::page')
@section('title', 'Create Page')
@section('content_header')
    <h1>Create Page</h1>
@stop

@section('content')
<div class="col-md-12">
  <div class="card card-default">
    <div class="card-header">
      <h3 class="card-title">Add New Page</h3>
    </div>
    <form action="{{ route('webadmin.pages.store') }}" method="post">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" name="title" class="form-control" placeholder="Enter Page Title" required>
        </div>
        <div class="form-group">
          <label>Page Description</label>
          <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Page Description" required></textarea>
        </div>
        <div class="form-group">
          <label>Page SEO Keywords</label>
          <input type="text" name="seo_description" class="form-control" placeholder="Enter SEO Keywords" required>
        </div>
        <div class="form-group">
          <label>Page SEO Description</label>
          <input type="text" name="seo_keywords" class="form-control" placeholder="Enter SEO Desciption" required>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Create Page</button>
      </div>
    </form>
  </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
