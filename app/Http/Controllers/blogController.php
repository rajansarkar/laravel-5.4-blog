<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
//use Validator;
use App\Blog;

class blogController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function createBlog()
    {
    	$c = Category::where('publishStatus', 1)->get();
    	return view('admin.blog.create', compact('c'));
    }

    public function saveBlog(Request $request)
    {
		  $this->validate($request, [
	        'blogImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
	        'categoryId' => 'required',
	        'blogTitle' => 'required',
	        'authorName' => 'required',
	        'blogDescription' => 'required',
	        'publishStatus' => 'required',
	    	]);
		  if($request->hasFile('blogImage'))
		  {
		        $image = $request->file('blogImage');
		        $name = time().'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('/blogimage');
		        $image->move($destinationPath, $name);

		        $b = new Blog();
		        $b->categoryId = $request->categoryId;
		        $b->blogTitle = $request->blogTitle;
		        $b->authorName = $request->authorName;
		        $b->blogDescription = $request->blogDescription;
		        $b->blogImage = $name;
		        $b->publishStatus = $request->publishStatus;
		        $b->save();
		        return back()->with('message','Blog added successfully');
		  }
	    	// $blogImage = $request->file('blogImage');
	    	// $blogImageName = $blogImage->getClientOriginalName();
	    	// $uploadPath = "blog_image/";
	    	// $imageUrl = $uploadPath. $blogImageName;
	    	// $blogImage->move($uploadPath, $blogImageName);


    }

    public function manageBlog()
    {
    	$blogAll = Blog::paginate(10);
    	return view('admin.blog.index', compact('blogAll'));
    }

    public function blogStatus($id)
    {
    	$bId = Blog::find($id);
    	if($bId->publishStatus==1)
    	{
    		$bId->publishStatus = 0;
    		$bId->save();
    		return redirect('/manage-blog')->with('ups', "Blog Unpublished");
    	}else{
    		$bId->publishStatus = 1;
    		$bId->save();
    		return redirect('/manage-blog')->with('add', "Blog Published");
    	}
    }

    public function editBlogs($id)
    {
    	$c = Category::where('publishStatus', 1)->get();
    	$eblog = Blog::find($id);
    	return view('admin.blog.edit', ['eblog'=> $eblog, 'c'=>$c]);

    }

    public function updateBlog(Request $request)
    {
    	$this->validate($request, [
	        //'blogImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
	        'categoryId' => 'required',
	        'blogTitle' => 'required',
	        'authorName' => 'required',
	        'blogDescription' => 'required',
	        'publishStatus' => 'required',
	    	]);
    		$u = Blog::find($request->eid);
			if($request->hasFile('blogImage'))
			{	
				$image = $request->file('blogImage');
		        $name = time().'.'.$image->getClientOriginalExtension();
		        $destinationPath = public_path('/blogimage');
		        $image->move($destinationPath, $name);

				$u->categoryId = $request->categoryId;
			    $u->blogTitle = $request->blogTitle;
			    $u->authorName = $request->authorName;
			    $u->blogDescription = $request->blogDescription;
			    $u->blogImage = $name;
			    $u->publishStatus = $request->publishStatus;
			    $u->save();
				return redirect('/manage-blog')->with('ups', 'Blog Successfully Updated');
				}else{
			        //$image = $request->file('blogImage');
			        $u->categoryId = $request->categoryId;
				    $u->blogTitle = $request->blogTitle;
				    $u->authorName = $request->authorName;
				    $u->blogDescription = $request->blogDescription;
				    //$u->blogImage = $name;
				    $u->publishStatus = $request->publishStatus;
				    $u->save();
				    return redirect('/manage-blog')->with('ups', 'Blog Successfully Updated');
				}

    }

    public function deleteBlog($id)
    {
    	$bDelete = Blog::find($id);
    	if($bDelete)
    	{
    		unlink('blogimage/'. $bDelete->blogImage);
    		$bDelete->delete();
    		return redirect('/manage-blog')->with('ups', 'Blog Delete Successfully');

    	}
    }
}
