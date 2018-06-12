<?php 

use App\Category;

?>
@extends('layouts.master')
			@section('content')
			<div class="row">
                <div class="col-lg-12">
                	<br><br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Blog
                        </div>
                        <!-- /.panel-heading -->
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

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Blog Name</th>
                                            <th>Comments</th>
                                            <th>Comment Date</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($c as $key=> $b)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$b->name}}</td>
                                            <td>{{$b->blogTitle}}</td>
                                            <td width="350">{{$b->userComment}}</td>
                                            <td>{{date('M j, Y h:i A', strtotime($b->created_at))}}</td>
                                            <td>
                                            	@if($b->isPublishCommnet==1)
                                            	<span class="label label-success">Published</span>
                                            	@else
                                            	<span class="label label-danger">Unpublished</span>
                                            	@endif
                                            </td>
                                            <td>
                                            	@if($b->isPublishCommnet==1)
                                            	<a href="{{url('/commentstatus/'.$b->id)}}" title="Unpublished" class="btn btn-primary btn-sm"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
                                            	@else
                                            	<a href="{{url('/commentstatus/'.$b->id)}}" title="Published" class="btn btn-warning btn-sm"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
                                            	@endif
                                            	<a onclick="return confirm('Are You sure to Delete?')" href="{{url('/delete-comment/'.$b->id)}}" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="pull-right">
                                {{$c->links()}}
                            </div>
                        </div>
                        <!-- /.panel-body -->
                        
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
		@endsection