@extends('layouts.app')

@section('title', $pageName)
@section('class', 'exhibitionPage')

@section('content')
<!-- Art Section -->
<section class="artSection currentexhibition text-center text-md-start mt-5">
    <div class="container">
        <h6 class="text-uppercase fs-4 text-center title_style">Current</h6>
        @if($activeExhibition)
        <div class="row justify-content-center mt-3 mb-3">
            <div class="col-12 col-md-10 m-0">
                <img class="image mb-4 mx-auto" src="{{asset('images/exhibition/cover_images/'.$activeExhibition->cover_image)}}" alt="{{$activeExhibition->title}}">
                <div class="px-3">
                    <a href="exhibution-overview.html">
                        <h4 class="text-uppercase">{{$activeExhibition->title}}</h4>
                    </a>
                    <div class="subtitle">{{$activeExhibition->category->name}}</div>
                    <div class="date">{{date('d M Y', strtotime($activeExhibition->start_date))}} - {{date('d M Y', strtotime($activeExhibition->end_date))}}</div>
                    <p class="description mt-2 fs-6">{{$activeExhibition->short_description}}</p>
                    <a class="btn btn-outline mt-3 p-3" href="exhibution-overview.html">
                        <span>View More</span>
                        <span class="btn-icon mdi-arrow-right"></span>
                    </a>
                </div>
            </div>
        </div>
        @else
        <div style="text-align: center;color: #839799;margin: 5em 0;">
            <h6>No Exhibition Currently in progress</h6>
        </div>
        @endif
    </div>
</section>
<!-- Past Exhibition -->
<section class="pastexhibition text-center text-md-start">
    <div class="container">
        <h6 class="text-uppercase fs-4 text-center title_style">Future & Past</h6>
        <div class="row justify-content-center mt-3">
            <div class="row col-12 col-md-10 mt-3">

                @forelse($pageData as $exhibition)
                <div class="col-12 col-md-4 mb-4 card animated fadeIn"
                    data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title" href="exhibution-overview.html">
                        <img style="{{($exhibition->isExpired ? 'opacity:0.2' : '')}}" class="card-img-top" src="{{asset('images/exhibition/'.$exhibition->id.'/'.$exhibition->images[0]->filename)}}" alt="{{$exhibition->title}}" />
                    </a>
                    <div class="card-body">
                        <a class="card-title" href="exhibution-overview.html">
                            <b>{{$exhibition->title}}</b>
                        </a>
                        <p class="subtitle">{{$exhibition->short_description}}</p>
                        <p class="date">{{date('d M', strtotime($exhibition->start_date))}} - {{date('d-M', strtotime($exhibition->end_date))}}</p>
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
