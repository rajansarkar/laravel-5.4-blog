<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use DB;

class MangeComments extends Controller
{
    public function index()
    {
    	//$c = Comments::paginate(10);
		$c = DB::table('comments')
            ->join('blogs', 'comments.blogId', '=', 'blogs.id')
            ->join('customers', 'comments.userId', '=', 'customers.id')
            ->select('comments.*', 'blogs.blogTitle', 'customers.name')
            //->paginate(10)
            ->paginate(10);
    	return view('admin.comment.index', compact('c'));
    }

    public function commentStatus($id)
    {
    	$c = Comments::find($id);
    	if($c->isPublishCommnet==1)
    	{
    		$c->isPublishCommnet = 0;
    		$c->save();
    		return redirect('/manage-comment')->with('ups', 'Comment Unpublished!!');
    	}else{
    		$c->isPublishCommnet = 1;
    		$c->save();
    		return redirect('/manage-comment')->with('add', 'Comment Published!!');
    	}
    }

    public function deleteComment($id)
    {
    	$d = Comments::find($id);
    	$d->delete();
    	return redirect('/manage-comment')->with('ups', 'Comment Delete Successfully!!');
    }
}
