@extends('frontend.layouts.master')

@section('title')
  User Registration
@endsection

@section('page-content')
<div class="row ">
  <div class="col-sm-6 mr-auto ml-auto pb-5 pt-5">
    <h3>Create Account</h3>
    <hr>
    @if(Session::get('message'))
    <div class="alert alert-success">
      <p>{{Session::get('message')}}</p>
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

  <form action="{{url('userregistration')}}" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
        <label for="name" class="col-form-label">Your Name:</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
      </div>
      <div class="form-group">
        <label for="mobile" class="col-form-label">Your Mobile:</label>
        <input type="text" name="mobile" class="form-control" id="mobile" value="{{ old('mobile') }}">
      </div>
      <div class="form-group">
        <label for="Email" class="col-form-label">Your Email:</label>
        <input type="email" name="email" class="form-control" id="Email" value="{{ old('email') }}">
      </div>
      <div class="form-group">
        <label for="imgs" class="col-form-label">Your Image:</label>
        <input type="file" name="userImage" class="form-control" id="imgs" value="{{ old('userImage') }}">
      </div>
      <div class="form-group">
        <label for="Password" class="col-form-label">Your Login Password:</label>
        <input type="password" name="password" class="form-control" id="Password">
      </div>
      <div class="form-group">
        <label for="message-text" class="col-form-label">Your Current Address:</label>
        <textarea class="form-control" id="message-text" name="address">{{ old('address') }}</textarea>
      </div>
      <button type="submit" class="btn float-right btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> Register</button>
  </form>
  </div>
</div>

@endsection              