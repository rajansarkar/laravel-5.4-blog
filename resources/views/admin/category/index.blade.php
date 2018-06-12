@extends('layouts.master')

			@section('content')
			<div class="row">
                <div class="col-lg-12">
                	<br><br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Category
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
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach($categorieAll as $key=> $p)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$p->categoryName}}</td>
                                            <td>{{$p->categoryDescription}}</td>
                                            <td>
                                            	@if($p->publishStatus==1)
                                            	<span class="label label-success">Published</span>
                                            	@else
                                            	<span class="label label-danger">Unpublished</span>
                                            	@endif
                                            </td>
                                            <td>
                                            	@if($p->publishStatus==1)
                                            	<a href="{{url('/categoryStatus/'.$p->id)}}" title="Unpublished" class="btn btn-primary btn-sm"><i class="fa fa-arrow-down" aria-hidden="true"></i></a>
                                            	@else
                                            	<a href="{{url('/categoryStatus/'.$p->id)}}" title="Published" class="btn btn-warning btn-sm"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
                                            	@endif

                                            	<a href="{{url('/editCategory/'.$p->id)}}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                            	<a onclick="return confirm('Are You sure to Delete?')" href="{{url('/deleteCat/'.$p->id)}}" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="pull-right">
                            {{$categorieAll->links()}}
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
		@endsection