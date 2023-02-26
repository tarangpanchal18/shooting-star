@extends('adminlte::page')
@section('title', 'Open Calls Form Fields')
@section('content_header')
<h1>Open Calls Form Fields</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Open Calls Form Fields</h3>
            </div>

            <div class="card-body table-responsive p-0">

            </div>
            <div class="card-footer float-right">
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
</script>
@stop
