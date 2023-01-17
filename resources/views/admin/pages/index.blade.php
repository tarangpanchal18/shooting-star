@extends('adminlte::page')
@section('title', 'Pages Module')
@section('content_header')
    <h1>Pages List</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pages List</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            <a href="{{ route('webadmin.pages.create') }}" class="btn btn-sm btn-info">+ Add Pages</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Page Title</th>
                        <th>Status</th>
                        <th>Updated On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $page)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $page['title'] }}</td>
                        <td>{{ $page['status'] }}</td>
                        <td>{{ $page['updated_at'] }}</td>
                        <td>
                            <a class="btn btn-sm btn-info">View</a>
                            <a href="{{$page['id']}}/edit" class="btn btn-sm btn-success">Edit</a>
                            <a class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No Data Found !</td>
                    </tr>
                    @endforelse
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
