@extends('adminlte::page')
@section('title', $action.' Artist')
@section('content_header')
<h1>{{ $action }} Artist</h1>
@stop

@section('content')
<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{ $action }} Artist Data</h3>
        </div>
        <form action="{{ $formUrl }}" method="POST" enctype="multipart/form-data">
            @if($method != 'POST')
            <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="card-body">
                @include('admin.component.alert_msg')
                @csrf
                <div class="form-group">
                    <label>Artist Name</label>
                    <input type="text" name="artist_name" class="form-control" placeholder="Enter Artist Name" value="{{ old('artist_name', $artist['artist_name']) }}" required>
                </div>
               <div class="form-group">
                    <label>Artist Title</label>
                    <input type="text" name="artist_title" class="form-control" placeholder="Enter Artist Title" value="{{ old('artist_title', $artist['artist_title']) }}" required>
                </div>
                <div class="form-group">
                    <label>Artist Location</label>
                    <input type="text" name="artist_location" class="form-control" placeholder="Enter Artist Location" value="{{ old('artist_location', $artist['artist_location']) }}" required>
                </div>
                {{-- <div class="form-group">
                    <label>Artist Cover Image</label>
                    <input type="file" name="artist_cover_image" class="form-control">
                </div> --}}
                <div class="form-group">
                    <label>Artist Video Google Drive Id</label>
                    <input type="text" name="artist_video_url" class="form-control" placeholder="Enter Artist video url" value="{{ old('artist_video_url', $artist['artist_video_url']) }}">
                    <small class="text-info"><strong>Note: </strong>Paste Google Drive Video ID here <code>(e.g 1XJIZGXQIrPDHUfwZOqxm_CpCQzwF5j7)</code></small>
                    <ul style="padding: 17px;">
                        <li><b class="text-info">Steps to get Google Drive ID</b></li>
                        <li>Step 1 : Go to google drive and copy link of video</li>
                        <li>Step 2 : In that link you'll find above example like id</li>
                        <li>Step 3 : Paste that id here</li>
                    </ul>
                </div>
                @if($artist['artist_cover_image'])
                <div class="form-group">
                    <label>Preview Image</label>
                    <p><img style="height:170px;width:130px;" class="img-thumbnail" src="{{asset('images/artist/cover_images/'. $artist['artist_cover_image'])}}"></p>
                </div>
                @endif
                <div class="form-group">
                    <label>Cover Image</label>
                    <input type="file" name="cover_image" class="form-control">
                </div>

                @if($artist['artist_cover_image_2'])
                <div class="form-group">
                    <label>Preview Image - 2</label>
                    <p><img style="height:170px;width:130px;" class="img-thumbnail" src="{{asset('images/artist/cover_images/'. $artist['artist_cover_image_2'])}}"></p>
                </div>
                @endif
                <div class="form-group">
                    <label>Cover Image - 2</label>
                    <input type="file" name="artist_cover_image_2" class="form-control">
                </div>

                @if($artist['artist_cover_image_3'])
                <div class="form-group">
                    <label>Preview Image - 3</label>
                    <p><img style="height:170px;width:130px;" class="img-thumbnail" src="{{asset('images/artist/cover_images/'. $artist['artist_cover_image_3'])}}"></p>
                </div>
                @endif
                <div class="form-group">
                    <label>Cover Image- 3</label>
                    <input type="file" name="artist_cover_image_3" class="form-control">
                </div>

                <div class="form-group">
                    <label>Artist Desciption</label>
                    <textarea name="artist_description" id="editor" cols="30" rows="10" class="form-control"
                        placeholder="Artist Desciption">{{ old('artist_description', $artist['artist_description']) }}</textarea>
                    @error('artist_description')<p class="text-danger">Please Add Desciption</p>@enderror
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Active"
                                {{($artist['status']=='Active' ) ? "checked" : "" }} id="status_active">
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="InActive"
                                {{($artist['status']=='InActive' ) ? "checked" : "" }} id="status_inactive">
                            <label class="form-check-label" for="status_inactive">InActive</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ $action }} Page</button>
                <a href="{{ route('admin.artist.index') }}" class="btn btn-default">Cancel</a>
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
<script src="http://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    });
</script>
@stop
