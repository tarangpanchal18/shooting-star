@extends('layouts.app')

@section('title', $pageName)
@section('class', 'contactPage')

@section('content')
<!-- Left Section -->
<section class="leftImageSection my-5 text-center text-md-start">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="row col-12 col-md-10">
                <div class="col-lg-4 col-md-6 col-sm-12 m-0 mt-4 mt-md-0 p-0 contactDetails">
                    <div class="simple-text-block bg-light-grey">

                        {!! $pageData->description !!}
                        {{-- <div class="siteLogo">
                            <img class="navbar-logo-default" src="/site_data/logo-default-322x127.png" alt="Pixel"
                                width="100" height="100%">
                        </div>
                        <p>
                            <strong>Modern &amp; Post-War Art</strong>
                        </p>
                        <p>36 avenue Matignon 75008 Paris <br> 01 42 89 42 29 <br>
                            <a href="mailto:test@demo.com">test@demo.com</a>
                        </p>
                        <p>
                            <strong>Opening hours:</strong>
                        </p>
                        <p>Tuesday-Saturday: 11am – 7pm <br> Monday: by appointment </p>
                        <hr size="1">
                        <p>Alexandre Fleury <br>
                            <a href="mailto:test@demo.com">test@demo.com</a>
                        </p> --}}
                        <hr size="1">
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 mb-4 mb-md-0 mt-3 mt-md-0 googleMap">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19569608.75084759!2d-22.22771925890605!3d53.22021049841882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x25a3b1142c791a9%3A0xc4f8a0433288257a!2sUnited%20Kingdom!5e0!3m2!1sen!2sin!4v1677781893845!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
