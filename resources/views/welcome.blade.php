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

        @forelse ($series as $s)

            <div class="card mb-30">
                <div class="row">
                    <div class="col-12 col-md-4 align-self-center">
                        <a href="">
                            <img src="{{ $s->image_path }}" alt="">
                        </a>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="card-block">
                            <h4 class="card-title">{{ $s->title }}</h4>
                            <p class="card-text">{{ $s->description }}</p>
                            <a href="" class="fw-600 fs-12">Read More <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        @empty

        @endforelse

      </div>


    </div>
  </section>
@endsection

