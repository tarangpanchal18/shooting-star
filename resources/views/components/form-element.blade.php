@php
    switch ($type) {
        case 'text':
        case 'email':
        case 'number':
        case 'password':
            $input = '<input
                        class="form-control"
                        type="'. $type .'"
                        name="'.$name.'"
                        placeholder="'.ucfirst($label).'"
                        '.$required.'
                        value="'.old($name).'"
                    >';
            break;

        case 'textarea':
            $input = '<textarea class="form-control" name="'.$name.'" placeholder="'.ucfirst($label).'" '.$required.'></textarea>';
            break;

        case 'image':
            $input = '<input class="form-control" type="file" name="'.$name.'" '.$required.'>';
            $extraLabel = "Max File Size: 10 MB | Acceptable file types: jpg, jpeg, png, gif";
            break;

        case 'file':
            $input = '<input class="form-control" type="file" name="'.$name.'" '.$required.'>';
            $extraLabel = "Max File Size: 10 MB";
            break;

        default:
            abort(500, 'Form Error');
            break;
    }
@endphp
<div class="col-md-{{$col}}">
    <div class="form-group">
        <label>{{ $label }} @if($required)<span style="color:red">*</span>@endif</label>
        {!! $input !!}
        @if($extraLabel)
        <p style="margin:0;padding:0;">
            <small style="font-size:11px;margin:0;padding:0;">{{$extraLabel}}</small>
        </p>
        @endif
        @error($name)
        <p class="errorMsg">{{ $message }}</p>
        @enderror
    </div>
</div>
