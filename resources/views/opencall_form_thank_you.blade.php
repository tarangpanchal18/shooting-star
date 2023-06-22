@extends('layouts.app')

@section('title', 'Thank You')
@section('class', 'openCallPage')

@section('content')
<section class="section section-md bg-transparent text-center">
    <div class="container">
        <div class="row row-40">
            <div class="col-xs-12 col-xl-12">
                <img src="{{ asset('site_data/thank_you.jpg') }}" widh="100%" alt="Thank you" height="368">
            </div>
        </div>
        <div class="text-block text-block-1 text-center">
            <p>We extend our heartfelt gratitude for your participation in our art submission. Your artistic talent and dedication
            shine through in the artwork you submitted. We are thrilled to have your contribution as part of our collection.</p>

            <p>Your artwork has left a lasting impression on us, and we genuinely appreciate the time and effort you put into creating
            such a remarkable piece. It is artists like you who inspire us and make our platform truly special.</p>

            <p>We want to assure you that your submission is valuable to us, and we will be reaching out to you soon using the contact
            details provided. We look forward to discussing your artwork further and exploring potential opportunities for
            collaboration.</p>

            <p><strong>Once again, thank you for sharing your incredible talent with us. Stay tuned for further communication from our team.</strong></p>
        </div>
    </div>
</section>
@endsection
