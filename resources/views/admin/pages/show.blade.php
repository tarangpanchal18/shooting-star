@extends('adminlte::page')
@section('title', 'Pages Module | '. $page['title'])
@section('content_header')
    <h1>View Page</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View {{ $page['title'] }} Detail</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-sm btn-info">Back</a>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
                    <tr>
                        <th>Page Title</th>
                        <td>{{ $page['title'] }}</td>
                    </tr>
                    <tr>
                        <th>Page SEO Description</th>
                        <td>{{ $page['seo_description'] }}</td>
                    </tr>
                    <tr>
                        <th>Page SEO Keywords</th>
                        <td>{{ $page['seo_keywords'] }}</td>
                    </tr>
                    <tr>
                        <th>Page Description</th>
                        <td>{{ $page['description'] }}</td>
                    </tr>
                    <tr>
                        <th>Created On</th>
                        <td>{{ $page['created_at'] }}</td>
                    </tr>
                    <tr>
                        <th>Updated On</th>
                        <td>{{ $page['updated_at'] }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span class="badge badge-{{$page['status'] == "Active" ? 'warning' : 'danger'}}">{{ $page['status'] }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
