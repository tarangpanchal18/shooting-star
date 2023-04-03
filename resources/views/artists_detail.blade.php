@extends('layouts.app')

@section('title', $pageName)
@section('class', 'artistsDetailsPage')

@section('content')
    <section class="section section-md bg-transparent pt-4" style="margin-top:2em;">
        <div class="container">
          <div class="row row-50 justify-content-center">
            <div class="row col-12 col-md-10 justify-content-center">
              <div class="col-md-10 col-lg-8">
                <div class="blog-post">
                  <div class="blog-post-item">
                    <h1>{{$pageData->artist_name}}</h1>
                    <p>{{$pageData->artist_title}}</p>
                    <p style="margin:2px 0 2em 0;">{{$pageData->artist_location}}</p>
                    <div>
                        {!! $pageData->artist_description !!}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-10 col-lg-4">

                @if($pageData->artist_cover_image)
                <div class="widget">
                  <img class="image mb-4" src="{{asset('images/artist/cover_images/'.$pageData->artist_cover_image)}}" alt="{{$artist->artist_name}}" />
                </div>
                @endif

                @if($pageData->artist_video_url)
                <div class="widget">
                    <video width="100%" height="240" controls>
                        <source src="{{$pageData->artist_video_url}}" type="video/mp4">
                        <source src="{{$pageData->artist_video_url}}" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
    </section>
    <section class="works text-center text-md-start mt-5">
        <div class="container">
          <h6 class="text-uppercase fs-4 text-center title_style mb-4">Available works</h6>
          <div class="row justify-content-center mt-3">
            <div class="row col-12 col-md-10 mt-3">

                @forelse($pageData->images as $artistWork)
                <div class="col-12 col-md-4 mb-4 card animated fadeIn" data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                <a class="card-title">
                    <img src="{{asset('images/artist/'.$pageData->id.'/'.$artistWork->filename)}}" class="card-img-top" alt="{{$pageData->artist_name}} Artwork">
                </a>
                <div class="card-body py-2 px-2">
                    <a class="card-title" href="{{route('admin.shop.index')}}">
                    <b>By {{$artistWork->artist->artist_name}}</b>
                    </a>
                    {{-- <p class="subtitle">Rosemary Cullum: The Dark Side</p>
                    <p class="date">Oil on canvas <br> 90cm x 105cm </p> --}}
                </div>
                </div>
                @empty
                <div style="text-align: center;color: #839799;margin-bottom: 5em;">
                    <h4>No Work available !</h4>
                </div>
                @endforelse

            </div>
          </div>
        </div>
    </section>
@endsection
