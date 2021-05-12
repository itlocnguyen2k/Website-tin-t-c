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
//dang nhap trang admin: http://localhost/php53_laravel/public/login
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
//truy cap admin theo duong dan: /public/login
Route::get("home",function(){
	//di chuyen den mot url khac
	return redirect(url("admin/users"));
});
//admin: se nhom tag chung co ten la admin
Route::group(["prefix"=>"admin","middleware"=>"auth"],function(){
	//logout
	Route::get("logout",function(){
		Auth::logout();
		return redirect(url("login"));
	});
	//chuc nang users
	//list cac ban ghi
	Route::get("users","UsersController@index");
	//Route::get("users",[App\Http\UsersController::class,index]);
	Route::get("users/create","UsersController@create");
	Route::post("users/create","UsersController@createPost");
	Route::get("users/update/{id}","UsersController@update");
	Route::post("users/update/{id}","UsersController@updatePost");
	Route::get("users/delete/{id}","UsersController@delete");
	//tao controller co ten UsersController bang lenh composer sau: php artisan make:controller UsersController
	//---
	//chuc nang categories
	//list cac ban ghi
	Route::get("categories","CategoriesController@index");
	Route::get("categories/create","CategoriesController@create");
	Route::post("categories/create","CategoriesController@createPost");
	Route::get("categories/update/{id}","CategoriesController@update");
	Route::post("categories/update/{id}","CategoriesController@updatePost");
	Route::get("categories/delete/{id}","CategoriesController@delete");
	//tao controller co ten CategoriesController bang lenh composer sau: php artisan make:controller CategoriesController
	//tao model co ten Categories bang lenh composer sau: php artisan make:model Categories
	//---
	//chuc nang news
	//list cac ban ghi
	Route::get("news","NewsController@index");
	Route::get("news/create","NewsController@create");
	Route::post("news/create","NewsController@createPost");
	Route::get("news/update/{id}","NewsController@update");
	Route::post("news/update/{id}","NewsController@updatePost");
	Route::get("news/delete/{id}","NewsController@delete");
});
//frontend
Route::get('', function () {
    return view('frontend.home');
});
//contact
Route::get('contact', function () {
    return view('frontend.contact');
});
//danh muc tin tuc
Route::get('news/category/{id}', function ($id) {
    return view('frontend.newscategory',["id"=>$id]);
});
//chi tiet tin tuc
Route::get('news/detail/{id}', function ($id) {
    return view('frontend.newsdetail',["id"=>$id]);
});