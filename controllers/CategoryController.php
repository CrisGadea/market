<?php
require_once 'models/category.php';
require_once 'models/product.php';

class categoriaController{
	
	public function index(){
		Utils::isAdmin();
		$category = new Category();
		$categories = $category->getAll();
		
		require_once 'views/category/index.php';
	}
	
	public function show(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Conseguir category
			$category = new Category();
			$category->setId($id);
			$category = $category->getOne();
			
			// Conseguir products;
			$product = new Product();
			$product->setCategoryId($id);
			$products = $product->getAllCategory();
		}
		
		require_once 'views/category/show.php';
	}
	
	public function create(){
		Utils::isAdmin();
		require_once 'views/category/create.php';
	}
	
	public function save(){
		Utils::isAdmin();
	    if(isset($_POST) && isset($_POST['name'])){
			// Guardar la category en bd
			$category = new Category();
			$category->setName($_POST['name']);
			$save = $category->save();
		}
		header("Location:".base_url."category/index");
	}
	
}