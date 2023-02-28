@extends('adminlte::page')
@section('title', 'Upload Gallery Images')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@stop

@section('content_header')
<h1>Upload Gallery Images</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $data['exhibition']['title'] }} >> Upload Gallery Images</h3>
            </div>

            <div class="card-body">
                <form method="post" enctype="multipart/form-data" class="dropzone" id="exhibitionGallery">
                    @csrf
                </form>
                <div class="form-group" style="margin-top:5px;">
                    <button type="submit" id="processDropZone" class="btn btn-sm btn-success">Submit</button>
                    <a href="{{ route('admin.exhibition.index') }}" class="btn btn-sm btn-info">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script>
    Dropzone.options.exhibitionGallery = {
        autoProcessQueue: false,
        maxFilesize: 10,
        maxFiles: 10,
        parallelUploads: 10,
        uploadMultiple: false,
        addRemoveLinks: true,
        dictMaxFilesExceeded: "You can only upload upto 5 images",
        dictRemoveFile: "Delete",
        dictCancelUploadConfirmation: "Are you sure to cancel upload?",
        dictRemoveFileConfirmation:  "Are you sure?",
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        url: "{{ route('admin.exhibition.upload', $data['exhibition']['id']) }}",
        init: function () {

            var myDropzone = this;

            this.on('sending', function(file, xhr, formData) {
                var data = $('#exhibitionGallery').serializeArray();
                $.each(data, function(key, el) {
                    formData.append(el.name, el.value);
                });
            });

            this.on("removedfile", function(file) {
                $.post("{{ route('admin.exhibition.removeUpload', $data['exhibition']['id']) }}", {
                    "_token": "{{ csrf_token() }}",
                    file_name: file.name
                });
            });

            @forelse($data['exhibition']->images as $val)
                var mockFile = {
                    name: '{{ $val['filename'] }}',
                    size: '{{ $val['file_size'] }}',
                };
                var imgFile = "{{ asset('images/'. $data['exhibition']['id'] .'/original/' . $val['filename']) }}";
                myDropzone.options.addedfile.call(myDropzone, mockFile);
                myDropzone.options.thumbnail.call(myDropzone, mockFile, imgFile);
            @empty
            @endforelse

            $("#processDropZone").click(function (e) {
                e.preventDefault();
                myDropzone.processQueue();
            });
        }
    }
</script>
@stop
