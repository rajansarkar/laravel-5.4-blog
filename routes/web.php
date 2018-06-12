<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','HelloController@index');
Route::get('/about', 'HelloController@about');
Route::get('/services', 'HelloController@services');
Route::get('/contact', 'HelloController@contact');
Route::get('/details/{id}', 'HelloController@blogDetails');
Route::get('/categoryPost/{id}', 'HelloController@categoryByBlog');
Route::get('/create-account', 'HelloController@createAccount');
Route::get('/login-user', 'HelloController@loginUser');
Route::post('/userregistration', 'HelloController@saveUser');
Route::get('/userlogout', 'HelloController@userLogout');
Route::post('/user-login', 'HelloController@userLogin');
Route::post('/savecomment', 'commentController@saveComment');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('/login','\App\Http\Controllers\Auth\LoginController@authenticate');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('handle-error', function(){
	return view('access-denies');
});

Route::get('profile', 'HomeController@userProfile');
Route::get('settings', 'HomeController@userChangePassword');
Route::post('changepassword', 'HomeController@changePassword');


Route::group(['middleware' =>'admin'], function () {

	Route::get('/add-category', 'CategoryController@addCategory');
	Route::get('/manage-category', 'CategoryController@manageCategory');
	Route::post('/new-category', 'CategoryController@storeCategory');
	Route::get('/categoryStatus/{id}', 'CategoryController@categorystatus');
	Route::get('/editCategory/{id}', 'CategoryController@editcategory');
	Route::post('/updateCategory', 'CategoryController@updateCats');
	Route::get('/deleteCat/{id}', 'CategoryController@deleteCategory');

	Route::get('/create-blog', 'blogController@createBlog');
	Route::post('/new-blog', 'blogController@saveBlog');
	Route::get('/manage-blog', 'blogController@manageBlog');
	Route::get('/blogstatus/{id}', 'blogController@blogStatus');
	Route::get('/editBlog/{id}', 'blogController@editBlogs');
	Route::post('/update-blog', 'blogController@updateBlog');
	Route::get('/delete-blog/{id}', 'blogController@deleteBlog');
	Route::get('/delete-blog/{id}', 'blogController@deleteBlog');
});

Route::group(['middleware' =>'users'], function () {
	Route::get('/manage-comment', 'MangeComments@index');
	Route::get('/commentstatus/{id}', 'MangeComments@commentStatus');
	Route::get('/delete-comment/{id}', 'MangeComments@deleteComment');
});