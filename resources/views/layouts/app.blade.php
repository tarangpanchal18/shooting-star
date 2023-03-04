<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shooting Star | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="Template Monster Admin Template">
    <meta property="og:description" content="">
    <link rel="icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('components/base/base.css')}}">
    <link rel="stylesheet" href="{{asset('components/base/custom.css')}}">
    <script src="{{asset('components/base/core.min.js')}}"></script>
    <script src="{{asset('components/base/script.js')}}"></script>
</head>

<body>
    <div class="page @yield('class')">
        <!-- Navbar -->
        <header class="section rd-navbar-wrap"
            data-preset='{"title":"Navbar Default","category":"header","reload":true,"id":"navbar-default"}'>
            <nav class="rd-navbar navbar-centered" data-rd-navbar='{"responsive":{"1200":{"stickUpOffset":"200px"}}}'>
                <div class="navbar-section navbar-non-stuck py-4 nav_1">
                    <div class="navbar-container">
                        <div class="navbar-cell">
                            <div class="navbar-panel">
                                <button class="navbar-switch mdi-menu novi-icon"
                                    data-multi-switch='{"targets":".rd-navbar","scope":".rd-navbar","isolate":"[data-multi-switch]"}'></button>
                                <div class="navbar-logo">
                                    <a class="navbar-logo-link" href="{{ route('home') }}">
                                        <img class="navbar-logo-default" src="/images/Logo_Blue.png" alt="Pixel"
                                            width="161" height="63" />
                                        <img class="navbar-logo-inverse" src="/images/logo-inverse-322x127.png"
                                            alt="Pixel" width="161" height="63" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-section nav_2">
                    <div class="navbar-logo">
                        <a class="navbar-logo-link" href="{{ route('home') }}">
                            <img class="navbar-logo-default" src="/images/Logo_Blue.png" alt="Pixel" width="161"
                                height="63" />
                            <img class="navbar-logo-inverse" src="/images/logo-inverse-322x127.png" alt="Pixel"
                                width="161" height="63" />
                        </a>
                    </div>
                    <div class="navbar-container">
                        <div class="navbar-cell navbar-sidebar">
                            <ul class="navbar-navigation rd-navbar-nav">
                                <li class="navbar-navigation-root-item">
                                    <a class="navbar-navigation-root-link" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="navbar-navigation-root-item">
                                    <a class="navbar-navigation-root-link" href="{{ route('about') }}">About</a>
                                </li>
                                <li class="navbar-navigation-root-item">
                                    <a class="navbar-navigation-root-link" href="{{ route('artist') }}">Artists</a>
                                </li>
                                <li class="navbar-navigation-root-item">
                                    <a class="navbar-navigation-root-link" href="{{ route('exhibition') }}">Exhibition</a>
                                </li>
                                <li class="navbar-navigation-root-item">
                                    <a class="navbar-navigation-root-link" href="{{ route('shop') }}">Shop</a>
                                </li>
                                <li class="navbar-navigation-root-item">
                                    <a class="navbar-navigation-root-link" href="{{ route('opencall') }}">Open Call</a>
                                </li>
                                <li class="navbar-navigation-root-item">
                                    <a class="navbar-navigation-root-link" href="{{ route('contact') }}">Contacts</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')

        <!-- Footer default-->
        <footer class="footer">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5 col-xs-12 about-company">
                        <div class="logo">
                            <a class="logo-link" href="{{ route('home') }}">
                                <img class="logo-image-default" src="/images/Logo_White.png" alt="Pixel" width="100"
                                    height="auto">
                            </a>
                        </div>
                        <p class="pr-5 text-white-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac
                            ante mollis quam tristique convallis </p>
                        <p>
                            <a href="#">
                                <i class="fa fa-facebook-square mr-1"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-linkedin-square"></i>
                            </a>
                        </p>
                    </div>
                    <div class="col-lg-6 col-xs-12 links">
                        <form class="rd-form rd-form-inline rd-mailform" data-form-output="newsletter-sample"
                            data-form-type="subscribe" method="post" action="/components/rd-mailform/rd-mailform.php">
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="E-mail">
                            </div>
                            <button class="btn" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col copyright">
                        <p class="pt-3">
                            <small class="text-white-50">© <?=date('Y')?>. All Rights Reserved.</small>
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- Preloader-->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
            <div class="preloader-item"></div>
        </div>
    </div>
</body>

</html>
