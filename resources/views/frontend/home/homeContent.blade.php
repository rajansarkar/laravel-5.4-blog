@extends('frontend.layouts.master')

@section('title')
	A Complete Blog - Home
@endsection

@section('page-content')
<!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3">A Warm Welcome!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
      </header>

      <!-- Page Features -->
      <div class="row">
        @foreach($b as $key => $blog)
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="{{asset('public/blogimage/'. $blog->blogImage)}}" alt="">
            <div class="card-body">
              <h4 class="card-title">{{$blog->blogTitle}}</h4>
              <p class="card-text">{{substr($blog->blogDescription, 0, 100)}}</p>
            </div>
            <div class="card-footer">
              <a href="{{url('details/'.$blog->id)}}" class="btn btn-primary">Details</a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <!-- /.row -->

@endsection      