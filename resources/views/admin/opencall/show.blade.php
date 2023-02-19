@extends('adminlte::page')
@section('title', 'Open call Module | '. $openCall['title'])
@section('content_header')
<h1>View Open Call</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View {{ $openCall['title'] }} Detail</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.opencall.index') }}" class="btn btn-sm btn-info">Back</a>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
                    <tr>
                        <th>Open Call Category</th>
                        <td>{{ $openCall->category->name }}</td>
                    </tr>
                    <tr>
                        <th>Open Call Title</th>
                        <td>{{ $openCall['title'] }}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{ $openCall['short_description'] }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! $openCall['description'] !!}</td>
                    </tr>
                    <tr>
                        <th>Open Call Starts On</th>
                        <td>{{ $openCall['start_date'] }}</td>
                    </tr>
                    <tr>
                        <th>Open Call Ends On</th>
                        <td>{{ $openCall['end_date'] }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span class="badge badge-{{$openCall['status'] == " Active" ? 'warning' : 'danger' }}">{{
                                $openCall['status'] }}</span></td>
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
