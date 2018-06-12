@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
        	<br> <br>
            <div class="panel panel-default">
                <div class="panel-heading">Update Blog</div>
                <div class="panel-body">
                	<h1>{{Session::get('message')}}</h1>
					<form action="{{url('/update-blog')}}" method="post" class="form-horizontal" name="editBlogForm" enctype="multipart/form-data">
						{{csrf_field()}}
						<input type="hidden" name="eid" value="{{$eblog->id}}">
					  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>
						    <div class="col-sm-9">
						      <select name="categoryId" class="form-control">
						      	<option value="">----Select Category----</option>
						      	@foreach($c as $key => $k)
						      	<option value="{{$k->id}}" <?php echo $eblog->categoryId == $k->id ? 'Selected="Selected"' : '' ?> >
						      		{{$k->categoryName}}</option>
						      	@endforeach
						      </select>
						      @if ($errors->has('categoryId'))
									<span class="help-block text-danger">
								    	<strong>{{ $errors->first('categoryId') }}</strong>
									</span>
								@endif 
						    </div>
					  </div>
					  <div class="form-group">
					    <label for="" class="col-sm-3 control-label">Blog Title</label>
					    <div class="col-sm-9">
					      <input type="text" name="blogTitle" class="form-control" value="{{ $eblog->blogTitle}}">
					      @if ($errors->has('blogTitle'))
								<span class="help-block text-danger">
							    	<strong>{{ $errors->first('blogTitle') }}</strong>
								</span>
							@endif 
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="" class="col-sm-3 control-label">Author Name</label>
					    <div class="col-sm-9">
					      <input type="text" name="authorName" class="form-control" value="{{$eblog->authorName}}">
					      @if ($errors->has('authorName'))
								<span class="help-block text-danger">
							    	<strong>{{ $errors->first('authorName') }}</strong>
								</span>
							@endif 
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="" class="col-sm-3 control-label">Blog Description</label>
					    <div class="col-sm-9">
					      <textarea name="blogDescription" class="form-control">{{$eblog->blogDescription}}</textarea>
					      @if ($errors->has('blogDescription'))
								<span class="help-block">
							    	<strong>{{ $errors->first('blogDescription') }}</strong>
								</span>
							@endif
					    </div>
					   </div>
					   <div class="form-group">
					    <label for="" class="col-sm-3 control-label">Blog Image</label>
					    <div class="col-sm-9">
					      <input type="file" name="blogImage" class="form-control">
							@if ($errors->has('blogImage'))
								<span class="help-block">
							    	<strong>{{ $errors->first('blogImage') }}</strong>
								</span>
							@endif
							<br>
							<img src="../blogimage/{{$eblog->blogImage}}" alt="" width="200">
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
					      @if ($errors->has('publishStatus'))
								<span class="help-block">
							    	<strong>{{ $errors->first('publishStatus') }}</strong>
								</span>
							@endif
					    </div>
					   </div>
					  <div class="form-group">
					    <div class="col-sm-offset-3 col-sm-10">
					      <button type="submit" class="btn btn-success">Save Blog</button>
					    </div>
					  </div>
					</form>
                </div>
            </div>
        </div>
    </div>

    <script>
    	document.forms['editBlogForm'].elements['publishStatus'].value='{{$eblog->publishStatus}}';
    </script>
@endsection