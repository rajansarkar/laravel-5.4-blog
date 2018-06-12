@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
        	<br> <br>
            <div class="panel panel-default">
                <div class="panel-heading">Edit Category</div>
                <div class="panel-body">
					<form action="{{url('/updateCategory')}}" method="post" class="form-horizontal" name="editForm">
						{{csrf_field()}}
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
					    <div class="col-sm-9">
					    <input type="hidden" value="{{$c->id}}" name="id">
					      <input type="text" name="categoryName" class="form-control" value="{{$c->categoryName}}" id="inputEmail3" placeholder="Category Name">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="" class="col-sm-3 control-label">Category Description</label>
					    <div class="col-sm-9">
					      <textarea name="categoryDescription" class="form-control" placeholder="Category Description..">{{$c->categoryDescription}}</textarea>
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
					      <button type="submit" class="btn btn-danger">Update Category</button>
					    </div>
					  </div>
					</form>
                </div>
            </div>
        </div>
    </div>

    <script>
    	document.forms['editForm'].elements['publishStatus'].value='{{$c->publishStatus}}';
    </script>
@endsection

