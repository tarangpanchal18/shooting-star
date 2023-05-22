@extends('adminlte::page')
@section('title', $action.' Shop Item')
@section('content_header')
    <h1>{{ $action }} Shop Item</h1>
@stop

@section('content')
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{ $action ." ". $shop['title'] }} Shop Item Data</h3>
        </div>
        <form action="{{ $formUrl }}" method="POST" enctype="multipart/form-data">
            @if($method != 'POST')
            <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="card-body">
                @include('admin.component.alert_msg')
                @csrf
                 <div class="form-group">
                    <label>Select Artist</label>
                    <select class="form-control" name="artist_id">
                    <option value="">Select Artist</option>
                    @foreach ($artistList as $artist)
                        <option {{($shop['artist_id'] == $artist->id) ? 'selected' : ''}} value="{{ $artist->id }}">{{ $artist->artist_name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Item Title</label>
                    <input type="text" name="item_title" class="form-control" placeholder="Enter Shop Title" value="{{ old('item_title', $shop['item_title']) }}" required>
                </div>
                {{-- <div class="form-group">
                    <label>Item Description 1</label>
                    <input type="text" name="item_short_description" class="form-control" placeholder="Enter Item Description" value="{{ old('item_short_description', $Shop['item_short_description']) }}" required>
                </div> --}}
                <div class="form-group">
                    <label>Item Description</label>
                    <textarea name="item_description" class="form-control" placeholder="Enter Item Description">{{ old('item_description', $shop['item_description']) }}</textarea>
                    <small class="text-info"><strong>Note:</strong>: Please add <strong>&lt;br&gt;</strong> if you want to add new line in page</small>
                </div>
                <div class="form-group">
                    <label>Item Price</label>
                    <input type="number" name="item_price" class="form-control" placeholder="Enter Item Price" value="{{ old('item_price', $shop['item_price']) }}" required>
                    <small class="text-info"><strong>Note:</strong> All price are in £</small>
                </div>
                @if($shop['item_filename'])
                <div class="form-group">
                    <label>Preview Image</label>
                    <p><img style="height:100px;width:100px;" class="img-thumbnail" src="{{asset('images/shop_item/'. $shop['item_filename'])}}"></p>
                </div>
                @endif
                <div class="form-group">
                    <label>Item Image</label>
                    <input type="file" name="item_filename" class="form-control">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Active" {{($shop['status'] == 'Active') ? "checked" : ""}} id="status_active">
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="InActive" {{($shop['status'] == 'InActive') ? "checked" : ""}} id="status_inactive">
                            <label class="form-check-label" for="status_inactive">InActive</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ $action }} Page</button>
                <a href="{{ route('admin.shop.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
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
