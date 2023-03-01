@extends('layouts.app')

@section('title', $pageName)
@section('class', 'indexpage')

@section('content')
<section class="section bg-transparent text-center pt-4" style="margin: 15px 0">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="text-block text-center col-12 col-md-10 px-4">
                <h4 class="text-uppercase">A few words about Me</h4>
                <p>Et lacinia nisi tortor ultricies mollis gravida interdum vitae aenean. Nam faucibus nullam
                    sit egestas. Sem enim ut imperdiet sollicitudin nisl neque. Auctor ultricies at purus nunc
                    enim. Molestie porta amet posuere elementum eu nulla sapien, et. Lorem Ipsum is simply dummy
                    text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                    dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled
                    it to make a type specimen book.</p>
                <img class="image" src="images/images30.jpg">
            </div>
        </div>
    </div>
</section>
@endsection
