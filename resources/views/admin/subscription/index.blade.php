@extends('adminlte::page')
@section('title', 'Subscription Module')
@section('content_header')
<h1>Subscription List</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Subscription List</h3>
                <div class="card-tools">
                    {{-- <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Created At</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>IP Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pageData as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row['created_at'] }}</td>
                            <td>{{ $row['name'] ? $row['name'] : '-' }}</td>
                            <td>{{ $row['email'] }}</td>
                            <td>{{ $row['ip_address'] }}</td>
                            <td>
                                <a href="{{ route('admin.subscription.destroy', $row['id']) }}"
                                    onclick="event.preventDefault();" class="btn btn-sm btn-default delete-item"
                                    data-id="{{ $row['id'] }}">Delete</a>
                                <!-- Form For Delete -->
                                <form id="submit-form-{{ $row['id'] }}"
                                    action="{{ route('admin.subscription.destroy', $row['id']) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
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
                {{ $pageData->links() }}
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
