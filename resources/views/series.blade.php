@extends('layouts.app')

@section('header')
    <!-- Header -->
    <header class="header header-inverse h-fullscreen pb-80" style="background-image: url({{ $series->image_path }});" data-overlay="8">
        <div class="container text-center">

          <div class="row h-full">
            <div class="col-12 col-lg-8 offset-lg-2 align-self-center">
              <br>
              <h1 class="display-4 hidden-sm-down">{{ $series->title }}</h1>
              <h1 class="hidden-md-up">{{ $series->title }}</h1>
              <br><br>
              {{-- <p><span class="opacity-70 mr-8">By</span> <a class="text-white" href="#">Hossein Shams</a></p>
              <p><img class="rounded-circle w-40" src="assets/img/avatar/2.jpg" alt="..."></p> --}}
              <p class="lead text-white fs-20 hidden-sm-down">
                  Description Lorem ipsum dolor sit amet.
              </p>
              <br><br><br>

            @auth

                @hasStartedSeries($series)
                    <a href="{{ route('series.learning', $series->slug) }}" class="btn btn-lg btn-primary mr-16 btn-round">CONTINUE LEARNING</a>
                @else
                    <a href="{{ route('series.learning', $series->slug) }}" class="btn btn-lg btn-primary mr-16 btn-round">START LEARNING</a>
                @endhasStartedSeries
            @else

                <a href="" class="btn btn-lg btn-primary mr-16 btn-round">START LEARNING</a>

            @endauth


            </div>

            <div class="col-12 align-self-end text-center">
              <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-content"><span></span></a>
            </div>

          </div>

        </div>
      </header>
    <!-- END Header -->
@endsection

@section('content')
<section class="section">
    <div class="container">
      <header class="section-header">
        <small><strong>COURSE DESCRIPTION</strong></small>
        <h2>What's Course About</h2>
        <hr>
      </header>


      <div class="row gap-y">

        <div class="col-12 offset-md-2 col-md-8 mb-30">
            <p class="text-center">
                {{ $series->description }}
            </p>
        </div>

      </div>


    </div>
  </section>

  <section class="section bg-gray">
      <div class="container">
          <header class="section-header">
              <h2>Video Lesson</h2>
              <hr>
              <p class="lead">Sneak Peek of the lessons already available in this course</p>
          </header>
      </div>
  </section>
@endsection
