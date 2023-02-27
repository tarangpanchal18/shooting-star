@extends('adminlte::page')
@section('title', 'Open Calls Form Module')
@section('content_header')
<h1>{{$data['openCall']['title']}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Open Calls Form Field List</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.opencall.opencall-form.create', $data['openCallId']) }}" class="btn btn-sm btn-default">+ Add Field</a>
                    <a href="{{ route('admin.opencall.index') }}" class="btn btn-sm btn-info">Back</a>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Field Name</th>
                            <th>Field Type</th>
                            <th>Field Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data['fields'] as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row['field_name'] }}</td>
                            <td>{{ $row['field_type'] }}</td>
                            <td>{{ $row['field_description'] }}</td>
                            <td>
                                <span class="badge badge-{{($row['status'] == "Active") ? 'success' : 'danger' }}"> {{
                                    $row['status'] }} </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.opencall.opencall-form.edit', [
                                    $data['openCallId'],
                                    $row['id']
                                ]) }}" class="btn btn-sm btn-warning">Edit</a>

                                <a href="{{ route('admin.opencall.opencall-form.destroy', [
                                    $data['openCallId'],
                                    $row['id']
                                ]) }}" onclick="event.preventDefault();" class="btn btn-sm btn-danger delete-item" data-id="{{ $row['id'] }}">Delete</a>
                                <!-- Form For Delete -->
                                <form id="submit-form-{{ $row['id'] }}"
                                    action="{{ route('admin.opencall.opencall-form.destroy', [
                                        $data['openCallId'],
                                        $row['id']
                                    ]) }}" method="POST"
                                    class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No Data Found !</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer float-right">
                {{ $data['fields']->links() }}
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    let text = "Are you sure you want to delete this ?";

    $(".delete-item").click(function() {
        if (confirm(text) == true) {
            var formId = 'submit-form-' + $(this).data("id");
            document.getElementById(formId).submit();
        }
    } );
</script>
@stop
