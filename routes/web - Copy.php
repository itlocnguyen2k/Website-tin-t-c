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
Route::get('php53', function () {
    echo "<h1>Hello php53</h1>";
});
Route::get('hello/php53', function () {
    echo "<h1>Hello php53 - @</h1>";
});
/*
	- Truyen bien len url
		Route::get('truyenbien/{bien1}/{bien2}', function ($bien1,$bien2) {
		    su dung duoc $bien1, $bien2 o day
		});
*/
Route::get('truyenbien1/{bien1}/{bien2}', function ($bien1,$bien2) {
    echo "<h1>$bien1</h1>";
    echo "<h1>$bien2</h1>";
});		
//tu file nay co the goi thang view de thuc hien. Cac file view dat o duong dan resources/views/cac file view. File view co dinh dang tenfile.blade.php
/*
	Cu phap: return view("tenview")
		- Chu y: tenview khong duoc co chu blade.php
*/
Route::get('goiview/view1', function () {
    return view("php53.view1");
    //tenthumuc.tenview de goi view nam trong thu muc
});	
Route::get('goiview/view2/{bien1}/{bien2}', function ($bien1,$bien2) {
	//goi view, truyen vien ra view
    return view("php53.view2", array("bien1"=>$bien1,"bien2"=>$bien2));
});	
Route::get('thuchienform', function () {
	//goi view, truyen vien ra view
    return view("php53.view3");
});	
//khi an nut submit o view3.blade.php thi se den ham sau -> khi do phai bat o trang thai post
Route::post('thuchienform', function () {
	//o day de lay du lieu theo kieu get, post thi su dung doi tuong sau
	echo "<h1>".Request::get("txt")."</h1>";
	//goi view, truyen vien ra view
    return view("php53.view3");
});
Route::get('cong2so', function () {
	//goi view, truyen vien ra view
    return view("php53.view4");
});	
Route::post('cong2so', function () {
	//goi view, truyen vien ra view
    return view("php53.view4");
});	
//---
Route::get('trangchu', function () {
	//goi view, truyen vien ra view
    return view("php53.trangchu");
});
Route::get('lienhe', function () {
	//goi view, truyen vien ra view
    return view("php53.lienhe");
});