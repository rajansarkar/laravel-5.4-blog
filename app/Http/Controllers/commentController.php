<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use DB;

class commentController extends Controller
{
    public function saveComment(Request $request)
    {
    	$c = new Comments();
    	$c->blogId = $request->blogId;
    	$c->userId = $request->userId;
    	$c->userComment = $request->userComment;
    	$c->isPublishCommnet = 0;
    	$c->save();
    	return redirect('details/'.$request->blogId)->with('success', 'Your Comment Submited!! Please wait Approval To admin');

    }


}
