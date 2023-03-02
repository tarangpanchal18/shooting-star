@extends('layouts.app')

@section('title', $pageName)
@section('class', 'exhibitionPage')

@section('content')
<!-- Art Section -->
<section class="artSection currentexhibition text-center text-md-start mt-5">
    <div class="container">
        <h6 class="text-uppercase fs-4 text-center title_style">Current</h6>
        <div class="row justify-content-center mt-3 mb-3">
            <div class="col-12 col-md-10 m-0">
                <img class="image mb-4 mx-auto" src="images/Images2.jpg" alt="">
                <div class="px-3">
                    <a href="exhibution-overview.html">
                        <h4 class="text-uppercase">Full-day or half-day photo shoots with all</h4>
                    </a>
                    <div class="subtitle">Voyager</div>
                    <div class="date">15 Dec 2022 - 29 Jan 2023</div>
                    <p class="description mt-2 fs-6">You are able to choose the time that we will spend on photo
                        shoot. If you want full-day, you will get all the possibilities and services to feel
                        convenient during the process. </p>
                    <a class="btn btn-outline mt-3 p-3" href="exhibution-overview.html">
                        <span>Read More</span>
                        <span class="btn-icon mdi-arrow-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Past Exhibition -->
<section class="pastexhibition text-center text-md-start">
    <div class="container">
        <h6 class="text-uppercase fs-4 text-center title_style">Past</h6>
        <div class="row justify-content-center mt-3">
            <div class="row col-12 col-md-10 mt-3">

                @forelse($pageData as $exhibition)
                <div class="col-12 col-md-4 mb-4 card animated fadeIn"
                    data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title" href="exhibution-overview.html">
                        <img class="card-img-top" src="{{asset('images/exhibition/'.$exhibition->id.'/'.$exhibition->images[0]->filename)}}" alt="{{$exhibition->title}}" />
                    </a>
                    <div class="card-body">
                        <a class="card-title" href="exhibution-overview.html">
                            <b>{{$exhibition->title}}</b>
                        </a>
                        <p class="subtitle">{{$exhibition->short_description}}</p>
                        <p class="date">{{date('d', strtotime($exhibition->start_date))}} - {{date('d-M', strtotime($exhibition->end_date))}}</p>
                    </div>
                </div>
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
