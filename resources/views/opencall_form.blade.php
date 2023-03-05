@extends('layouts.app')

@section('title', $pageName)
@section('class', 'openCallPage')

@section('internalcss')
.text-uppercase {
    margin-bottom: 1em;
}
.opencall-p {
    margin: 0.75em 0 0.75em 0;
    font-size: 16px;
    text-align: left;
}
.errorMsg {
    color: red;
    font-size: 16px;
    margin: 0px;
}
.form-control {
    display: block;
    width: 100%;
    padding: 12px 13px;
    font-size: 0.875rem;
    font-weight: 300;
    line-height: 1.36;
    color: #000;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(171, 171, 171, 0.5);
    appearance: none;
    border-radius: 0;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
@endsection

@section('content')

<section class="section section-md bg-transparent" style="background-image: url('http://cdn.backgroundhost.com/backgrounds/subtlepatterns/az_subtle.png')">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <h4 class="text-uppercase">OPEN CALL VIRTUAL ART EXHIBITION - JAN 2023</h4>
                <p class="opencall-p">Shooting Star Studios is an art entity based in London, UK. It aims to represent creative ideas through the diverse
                mediums of artworks. Its mission is to develop the sustainable and affordable art eco-system for the artists around the world.</p>
                <p class="opencall-p">This exhibition aims to discover and promote the experimental contemporary art, which reflects society, culture and
                environment, invokes the dialogues and discussions, nurture the innovation and technology along with diversity in
                different mediums to empower the art economy in the modern world.</p>
                <form class="" method="post" action="/opencall/apply" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-gutters-20 row-20 align-items-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Select Open call</label>
                                <select class="form-control" name="open_call_id" required>
                                    <option value="">--Select--</option>
                                    @foreach ($opencallList as $call)
                                    <option {{($opencall->id == $call->id) ? 'selected' : ''}} value="{{ $call->id }}">{{ $call->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <x-form-element
                            col="6"
                            label="Full Name"
                            type="text"
                            name="name"
                            required="required"
                        ></x-form-element>

                        <x-form-element
                            col="6"
                            label="Email"
                            type="email"
                            name="email"
                            required="required"
                        ></x-form-element>

                        <x-form-element
                            col="12"
                            label="Contact Number"
                            type="number"
                            name="phone"
                            required="required"
                        ></x-form-element>

                        <x-form-element
                            col="12"
                            label="Website Link"
                            type="text"
                            name="website"
                            required=""
                        ></x-form-element>

                        <x-form-element
                            col="12"
                            label="Instagram Handle"
                            type="text"
                            name="instagram"
                            required="required"
                        ></x-form-element>

                        <x-form-element
                            col="12"
                            label="Any Other Comment"
                            type="textarea"
                            name="comment"
                            required=""
                        ></x-form-element>

                        @if($customField)
                        @foreach ($customField as $input)
                            <x-form-element
                                col="12"
                                label="{{$input->field_label}}"
                                type="{{$input->field_type}}"
                                name="{{$input->field_name}}"
                                options="{{$input->field_multi_value}}"
                                required="{{ ($input->field_is_required === 1) ? 'required' : '' }}"
                            ></x-form-element>
                        @endforeach
                        @endif
                    </div>

                    <div class="rd-form-btn text-start">
                        <button class="btn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
