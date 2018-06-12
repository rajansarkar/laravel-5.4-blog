@extends('frontend.layouts.master')

@section('title')
	A Complete Blog - Home
@endsection

@section('page-content')
      <h3 class="my-4">{{$catTitle}} Category</h3>
      <hr><br>
      <!-- Page Features -->
      <div class="row">
        
        @foreach($catBlog as $key => $blog)
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="{{asset('blogimage/'. $blog->blogImage)}}" alt="">
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