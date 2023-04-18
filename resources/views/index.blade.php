@extends('layouts.app')

@section('title', $pageName)
@section('class', 'indexpage')

@section('internalcss')
.electricblaze-yxyKslpMBkjKVPcsWvD4 {
    display: none!important;
}
@endsection

@section('content')
    <section class="hero_slider">
        <div class="exhibutionImages">
            <div class="slide-content">
                <div class="exhibution_Image" style="background-image: url('{{asset('/site_data/images8.jpg')}}');"></div>
            </div>
            <div class="slide-content">
                <div class="exhibution_Image" style="background-image: url('{{asset('/site_data/images7.jpg')}}');"></div>
            </div>
            <div class="slide-content">
                <div class="exhibution_Image" style="background-image: url('{{asset('/site_data/images10.jpg')}}');"></div>
            </div>
            <div class="slide-content">
                <div class="exhibution_Image" style="background-image: url('{{asset('/site_data/images11.jpg')}}');"></div>
            </div>
        </div>
    </section>
    <!-- Art Section -->
    <section class="artSection mt-5 section text-center text-md-start">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-12 col-md-10 m-0 p-4">
                    <a href="javascript:void(0)">
                        <h4 class="text-uppercase">Shooting Star</h4>
                    </a>
                    <p class="description">You are able to choose the time that we will spend on photo shoot. If you want
                        full-day. You are able to choose the time that we will spend on photo shoot. If you want full-day.
                        You are able to choose the time that we will spend on photo shoot. If you want full-day. You are
                        able to choose the time that we will spend on photo shoot. If you want full-day.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Art Section -->
    <section class="artSection mt-5 section text-center text-md-start">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-12 col-md-10 m-0 p-4">
                    {!! $pageData->description !!}
                </div>
            </div>
        </div>
    </section>

    <!-- Artists List
    <section class="bg-transparent my-5 section text-center text-xs-start">
        <div class="container">
            <h4 class="text-uppercase text-center">Artists</h4>
            <div class="row justify-content-center">
                <div class="col-md-12 mb-3 text-center row">
                    @forelse ($artistData as $item)
                    <h6 class="col-md-4 text-uppercase">
                        <a href="{{route('artist')}}">{{ $item->artist_name }}</a>
                    </h6>
                    @empty
                    <h6 class="col-md-12 text-uppercase" style="text-align: center">
                        <a href="javascript:void(0)">No Artist Data Available At moment !</a>
                    </h6>
                    @endforelse
                </div>
            </div>
            <hr>
        </div>
    </section>-->

    <!-- Instagram Section -->
    <section class="bg-transparent my-5 section text-center text-xs-start">
        <div class="container">
            <h4 class="text-uppercase text-center">Instagram</h4>
            <div class="row justify-content-center">
                <div class="col-md-12 mb-3 text-center row">
                    <script src="https://s.electricblaze.com/widget.js" defer></script>
                    <div class="electricblaze-id-2Uhx8cJ"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
