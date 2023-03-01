@extends('layouts.app')

@section('title', $pageName)
@section('class', 'artistsPage')

@section('content')
<!-- Hero Section -->
<section class="herosection container mt-0 mt-xl-3">
    <div class="row justify-content-center overflow-hidden px-3">
        <div class="col-12 col-md-10">
            <img class="image mb-4 mx-auto image" src="images/images11.jpg" alt="">
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
                <a href="artists-details.html" class="col-xs-6 col-lg-4 text-center listItem">
                    <div class="imageBlock">
                        <img src="./images/images14.jpg" />
                    </div>
                    <h3 class="artistsName">Karel Appel</h3>
                </a>
                <a href="artists-details.html" class="col-xs-6 col-lg-4 text-center listItem">
                    <div class="imageBlock">
                        <img src="./images/images14.jpg" />
                    </div>
                    <h3 class="artistsName">Karel Appel</h3>
                </a>
                <a href="artists-details.html" class="col-xs-6 col-lg-4 text-center listItem">
                    <div class="imageBlock">
                        <img src="./images/images14.jpg" />
                    </div>
                    <h3 class="artistsName">Karel Appel</h3>
                </a>
                <a href="artists-details.html" class="col-xs-6 col-lg-4 text-center listItem">
                    <div class="imageBlock">
                        <img src="./images/images14.jpg" />
                    </div>
                    <h3 class="artistsName">Karel Appel</h3>
                </a>
                <a href="artists-details.html" class="col-xs-6 col-lg-4 text-center listItem">
                    <div class="imageBlock">
                        <img src="./images/images14.jpg" />
                    </div>
                    <h3 class="artistsName">Karel Appel</h3>
                </a>
                <a href="artists-details.html" class="col-xs-6 col-lg-4 text-center listItem">
                    <div class="imageBlock">
                        <img src="./images/images14.jpg" />
                    </div>
                    <h3 class="artistsName">Karel Appel</h3>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
