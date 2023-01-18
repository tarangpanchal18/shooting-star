@extends('adminlte::page')
@section('title', 'Create Exhibition')
@section('content_header')
    <h1>{{ $data['action'] }} Exhibition</h1>
@stop

@section('content')
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{ $data['action'] . " " . $data['page']['title'] }} Exhibition Data</h3>
        </div>
        <form action="{{ $data['formUrl'] }}" method="POST">
            @if($data['method'] != 'POST')
            <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="card-body">
                @include('admin.component.alert_msg')
                @csrf
                <div class="form-group">
                    <label>Exhibition Category</label>
                    <select class="form-control" name="category_id">
                        @forelse($data['category'] as $cat)
                        <option {{ $data['exhibition']['category'] == $cat['id'] ? 'selected' : ''}} value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                        @empty
                        <option value="" disabled>No category Found !</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>Exhibition Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Exhibition Title" value="{{ old('title', $data['exhibition']['title']) }}" required>
                </div>
                <div class="form-group">
                    <label>Exhibition Desciption (short)</label>
                    <input type="text" name="short_description" class="form-control" placeholder="Exhibition Desciption (short)" value="{{ old('short_description', $data['exhibition']['short_description']) }}" required>
                </div>
                 <div class="form-group">
                    <label>Exhibition Desciption (long)</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Exhibition Desciption (long)" required>{{ old('title', $data['exhibition']['description']) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control" placeholder="Enter Start Date" value="{{ old('start_date', $data['exhibition']['start_date']) }}" required>
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" name="end_date" class="form-control" placeholder="Enter End Date" value="{{ old('end_date', $data['exhibition']['end_date']) }}" required>
                </div>
                <div class="form-group">
                    <label>Page Status</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Active" {{($data['exhibition']['status'] == 'Active') ? "checked" : ""}} id="status_active">
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="InActive" {{($data['exhibition']['status'] == 'InActive') ? "checked" : ""}} id="status_inactive">
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
