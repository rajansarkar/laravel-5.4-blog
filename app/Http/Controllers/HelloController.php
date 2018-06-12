<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use App\Customer;
use App\Comments;
use Session;
use DB;

class HelloController extends Controller
{
    public function index(){
    	//return "rajan sarkar";
    	$b = Blog::where('publishStatus', 1)->orderBy('id', 'desc')->take(4)->get();
    	return view('frontend.home.homeContent', compact('b'));
    }

    public function about()
    {
    	return view('frontend.about.aboutContent');
    }

    public function services()
    {
    	return view('frontend.services.serviceContent');
    }

    public function contact()
    {
    	return view('frontend.contact.contact');
    }

    public function blogDetails($id)
    {
    	$dblog = Blog::find($id);
        $c = DB::table('comments')
            ->join('blogs', 'comments.blogId', '=', 'blogs.id')
            ->join('customers', 'comments.userId', '=', 'customers.id')
            ->select('comments.*', 'blogs.blogTitle', 'customers.*')
            ->where('isPublishCommnet', 1)
            ->where('blogId', $dblog->id)
            ->get();
    	return view('frontend.home.details', ['dblog'=> $dblog, 'c' =>$c]);
    }

    public function categoryByBlog($id)
    {
    	$catTitle = Category::where('id',$id)->first()->categoryName;
    	$catBlog = Blog::where('categoryId', $id)->get();
    	return view('frontend.home.categorys', ['catBlog'=>$catBlog, 'catTitle'=>$catTitle]);
    }

    public function createAccount()
    {
    	return view('frontend.registration');
    }

    public function loginUser()
    {
    	return view('frontend.login');
    }

	public function saveUser (Request $request)
    {
    	$this->validate($request, [
            'userImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'unique:customers,email',
            'address' => 'required',
            'password' => 'required',
        ]);

          if($request->hasFile('userImage'))
          {
                $image = $request->file('userImage');
                $name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/userimage');
                $image->move($destinationPath, $name);

                $b = new Customer();
                $b->name = $request->name;
                $b->mobile = $request->mobile;
                $b->email = $request->email;
                $b->address = $request->address;
                $b->userImage = $name;
                $b->password = password_hash($request->password, PASSWORD_DEFAULT);
                $b->save();
                //dd(session::all($b));
                Session::put('uid', $b->id);
                Session::put('username', $b->name);
                // return back()->with('message','Account Create successfully');
                return redirect('/');
          }


    }

    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $userInfo = Customer::where('email', $request->email)->first();
        if($userInfo){
            $expassword = $userInfo->password;
            if (password_verify($request->password, $expassword)) {
                Session::put('uid', $userInfo->id);
                Session::put('username', $userInfo->name);
                return redirect('/');
            } else {
                return back()->with('error', 'Password Not Match');
            }
        }else{
            return back()->with('error', 'Email Address Not Found');
        }



    }

    public function userLogout()
    {
        Session::forget('uid');
        Session::forget('username');
        // Session::flush('_token');

        return back();
    }


}
