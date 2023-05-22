@extends('adminlte::page')
@section('title', $data['action'] . ' Open Call Form Field')
@section('content_header')
    <h1>{{ $data['action'] }} Open Call Form Field</h1>
@stop

@section('content')
<style>
.bootstrap-tagsinput {
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    /*
    color: #495057;
    background-color: #fff;
    border: 1px solid #ced4da;
    */
    background-clip: padding-box;
    border-radius: .25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.bootstrap-tagsinput .tag {
   background: red;
   padding: 4px;
   font-size: 14px;
   border-radius: 10px;
}
</style>

<div class="col-md-12">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">{{ $data['action'] . " " . $data['page']['title'] }} Open Call Form Field Data</h3>
        </div>
        <form action="{{ $data['formUrl'] }}" method="POST">
            @if($data['method'] != 'POST')
            <input type="hidden" name="_method" value="PUT" />
            @endif
            <div class="card-body">
                @include('admin.component.alert_msg')
                @csrf
                <div class="form-group">
                    <label>Field Label</label>
                    <input type="text" name="field_label" class="form-control" placeholder="field_label" value="{{ old('field_label', $data['opencallForm']['field_label']) }}" required>
                </div>
                <div class="form-group">
                    <label>Field Name</label>
                    <input type="text" name="field_name" class="form-control"
                        placeholder="field_name"
                        value="{{ old('field_name', $data['opencallForm']['field_name']) }}" required>
                </div>
                <div class="form-group">
                    <label>Field Type</label>
                    <select name="field_type" class="form-control" id="field_type" required>
                        <option value="">Select Value</option>
                        @foreach ($data['field_type'] as $row)
                        <option {{$data['opencallForm']['field_type'] == $row ? 'selected' : ''  }} value="{{ $row }}">{{ ucfirst($row) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="field_multi_value" style="display:{{($data['opencallForm']['field_type'] == "select" || $data['opencallForm']['field_type'] == "multiselect") ? 'block' : 'none'}}">
                    <label>Multi Field Values <small>(Add and then press enter)</small></label>
                    <input type="text" id="tags-input" name="field_multi_value" class="form-control" placeholder="field_multi_value" value="{{ old('field_multi_value') }}">
                </div>
                {{-- <div class="form-group">
                    <label>Field Description</label>
                    <input type="text" name="field_description" class="form-control" placeholder="field_description" value="{{ old('field_description', $data['opencallForm']['field_description']) }}">
                </div> --}}
                <div class="form-group">
                    <label>Is Required ?</label>
                    <select name="field_is_required" class="form-control" required>
                        <option {{($data['opencallForm']['field_is_required'] === 1 ? 'selected' : '' )}} value="1">Yes</option>
                        <option {{($data['opencallForm']['field_is_required'] === 0 ? 'selected' : '' )}} value="0">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Field Status</label>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="Active"
                                {{($data['opencallForm']['status']=='Active' ) ? "checked" : "" }} id="status_active">
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" value="InActive"
                                {{($data['opencallForm']['status']=='InActive' ) ? "checked" : "" }} id="status_inactive">
                            <label class="form-check-label" for="status_inactive">InActive</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">{{ $data['action'] }} Page</button>
                <a href="{{ route('admin.opencall.opencall-form.index', $data['openCallId']) }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.2/tinymce.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#tags-input').tagsinput();

            $("#field_type").change(function(){
                let val = $(this).val();
                if(val == "select" || val == "multiselect") {
                    $("#field_multi_value").show();
                } else {
                    $("#field_multi_value").hide();
                }

                $('#tags-input').tagsinput('removeAll')
            });

            @php if($data['action'] != "Add") { @endphp
            @php foreach(explode(',', $data['opencallForm']['field_multi_value']) as $a) { @endphp
            $('#tags-input').tagsinput('add', '{{$a}}');
            @php } @endphp
            @php } @endphp
            //tagInputEle.tagsinput('add', 'Jakarta');
        });
    </script>
@stop
