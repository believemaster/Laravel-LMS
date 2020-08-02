<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Believe Master') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/core.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/thesaas.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <!-- Topbar -->
        <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
            <div class="container">

            <div class="topbar-left">
                <button class="topbar-toggler">&#9776;</button>
                <a class="topbar-brand" href="#">
                <img class="logo-default" src="{{ asset('assets/img/logo.png') }}" alt="logo">
                <img class="logo-inverse" src="{{ asset('assets/img/logo-light.png') }}" alt="logo">
                </a>
            </div>


            <div class="topbar-right">
                <ul class="topbar-nav nav">
                <li class="nav-item"><a class="nav-link" href="">Home</a></li>
                @if (auth()->check())
                    Howdy! {{  auth()->user()->name }}
                @else
                <li class="nav-item"><a class="nav-link" href="javascript:;" data-toggle="modal" data-target="#loginModal">Login</a></li>
                @endif
                </ul>
            </div>
        </nav>

        <!-- Header -->
        @yield('header')
        <!-- Header -->

        <main class="main-content">
            @yield('content')
        </main>

        <vue-noty></vue-noty>

        @if (!auth()->check())
        <vue-login></vue-login>
        @endif

         <!-- Footer -->
        <footer class="site-footer">
            <div class="container">
            <div class="row gap-y align-items-center">
                <div class="col-12 col-lg-3">
                <p class="text-center text-lg-left">
                    <a href="index.html"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a>
                </p>
                </div>

                <div class="col-12 col-lg-6">
                <ul class="nav nav-primary nav-hero">
                    <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="block-feature.html">Features</a>
                    </li>
                    <li class="nav-item hidden-sm-down">
                    <a class="nav-link" href="page-pricing.html">Pricing</a>
                    </li>
                    <li class="nav-item hidden-sm-down">
                    <a class="nav-link" href="page-contact.html">Contact</a>
                    </li>
                </ul>
                </div>

                <div class="col-12 col-lg-3">
                <div class="social text-center text-lg-right">
                    <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
                    <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
                    <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
                    <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
                </div>
                </div>
            </div>
            </div>
        </footer>
        <!-- END Footer -->

    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/thesaas.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
