@extends('adminlte::page')
@section('title', 'Open Calls Response Module')
@section('content_header')
<h1>Open Calls Response List</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Open Calls Response List</h3>
                <div class="card-tools">
                    <div class="input-group" style="">
                        <form action="export/opencallresponse">
                            <button type="submit" class="btn btn-primary">Export Data</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Open Call Title</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Website Link</th>
                            <th>Form Fill On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($opencallResponse as $page)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $page->opencall->title }}</td>
                            <td>{{ $page->name }}</td>
                            <td>{{ $page->email }}</td>
                            <td>{{ $page->phone }}</td>
                            <td>{{ $page->website_link }}</td>
                            <td>{{ date('d M Y', strtotime($page->created_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.open-call-response.show', $page->id) }}" class="btn btn-sm btn-default">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Data Found !</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer float-right">
                {{ $opencallResponse->links() }}
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
