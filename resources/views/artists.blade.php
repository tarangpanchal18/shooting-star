@extends('layouts.app')

@section('title', $pageName)
@section('class', 'artistsPage')

@section('content')
<!-- Hero Section -->
<section class="herosection container mt-0 mt-xl-3">
    <div class="row justify-content-center overflow-hidden px-3">
        <div class="col-12 col-md-10">
            <img class="image mb-4 mx-auto image" src="/site_data/images11.jpg" alt="">
            <div class="mb-3 mt-0">
                <h4 class="text-uppercase">The standard Lorem Ipsum passage, used since the 1500s</h4>
                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
        </div>
    </div>
</section>
<!-- Artists Photo List -->
<section class="pt-3 pb-5 section text-center text-xs-start artistsArt">
    <div class="container">
        <div class="row justify-content-center artistsArtList">
            <div class="col-12 col-md-10 row">

                @forelse($pageData as $artist)
                <a href="{{ route('artist.detail', $artist) }}" class="col-xs-6 col-lg-4 text-center listItem">
                    <div class="imageBlock">
                        <img src="{{asset('images/artist/cover_images/'.$artist->artist_cover_image)}}" alt="{{$artist->artist_name}}" />
                    </div>
                    <h3 class="artistsName">{{$artist->artist_name}}</h3>
                    <p style="margin:0px;" class="artistsName">{{$artist->artist_title}}</p>
                </a>
                @empty
                <div style="text-align: center;color: #839799;margin-bottom: 5em;">
                    <h4>No Data Found !</h4>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
