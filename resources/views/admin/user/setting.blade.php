@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
        	<br> <br>
            <div class="panel panel-danger">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
            	@if(Session::get('add'))
            	<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('add')}}
                </div>
                @endif
            	@if(Session::get('ups'))
            	<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{Session::get('ups')}}
                </div>
                @endif
					<form action="{{url('/changepassword')}}" method="post" class="form-horizontal">
						{{csrf_field()}}
					  <div class="form-group {{ $errors->has('current_password') ? ' has-error' : '' }}">
					    <label for="inputEmail3" class="col-sm-3 control-label">Current Password</label>
					    <div class="col-sm-9">
					      <input type="password" name="current_password" class="form-control" id="inputEmail3" placeholder="Current Password given.">
	                        @if ($errors->has('current_password'))
	                            <span class="help-block">
	                                <strong>{{ $errors->first('current_password') }}</strong>
	                            </span>
	                        @endif
					    </div>
					  </div>
					  <div class="form-group {{$errors->has('new_password') ? ' has-error' : ''}}">
					    <label for="" class="col-sm-3 control-label">New Password</label>
					    <div class="col-sm-9">
					      <input type="password" name="new_password" class="form-control" id="" placeholder="New Password Given.">
					      @if($errors->has('new_password'))
								<span class="help-block">
	                                <strong>{{ $errors->first('new_password') }}</strong>
	                            </span>
					      @endif
					    </div>
					  </div>
					  <div class="form-group {{$errors->has('confirm_password') ? ' has-error' : ''}}">
					    <label for="" class="col-sm-3 control-label">Confirm Password</label>
					    <div class="col-sm-9">
					      <input type="password" name="confirm_password" class="form-control" id="" placeholder="Confirm Password">
					      @if($errors->has('confirm_password'))
								<span class="help-block">
	                                <strong>{{ $errors->first('confirm_password') }}</strong>
	                            </span>
					      @endif
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-10">
					      <button type="submit" class="btn btn-success">Change Password</button>
					    </div>
					  </div>
					</form>
                </div>
            </div>
        </div>
    </div>
@endsection