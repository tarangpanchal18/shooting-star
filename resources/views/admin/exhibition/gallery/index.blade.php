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

            <div class="card-footer bg-white">
                <h4>Uploaded Images</h4>
                <div class="row" style="width: 100%;overflow:scroll;margin-bottom:10px;">
                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                    @forelse($data['exhibition']->images as $val)
                    <li>
                        <span class="mailbox-attachment-icon">
                            <img style="height: 150px" class="img-thumbnail" src="{{ asset('images/'.$data['exhibition']['id'].'/original/'.$val['filename']) }}" alt="">
                        </span>
                        <div class="mailbox-attachment-info"><br>
                            <a class="mailbox-attachment-name">{{ $val['filename'] }}</a>
                            <span class="mailbox-attachment-size clearfix mt-1">
                                <span>{{ $val['file_size'] }} B</span>
                                <a class="btn btn-default btn-sm float-right removeImage" data-fileName="{{ $val['filename'] }}"><i class="fas fa-trash"></i></a>
                            </span>
                        </div>
                    </li>
                    @empty
                    <p>No Images Uploaded Yet !</p>
                    @endforelse
                </div>

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

            this.on('queuecomplete', function () {
                location.reload();
            });

            $("#processDropZone").click(function (e) {
                e.preventDefault();
                myDropzone.processQueue();
            });
        }
    }

    $(".removeImage").click(function () {
        var fileName = $(this).data("filename");
        var formUrl = "{{ route('admin.exhibition.removeUpload', $data['exhibition']['id']) }}";

        if(confirm('Are you sure you want to remove ?')) {
            $.post(formUrl, {
                'file_name' : fileName,
                '_token' : '{{ csrf_token() }}',
            });

            location.reload();
        }
    });
</script>
@stop
