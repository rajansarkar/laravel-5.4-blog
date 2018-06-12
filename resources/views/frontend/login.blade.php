@extends('frontend.layouts.master')

@section('title')
  User Login
@endsection

@section('page-content')
<div class="row ">
  <div class="col-sm-6 mr-auto ml-auto pb-5 pt-5">
    <h3>Log in</h3>
    <hr>
    @if(Session::get('error'))
    <div class="alert alert-danger">
      {{Session::get('error')}}
    </div>
    @endif
    @if(count($errors))
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
      </ul>
    </div>
    @endif

  <form action="{{url('/user-login')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
        <label for="Email" class="col-form-label">Your Email:</label>
        <input type="email" name="email" class="form-control" id="Email" value="{{ old('email') }}">
      </div>
      <div class="form-group">
        <label for="Password" class="col-form-label">Your Login Password:</label>
        <input type="password" name="password" class="form-control" id="Password">
      </div>
      <button type="submit" class="btn float-right btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> Login Now</button>
  </form>
  </div>
</div>

@endsection              