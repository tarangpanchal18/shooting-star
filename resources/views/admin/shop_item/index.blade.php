@extends('adminlte::page')
@section('title', 'Shop Item Module')
@section('content_header')
    <h1>Shop Item List</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @include('admin.component.alert_msg')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Shop Item List</h3>
                <div class="card-tools">
                    {{-- <div class="input-group input-group-sm" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div> --}}
                    <a href="{{ route('admin.shop.create') }}" class="btn btn-sm btn-info">+ Add Shop Item</a>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Artist Name</th>
                            <th>Shop Item Title</th>
                            <th>Shop Item Description</th>
                            <th>Shop Item Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shop_items as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->artist->artist_name }}</td>
                            <td>{{ $row['item_title'] }}</td>
                            <td>{{ $row['item_description'] }}</td>
                            <td>{{ number_format($row['item_price'],2) }}</td>
                            <td>
                                <span class="badge badge-{{$row['status'] == "Active" ? 'success' : 'danger'}}">{{ $row['status'] }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.shop.edit', $row['id']) }}" class="btn btn-sm btn-default">Edit</a>
                                <a href="{{ route('admin.shop.destroy', $row['id']) }}" onclick="event.preventDefault();" class="btn btn-sm btn-default delete-item" data-id="{{ $row['id'] }}">Delete</a>
                                 <!-- Form For Delete -->
                                <form id="submit-form-{{ $row['id'] }}" action="{{ route('admin.shop.destroy', $row['id']) }}" method="POST" class="hidden">
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
                {{ $shop_items->links() }}
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
