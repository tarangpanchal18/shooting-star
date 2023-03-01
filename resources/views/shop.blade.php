@extends('layouts.app')

@section('title', $pageName)
@section('class', 'artistsDetailsPage')

@section('content')
<section class="bg-transparent section text-center">
    <div class="container">
        <div class="justify-content-center row">
            <div class="col-md-10 col-lg-8">
                <div class="row row-30">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <select class="form-control form-control-last-child" name="cars">
                                    <option value="">- Browse by Artist -</option>
                                    <option value="saab">Saab</option>
                                    <option value="mercedes">Mercedes</option>
                                    <option value="audi">Audi</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input class="form-control form-control-last-child" type="text" name="Search"
                                    placeholder="Search in shop">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="works text-center text-md-start mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="row col-12 col-md-10">
                <div class="col-12 col-md-4 mb-4 card animated fadeIn"
                    data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title" href="#">
                        <img src="images/images19.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body py-2 px-2">
                        <a class="card-title" href="#">
                            <b>The Dark Side</b>
                        </a>
                        <p class="subtitle">Rosemary Cullum: The Dark Side</p>
                        <p class="date">£100.00</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 card animated fadeIn"
                    data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title" href="#">
                        <img src="images/images20.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body py-2 px-2">
                        <a class="card-title" href="#">
                            <b>Life Force</b>
                        </a>
                        <p class="subtitle">Rosemary Cullum: Life Force</p>
                        <p class="date">£150.00</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 card animated fadeIn"
                    data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title" href="#">
                        <img src="images/images21.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body py-2 px-2">
                        <a class="card-title" href="#">
                            <b>The Journey</b>
                        </a>
                        <p class="subtitle">Rosemary Cullum: The Journey</p>
                        <p class="date">£200.00</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 card animated fadeIn"
                    data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title" href="#">
                        <img src="images/images19.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body py-2 px-2">
                        <a class="card-title" href="#">
                            <b>The Dark Side</b>
                        </a>
                        <p class="subtitle">Rosemary Cullum: The Dark Side</p>
                        <p class="date">£100.00</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 card animated fadeIn"
                    data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title" href="#">
                        <img src="images/images20.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body py-2 px-2">
                        <a class="card-title" href="#">
                            <b>Life Force</b>
                        </a>
                        <p class="subtitle">Rosemary Cullum: Life Force</p>
                        <p class="date">£150.00</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4 card animated fadeIn"
                    data-animate="{&quot;class&quot;:&quot;fadeIn&quot;}">
                    <a class="card-title" href="#">
                        <img src="images/images21.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body py-2 px-2">
                        <a class="card-title" href="#">
                            <b>The Journey</b>
                        </a>
                        <p class="subtitle">Rosemary Cullum: The Journey</p>
                        <p class="date">£200.00</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
