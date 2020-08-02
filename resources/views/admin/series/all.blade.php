@extends('layouts.app')

@section('header')

<header class="header header-inverse" style="background-color: #c2b2cd;">
    <div class="container text-center">

      <div class="row">
        <div class="col-12 col-lg-8 offset-lg-2">

          <h1>All Series</h1>
          <p class="fs-20 opacity-70">All Available Series</p>

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

          <table class="table">
            <thead>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <tr>
                    @forelse ($series as $s)
                        <tr>
                            <td>{{ $s->title }}</td>
                            <td>
                                <a href="{{ route('series.edit', $s->slug) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">No Series Yet</p>
                    @endforelse
                </tr>
            </tbody>
          </table>

        </div>

      </div>


    </div>
  </div>

@endsection
