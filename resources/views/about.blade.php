@extends('layouts.app')

@section('title', $pageName)
@section('class', 'indexpage')

@section('content')
<section class="section bg-transparent text-center pt-4" style="margin: 15px 0">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="text-block text-center col-12 col-md-10 px-4">
                <h4 class="text-uppercase">About Us</h4>

                <hr>

                <div class="page-content">
                    {!! $pageData['description'] !!}
                </div>

                {{-- <img class="image" src="images/images30.jpg"> --}}
            </div>
        </div>
    </div>
</section>
@endsection
