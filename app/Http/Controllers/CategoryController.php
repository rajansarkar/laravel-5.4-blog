<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCategory()
    {
    	return view('admin.category.create');
    }

    public function storeCategory(Request $request)
    {
    	//Category::create($request->all());

    	// $cat = new Category;
    	// $cat->categoryName = $request->categoryName;
    	// $cat->categoryDescription = $request->categoryDescription;
    	// $cat->publishStatus = $request->publishStatus;
    	// $cat->save();
    	$cat = DB::table('categories')->where('categoryName', $request->categoryName)->first();

    	if(empty($cat))
    	{
	    	DB::table('categories')->insert([
	    		"categoryName" =>$request->categoryName,
	    		"categoryDescription" =>$request->categoryDescription,
	    		"publishStatus" =>$request->publishStatus,
	    	]);
        }else{
        		return redirect('/add-category')->with('message', 'Category Already Exists');
        	}
    	return redirect('/add-category')->with('message', 'Category Add Successfully');

    }

    public function manageCategory()
    {
 		// $catall = DB::table('categories')->get();
 		//return view('admin.category.index', ["categorieAll"=> $catall]);
 		$categorieAll = Category::paginate(10);
 		return view('admin.category.index', compact('categorieAll'));
    }

    public function categorystatus($id)
    {
    	// $c = DB::table('categories')->where('id', $id)->first();
    	// if(1==$c->publishStatus)
    	// {
    	// 	$f = DB::table('categories')->where('id', $id)->update(['publishStatus' => 0]);
    	// 	return redirect('/manage-category')->with('ups', "Category Unpublished Successfully");
    	// }else{
    	// 	$f = DB::table('categories')->where('id', $id)->update(['publishStatus' => 1]);
    	// 	return redirect('/manage-category')->with('add', "Category Published Successfully");
    	// }
    	$cat = Category::find($id);
    	if($cat->publishStatus==0)
    	{
    		$cat->publishStatus = 1;
    		$cat->save();
			return redirect('/manage-category')->with('add', "Category Published Successfully");
    	}else{
    		$cat->publishStatus = 0;
    		$cat->save();
			return redirect('/manage-category')->with('ups', "Category Unpublished Successfully");
    	}

    }

    public function editcategory($id)
    {
    	//$c = Category::find($id); //eloquent query
    	$c = DB::table('categories')->where('id', $id)->first(); //DB query
    	return view('admin.category.edit', compact('c'));
    }

    public function updateCats(Request $request)
    {
    	DB::table('categories')->where('id', $request->id)->update([
    		"categoryName" =>$request->categoryName,
	    	"categoryDescription" => $request->categoryDescription,
	    	"publishStatus" => $request->publishStatus,
    	]);

    	// $u = Category::find($request->id);
    	// $u->categoryName = $request->categoryName;
    	// $u->categoryDescription = $request->categoryDescription;
    	// $u->publishStatus = $request->publishStatus;
    	// $u->save();

    	return redirect('/manage-category')->with('ups', "Category Update Successfully");
    }

    public function deleteCategory($id)
    {
    	$d = Category::find($id);
    	$d->delete();
    	return redirect('/manage-category')->with('ups', "Category Delete Successfully");
    }
}
