@extends('layouts.app')

@section('header')

<header class="header header-inverse" style="background-color: #c2b2cd;">
    <div class="container text-center">

      <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">

          <h1>Edit: {{ $series->name }}</h1>
          <p class="fs-20 opacity-70">Add Title And Details Of The Series With Nice Cathcy Image.</p>

        </div>
      </div>

    </div>
  </header>

@endsection

@section('content')

<div class="section">
    <div class="container">

      <div class="row gap-y">
        <div class="col-12">

          <form action="{{ route('series.update', $series->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" value="{{ $series->title }}" name="title" placeholder="Your Series Title">
            </div>

            <div class="form-group">
              <input class="form-control form-control-lg" type="file" name="image">
            </div>

            <div class="form-group">
              <textarea class="form-control form-control-lg" name="description" rows="4" placeholder="Series Description">{{ $series->description }}</textarea>
            </div>


            <button class="btn btn-lg btn-primary btn-block" type="submit">Update Series</button>
          </form>

        </div>

      </div>


    </div>
  </div>

@endsection
