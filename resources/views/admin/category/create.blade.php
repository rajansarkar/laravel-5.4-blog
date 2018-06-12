@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
        	<br> <br>
            <div class="panel panel-default">
                <div class="panel-heading">Add Category</div>
                <div class="panel-body">
                	<h1>{{Session::get('message')}}</h1>
					<form action="{{url('/new-category')}}" method="post" class="form-horizontal">
						{{csrf_field()}}
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
					    <div class="col-sm-9">
					      <input type="text" name="categoryName" class="form-control" id="inputEmail3" placeholder="Category Name">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="" class="col-sm-3 control-label">Category Description</label>
					    <div class="col-sm-9">
					      <textarea name="categoryDescription" class="form-control" placeholder="Category Description.."></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="" class="col-sm-3 control-label">Publication Status</label>
					    <div class="col-sm-9">
					      <select name="publishStatus" class="form-control">
					      	<option value="">----Select Status----</option>
					      	<option value="1">Published</option>
					      	<option value="0">UnPublished</option>
					      </select>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-10">
					      <button type="submit" class="btn btn-success">Create Category</button>
					    </div>
					  </div>
					</form>
                </div>
            </div>
        </div>
    </div>
@endsection