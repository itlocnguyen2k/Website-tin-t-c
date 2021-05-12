<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// su dung doi tuong thao tac csdl
use DB;
//su dung doi tuong de bat theo kieu POST, GET
use Request;

class Categories extends Model
{
    //lay nhieu ban ghi, co phan trang
    public function modelList(){
    	$data = DB::table("categories")->orderBy("id","desc")->paginate(4);
    	return $data;
    }
    //lay mot ban ghi
     public function modelGetRow($id){
    	$record = DB::table("categories")->where("id","=",$id)->first();
    	return $record;
    }
    //update ban ghi
    public function modelUpdate($id){
    	$name = Request::get("name");
    	DB::table("categories")->where("id","=",$id)->update(["name"=>$name]);
    }
    //create ban ghi
    public function modelCreate(){
    	$name = Request::get("name");
    	DB::table("categories")->insert(["name"=>$name]);
    }
    //xoa ban ghi
    public function modelDelete($id){
    	DB::table("categories")->where("id","=",$id)->delete();
    }
}
