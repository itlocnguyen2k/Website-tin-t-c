<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//trong controller muon dung doi tuong nao thi phai khai bao doi tuong do
//trong file route.php thi khong can khai bao cung co the dung duoc
//doi tuong thao tac csdl
use DB;
//doi tuong ma hoa password
use Hash;

class UsersController extends Controller
{
	//co the truyen vao bien $request trong ham index hoac khong cung duoc. Truyen vao de bat du lieu theo kieu POST, GET
    public function index(Request $request){
    	//lay 4 ban ghi, co phan trang
    	$data = DB::table("users")->orderBy("id","desc")->paginate(4);
    	return View("admin.UsersRead",["data"=>$data]);
    }
    //update
    public function update(Request $request,$id){
    	//lay mot ban ghi
    	$record = DB::table("users")->where("id","=",$id)->first();
    	return View("admin.UsersCreateUpdate",["record"=>$record]);
    }
    //update post
    public function updatePost(Request $request,$id){
    	$name = $request->name;
    	$password = $request->password;
    	//update name
    	DB::table("users")->where("id","=",$id)->update(array("name"=>$name));
    	//neu password khong rong thi update password
    	if($password != ""){
    		//ma hoa password
    		$password = Hash::make($password);
    		DB::table("users")->where("id","=",$id)->update(array("password"=>$password));
    	}
    	return redirect(url('admin/users'));
    }
    //create
    public function create(Request $request){
    	return View("admin.UsersCreateUpdate");
    }
    //create post
    public function createPost(Request $request){
    	$name = $request->name;
    	$email = $request->email;
    	$password = $request->password;
    	//ma hoa password
    	$password = Hash::make($password);
    	//kiem tra xem email da ton tai chua
    	$check = DB::table("users")->where("email","=",$email)->Count();
    	if($check == 0)
    		DB::table("users")->insert(array("name"=>$name,"email"=>$email,"password"=>$password));
    	else
    		return redirect(url('admin/users/create?notify=exists'));
    	return redirect(url('admin/users'));
    }
    //delete
    public function delete(Request $request,$id){
    	//lay mot ban ghi
    	$record = DB::table("users")->where("id","=",$id)->delete();
    	return redirect(url('admin/users'));
    }
}
