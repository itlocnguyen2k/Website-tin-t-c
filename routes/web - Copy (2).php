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

Route::get('/', function () {
    return view('welcome');
});
//group cac duong dan co tag chung
Route::group(["prefix"=>"test"],function(){
	Route::get("test1",function(){
		echo "<h1>Test 1</h1>";
	});
	Route::get("test2",function(){
		echo "<h1>Test 2</h1>";
	});
});
//goi middleware
Route::get("goi-middleware",function(){
	echo "<h1>Route được gọi</h1>";
})->middleware("hello");
//ma hoa password
Route::get("password",function(){
	echo Hash::make("123");
});
//sql
Route::get("sql1",function(){
	//su dung full sql
	$result = DB::select("select * from users");
	//duyet ket qua tra ve
	foreach($result as $rows){
		echo $rows->name . "<br>";
	}
});
Route::get("sql2",function(){
	//su dung full sql
	$result = DB::table("users")->get();
	//duyet ket qua tra ve
	foreach($result as $rows){
		echo $rows->name . "<br>";
	}
});
//goi controller
Route::get("goi-controller","HelloController@sayHello");