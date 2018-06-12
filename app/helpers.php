<?php 

use App\Category;
use App\Blog;
//use View;
use App\Customer;
	

function catNameById($id)
{
    $r = Category::where('id', $id)->first()->categoryName;
    return $r;
}

function getCategory()
{
	$c = Category::get();
	return $c;
}

function postReadTime($content)
{
	$mycontent = $content; // wordpress users only
	$word = str_word_count(strip_tags($mycontent));
	$m = floor($word / 200);
	$s = floor($word % 200 / (200 / 60));
	$est = $m . ' minute' . ($m == 1 ? '' : 's') . ', ' . $s . ' second' . ($s == 1 ? '' : 's');
	return $est;
}

function relatedPostByCat($catid, $curid)
{
	$cb = Blog::where('id', '!=', $curid)->where('categoryId', $catid)->get();
	return $cb;
}

function getTotalPost()
{
	$b = Blog::count();
	return $b;
}

function getPendingPost()
{
	$p = Blog::where('publishStatus', 0)->count();
	return $p;
} 

function getTotalCategory()
{
	$c = Category::count();
	return $c;
}

function getTotalCustomer()
{
	$cus = Customer::count();
	return $cus;
}


?>