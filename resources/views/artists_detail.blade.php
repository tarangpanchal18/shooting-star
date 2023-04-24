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
                    <div class="artist-content">
                        {!! $pageData->artist_description !!}
                    </div>
                    <div class="artist-redirect" style="margin-top:2em;">
                        <a href="{{ route('shop') }}?artist={{$pageData->id}}" style="margin: 0px;cursor: pointer;" class="btn btn-sm btn-default">View Artist Work in shop</a>
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
                        <source src="https://drive.google.com/uc?export=download&id={{$pageData->artist_video_url}}" type='video/mp4'>
                    </video>
                </div>
                @endif

                @if($pageData->artist_cover_image_2)
                <div class="widget">
                    <img class="image mb-4" src="{{asset('images/artist/cover_images/'.$pageData->artist_cover_image_2)}}"
                        alt="{{$artist->artist_name}}" />
                </div>
                @endif

                @if($pageData->artist_cover_image_3)
                <div class="widget">
                    <img class="image mb-4" src="{{asset('images/artist/cover_images/'.$pageData->artist_cover_image_3)}}"
                        alt="{{$artist->artist_name}}" />
                </div>
                @endif

              </div>
            </div>
          </div>
        </div>
    </section>
    {{-- <section class="works text-center text-md-start mt-5">
        <div class="container">
          <h6 class="text-uppercase fs-4 text-center title_style mb-4">Available works</h6>
          <div class="row justify-content-center mt-3">
            <div class="row col-12 col-md-10 mt-3">

                @forelse($pageData->shop as $artistWork)
                <div class="col-12 col-md-4 mb-4 card animated fadeIn" data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title">
                        <img src="{{asset('images/shop_item/'.$artistWork->item_filename)}}" class="card-img-top" alt="{{$pageData->artist_name}} Artwork">
                    </a>
                    <div class="card-body py-2 px-2">
                        <a class="card-title" href="{{route('shop')}}?artist={{$pageData->id}}">
                        <b>{{$artistWork->item_title}}</b>
                        </a>
                        <p class="date">Item Price : £ {{number_format($artistWork->item_price, 2) }} </p>
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
    </section> --}}
@endsection
