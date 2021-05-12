<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//muon nhan biet duoc class Categories o file Categories.php (model) thi phai khai bao no o day
use App\Categories;

class CategoriesController extends Controller
{
	//tao bien model
	public $model;
    //ham tao
    public function __construct(){
    	$this->model = new Categories();
    }
    public function index(){
    	//goi ham modelList() tu model de lay du lieu
    	$data = $this->model->modelList();
    	return View("admin.CategoriesRead",["data"=>$data]);
    }
    //update
    public function update(Request $request, $id){
    	$record = $this->model->modelGetRow($id);
    	return View("admin.CategoriesCreateUpdate",["record"=>$record]);
    }
    //update post
    public function updatePost(Request $request, $id){
    	$record = $this->model->modelUpdate($id);
    	return redirect(url('admin/categories'));
    }
    //create
    public function create(Request $request){
    	return View("admin.CategoriesCreateUpdate");
    }
    //update post
    public function createPost(Request $request){
    	$this->model->modelCreate();
    	return redirect(url('admin/categories'));
    }
    //delete
    public function delete(Request $request, $id){
    	$this->model->modelDelete($id);
    	return redirect(url('admin/categories'));
    }
}
