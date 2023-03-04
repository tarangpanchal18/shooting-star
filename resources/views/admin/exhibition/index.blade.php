@extends('adminlte::page')
@section('title', 'Exhibition Module')
@section('content_header')
    <h1>Exhibitions List</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Exhibition List</h3>
                <div class="card-tools">
                    {{-- <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div> --}}
                    <a href="{{ route('admin.exhibition.create') }}" class="btn btn-sm btn-info">+ Add Exhibition</a>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Exhibition Title</th>
                            <th>Exhibition Images</th>
                            <th>Exhibition Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $page)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $page->category->name }}</td>
                            <td>{{ $page['title'] }}</td>
                            <td>{{ $page->images->count() }} Images</td>
                            <td>{{ $page['start_date']  ." - ". $page['end_date'] }}</td>
                            <td>
                                <span class="badge badge-{{$page['status'] == "Active" ? 'success' : 'danger'}}">{{ $page['status'] }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.exhibition.gallery', $page['id']) }}" class="btn btn-sm btn-default">Add Images</a>
                                <a href="{{ route('admin.exhibition.show', $page['id']) }}" class="btn btn-sm btn-default">View</a>
                                <a href="{{ route('admin.exhibition.edit', $page['id']) }}" class="btn btn-sm btn-default">Edit</a>
                                <a href="{{ route('admin.exhibition.destroy', $page['id']) }}" onclick="event.preventDefault();" class="btn btn-sm btn-default delete-item" data-id="{{ $page['id'] }}">Delete</a>

                                 <!-- Form For Delete -->
                                <form id="submit-form-{{ $page['id'] }}" action="{{ route('admin.exhibition.destroy',$page['id']) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
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
            <div class="card-footer float-right">
                {{ $data->links() }}
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
