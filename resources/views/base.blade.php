<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/components/base/base.css">
    <link rel="stylesheet" href="/components/base/custom.css">
    <script src="/components/base/core.min.js"></script>
    <script src="/components/base/script.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="/components/base/custom.js"></script>
</head>

<body>
    <div class="page indexpage">

        @include('frontend.header')

        <!-- Banner -->
        <section class="hero_slider">
            <div class="exhibutionImages">
                <div class="slide-content">
                    <div class="exhibution_Image" style="background-image: url(/images/images8.jpg);"></div>
                </div>
                <div class="slide-content">
                    <div class="exhibution_Image" style="background-image: url(/images/images7.jpg);"></div>
                </div>
                <div class="slide-content">
                    <div class="exhibution_Image" style="background-image: url(/images/images10.jpg);"></div>
                </div>
                <div class="slide-content">
                    <div class="exhibution_Image" style="background-image: url(/images/images11.jpg);"></div>
                </div>
            </div>
        </section>

        <!-- Art Section -->
        <section class="artSection mt-5 section text-center text-md-start">
            <div class="container">
                <div class="row justify-content-center mb-3">
                    <div class="col-12 col-md-10 m-0 p-4">
                        <img class="image mb-4" src="/images/images24.jpg" alt="">
                        <a href="javascript:void(0)">
                            <h4 class="text-uppercase">Full-day or half-day photo shoots with all</h4>
                        </a>
                        <h6 class="subtitle mt-1">Voyager</h6>
                        <h6 class="date mt-0">15 Dec 2022 - 29 Jan 2023</h6>
                        <p class="description">You are able to choose the time that we will spend on photo shoot. If you
                            want full-day. You are able to choose the time that we will spend on photo shoot. If you
                            want full-day. You are able to choose the time that we will spend on photo shoot. If you
                            want full-day. You are able to choose the time that we will spend on photo shoot. If you
                            want full-day.</p>
                    </div>
                </div>
                <hr>
            </div>
        </section>

        <!-- Art Section -->
        <section class="artSection mt-5 section text-center text-md-start">
            <div class="container">
                <div class="row justify-content-center mb-3">
                    <div class="col-12 col-md-10 m-0 p-4">
                        <img class="image mb-4 mx-auto" src="/images/images25.jpg" alt="">
                        <a href="javascript:void(0)">
                            <h4 class="text-uppercase">Full-day or half-day photo shoots with all</h4>
                        </a>
                        <h6 class="subtitle mt-1">Voyager</h6>
                        <h6 class="date mt-0">15 Dec 2022 - 29 Jan 2023</h6>
                        <p class="description">You are able to choose the time that we will spend on photo shoot. If you
                            want full-day. You are able to choose the time that we will spend on photo shoot. If you
                            want full-day. You are able to choose the time that we will spend on photo shoot. If you
                            want full-day. You are able to choose the time that we will spend on photo shoot. If you
                            want full-day.</p>
                    </div>
                </div>
                <hr>
            </div>
        </section>

        <!-- Artists List -->
        <section class="bg-transparent my-5 section text-center text-xs-start">
            <div class="container">
                <h4 class="text-uppercase text-center">Artists</h4>
                <div class="row justify-content-center">
                    <div class="col-xs-4 mb-3 text-center">
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                    </div>
                    <div class="col-xs-4 col-lg-4 mb-3 text-center">
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                    </div>
                    <div class="col-xs-4 col-lg-4 mb-3 text-center">
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                        <h6 class="text-uppercase">
                            <a href="javascript:void(0)">Artists Name</a>
                        </h6>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('frontend.preloader')

    </body>

</body>
</html>
