@extends('layouts.app')

@section('title', $pageName)
@section('class', 'artistsDetailsPage')

@section('content')
    <section class="section section-md bg-transparent pt-4">
        <div class="container">
          <div class="row row-50 justify-content-center">
            <div class="row col-12 col-md-10 justify-content-center">
              <div class="col-md-10 col-lg-8">
                <div class="blog-post">
                  <div class="blog-post-item">
                    <h1>{{$pageData->artist_name}}</h1>
                    <p>{{$pageData->artist_title}}</p>
                    <p>{{$pageData->artist_location}}</p>
                    <div>
                        {!! $pageData->artist_description !!}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-10 col-lg-4">
                <div class="widget">
                  <img class="image mb-4" src="{{asset('images/artist/cover_images/'.$artist->artist_cover_image)}}" alt="{{$artist->artist_name}}" />
                </div>
                <div class="widget">
                  <img class="image mb-4" src="/images/images12.jpg" alt="">
                </div>
                <div class="widget">
                  <img class="image mb-4" src="/images/images22.jpg" alt="">
                </div>
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
              <div class="col-12 col-md-4 mb-4 card animated fadeIn" data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                <a class="card-title" href="#">
                  <img src="images/images19.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body py-2 px-2">
                  <a class="card-title" href="#">
                    <b>The Dark Side</b>
                  </a>
                  <p class="subtitle">Rosemary Cullum: The Dark Side</p>
                  <p class="date">Oil on canvas <br> 90cm x 105cm </p>
                </div>
              </div>
              <div class="col-12 col-md-4 mb-4 card animated fadeIn" data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                <a class="card-title" href="#">
                  <img src="images/images20.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body py-2 px-2">
                  <a class="card-title" href="#">
                    <b>Life Force</b>
                  </a>
                  <p class="subtitle">Rosemary Cullum: Life Force</p>
                  <p class="date">Oil on canvas <br> 42 x 58 cm </p>
                </div>
              </div>
              <div class="col-12 col-md-4 mb-4 card animated fadeIn" data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                <a class="card-title" href="#">
                  <img src="images/images21.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body py-2 px-2">
                  <a class="card-title" href="#">
                    <b>The Journey</b>
                  </a>
                  <p class="subtitle">Rosemary Cullum: The Journey</p>
                  <p class="date">Oil on canvas <br> 180cm x 120cm </p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
