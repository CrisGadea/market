<?php
require_once 'models/product.php';

class KartController{
	
	public function index(){
		if(isset($_SESSION['kart']) && count($_SESSION['kart']) >= 1){
			$kart = $_SESSION['kart'];
		}else{
			$kart = array();
		}
		require_once 'views/kart/index.php';
	}
	
	public function add(){
		if(isset($_GET['id'])){
			$product_id = $_GET['id'];
		}else{
			header('Location:'.base_url);
		}
		
		if(isset($_SESSION['kart'])){
			$counter = 0;
			foreach($_SESSION['kart'] as $indice => $element){
				if($element['id_product'] == $product_id){
					$_SESSION['kart'][$indice]['unities']++;
					$counter++;
				}
			}	
		}
		
		if(!isset($counter) || $counter == 0){
			// Conseguir product
			$product = new Product();
			$product->setId($product_id);
			$product = $product->getOne();

			// Añadir al kart
			if(is_object($product)){
				$_SESSION['kart'][] = array(
					"id_product" => $product->id,
					"price" => $product->price,
					"unities" => 1,
					"product" => $product
				);
			}
		}
		
		header("Location:".base_url."kart/index");
	}
	
	public function delete(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			unset($_SESSION['kart'][$index]);
		}
		header("Location:".base_url."kart/index");
	}
	
	public function up(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			$_SESSION['kart'][$index]['unities']++;
		}
		header("Location:".base_url."kart/index");
	}
	
	public function down(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			$_SESSION['kart'][$index]['unities']--;
			
			if($_SESSION['kart'][$index]['unities'] == 0){
				unset($_SESSION['kart'][$index]);
			}
		}
		header("Location:".base_url."kart/index");
	}
	
	public function delete_all(){
		unset($_SESSION['kart']);
		header("Location:".base_url."kart/index");
	}
	
}