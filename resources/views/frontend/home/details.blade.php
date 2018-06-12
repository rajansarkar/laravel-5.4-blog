@extends('frontend.layouts.master')

@section('title')
	{{$dblog->blogTitle}} - Rajan Blog
@endsection

@section('page-content')
<div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">{{$dblog->blogTitle}}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <a href="#">{{$dblog->authorName}}</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on {{date('M j, Y h:i A', strtotime($dblog->created_at))}} | Category : {{catNameById($dblog->categoryId)}} | Read Time : {{postReadTime($dblog->blogDescription)}}</p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="{{asset('public/blogimage/'. $dblog->blogImage)}}" alt="">

          <hr>

          <!-- Post Content -->

          <p class="lead">{{$dblog->blogDescription}}</p>

          <!-- Comments Form -->
          @if(Session::get('uid'))
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              @if(Session::get('success'))
              <div class="alert alert-success">
                <p>{{Session::get('success')}}</p>
              </div>
              @endif
              <form action="{{url('savecomment')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="{{Session::get('uid')}}" name="userId">
                <input type="hidden" value="{{$dblog->id}}" name="blogId">
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="userComment"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          @else
          <div class="pt-5 pb-5">
            <a href="{{url('login-user')}}" class="btn btn-success btn-block">Login After comment the Post</a>
          </div>
            
            @endif
          <!-- Single Comment -->
          @foreach ($c as $l)
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="{{asset('public/userimage/'.$l->userImage)}}" width="50" alt="">
            <div class="media-body">
              <h5 class="mt-0">{{$l->name}}</h5>
              {{$l->userComment}}
            </div>
          </div>
          @endforeach

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                	<?php
					$cAll = getCategory();
                	 ?>
                
                  <ul class="list-unstyled mb-0">
                  	@foreach( $cAll as $c)
                    <li class="d-inline">
                      <a href="{{url('categoryPost/'. $c->id)}}">{{$c->categoryName}}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->
<!-- Related Projects Row -->
      <h3 class="my-4">Related Post</h3>
      <hr>

      <div class="row">
      	<?php 
      		$r = relatedPostByCat($dblog->categoryId, $dblog->id);
      	?>
      	@foreach($r as $rl)
        <div class="col-md-3 col-sm-6 mb-4">
			<div class="card">
			<a href="{{url('details/'.$rl->id)}}">
	            <img class="img-fluid card-img-top" src="{{asset('public/blogimage/'.$rl->blogImage)}}" alt="">
	        </a>
            <div class="card-body">
              <h4 class="card-title">{{$rl->blogTitle}}</h4>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <!-- /.row -->
@endsection        