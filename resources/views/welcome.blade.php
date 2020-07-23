{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}

@extends('layouts.app')

@section('header')
    <!-- Header -->
    <header class="header header-inverse h-fullscreen pb-80" data-parallax="{{ asset('assets/img/bg-man.jpg') }}" data-overlay="8">
        <div class="container text-center">

          <div class="row h-full">
            <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

              <h1 class="display-4 hidden-sm-down">Believe Master Magic</h1>
              <h1 class="hidden-md-up">A place you will find visuals</h1>
              <br>
              <p class="lead text-white fs-20 hidden-sm-down"><span class="fw-400">The</span> place where we help you<br> teach you and inspire you by creating <span class="mark-border">Visuals</span>.</p>

              <br><br><br>

              <a class="btn btn-lg btn-round w-200 btn-primary mr-16" href="#" data-scrollto="section-intro">Demos</a>
              <a class="btn btn-lg btn-round w-200 btn-outline btn-white hidden-sm-down" href="#" data-scrollto="section-intro">Features</a>

            </div>

            <div class="col-12 align-self-end text-center">
              <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-intro"><span></span></a>
            </div>

          </div>

        </div>
      </header>
    <!-- END Header -->
@endsection

@section('content')
<section class="section" id="section-intro">
    <div class="container">
      <header class="section-header">
        <small>Lessons</small>
        <h2>Featured</h2>
        <hr>
        <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
      </header>


      <div class="row gap-y">


      </div>


    </div>
  </section>
@endsection

