<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//khai bao class model
use App\News;

class NewsController extends Controller
{
    public function index(){
    	//khai bao doi tuong model de thao tac du lieu
    	$news = new News();
    	//lay 10 ban ghi tren mot trang, co phan trang
    	$data = $news->orderBy("id","desc")->paginate(10);
    	//<=> $data = DB::table("news")->paginate(10);
    	//co nghia la $news <=> DB::table("news")
    	return view("admin.NewsRead",["data"=>$data]);
    }
    public function update(Request $request, $id){
    	//khai bao doi tuong model de thao tac du lieu
    	$news = new News();
    	//lay mot ban ghi
    	$record = $news->where("id","=",$id)->first();
    	return view("admin.NewsCreateUpdate",["record"=>$record]);
    }
    public function updatePost(Request $request, $id){
    	//khai bao doi tuong model de thao tac du lieu
    	$news = new News();
    	//---
    	$name = $request->name;
    	$category_id = $request->category_id;
    	$description = $request->description;
    	$content = $request->content;
    	$hot = $request->hot != "" ? 1 : 0;
    	//---
    	//update ban ghi
    	$news->where("id","=",$id)->update(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hot"=>$hot]);
    	//---
    	if($request->hasFile("photo")){
    		//neu user chon anh de upload thi update anh
	    	//lay ten anh
	    	$photo = time()."_".$request->file("photo")->getClientOriginalName();
	    	//lay anh cu de xoa
	    	//select('photo') -> chi lay truong photo trong bang news
	    	$oldPhoto = $news->where("id","=",$id)->select("photo")->first();
	    	if(isset($oldPhoto->photo) && file_exists("upload/news/".$oldPhoto->photo))
	    		unlink("upload/news/".$oldPhoto->photo);
	    	//---
	    	//thuc hien upload anh
	    	$request->file("photo")->move("upload/news",$photo);
	    	$news->where("id","=",$id)->update(["photo"=>$photo]);
    	}
    	//---
    	return redirect(url('admin/news'));
    }
    public function create(Request $request){
    	return view("admin.NewsCreateUpdate");
    }
    public function createPost(Request $request){
    	//khai bao doi tuong model de thao tac du lieu
    	$news = new News();
    	//---
    	$name = $request->name;
    	$category_id = $request->category_id;
    	$description = $request->description;
    	$content = $request->content;
    	$hot = $request->hot != "" ? 1 : 0;
    	$photo = "";
    	//---
    	//neu user chon anh de upload thi update anh
    	if($request->hasFile("photo")){
    		//lay ten anh
	    	$photo = time()."_".$request->file("photo")->getClientOriginalName();
	    	//---
	    	//thuc hien upload anh
	    	$request->file("photo")->move("upload/news",$photo);
    	}
    	//---
    	//---
    	//update ban ghi
    	$news->insert(["name"=>$name,"category_id"=>$category_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo]);

    	return redirect(url('admin/news'));
    }
    public function delete(Request $request,$id){
    	//khai bao doi tuong model de thao tac du lieu
    	$news = new News();
    	//---
    	//lay anh cu de xoa
    	//select('photo') -> chi lay truong photo trong bang news
    	$oldPhoto = $news->where("id","=",$id)->select("photo")->first();
    	if(isset($oldPhoto->photo) && file_exists("upload/news/".$oldPhoto->photo))
    		unlink("upload/news/".$oldPhoto->photo);
    	//---
    	$news->where("id","=",$id)->delete();
    	return redirect(url('admin/news'));
    }
}
