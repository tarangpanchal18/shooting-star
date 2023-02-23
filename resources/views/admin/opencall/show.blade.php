@extends('adminlte::page')
@section('title', 'Open call Module | '. $opencall['title'])
@section('content_header')
<h1>View Open Call</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View {{ $opencall['title'] }} Detail</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.opencall.index') }}" class="btn btn-sm btn-info">Back</a>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-bordered">
                    <tr>
                        <th>Open Call Title</th>
                        <td>{{ $opencall['title'] }}</td>
                    </tr>
                    <tr>
                        <th>Short Description</th>
                        <td>{{ $opencall['short_description'] }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!! $opencall['description'] !!}</td>
                    </tr>
                    <tr>
                        <th>Open Call Starts On</th>
                        <td>{{ $opencall['start_date'] }}</td>
                    </tr>
                    <tr>
                        <th>Open Call Ends On</th>
                        <td>{{ $opencall['end_date'] }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><span class="badge badge-{{$opencall['status'] == " Active" ? 'warning' : 'danger' }}">{{
                                $opencall['status'] }}</span></td>
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
