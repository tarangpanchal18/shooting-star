@extends('adminlte::page')
@section('title', 'Exhibition Module | '. $exhibition['title'])
@section('content_header')
    <h1>View Exhibition</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View {{ $exhibition['title'] }} Detail</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.exhibition.index') }}" class="btn btn-sm btn-info">Back</a>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
                    <tr>
                        <th>Exhibition Category</th>
                        <td>{{ $exhibition->category->name }}</td>
                    </tr>
                    <tr>
                        <th>Exhibition Title</th>
                        <td>{{ $exhibition['title'] }}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{ $exhibition['short_description'] }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $exhibition['description'] }}</td>
                    </tr>
                    <tr>
                        <th>Exhibition Starts On</th>
                        <td>{{ $exhibition['start_date'] }}</td>
                    </tr>
                    <tr>
                        <th>Exhibition Ends On</th>
                        <td>{{ $exhibition['end_date'] }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span class="badge badge-{{$exhibition['status'] == "Active" ? 'warning' : 'danger'}}">{{ $exhibition['status'] }}</span></td>
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
