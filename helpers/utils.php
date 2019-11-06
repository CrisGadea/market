<?php

class Utils{
	
	public static function deleteSession($name){
		if(isset($_SESSION[$name])){
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		}
		
		return $name;
	}
	
	public static function isAdmin(){
		if(!isset($_SESSION['admin'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url);
		}else{
			return true;
		}
	}
	
	public static function showCategories(){
		require_once 'models/category.php';
		$category = new Category();
		$categories = $category->getAll();
		return $categories;
	}
	
	public static function statsKart(){
		$stats = array(
			'count' => 0,
			'total' => 0
		);
		
		if(isset($_SESSION['kart'])){
			$stats['count'] = count($_SESSION['kart']);
			
			foreach($_SESSION['kart'] as $product){
				$stats['total'] += $product['price']*$product['unities'];
			}
		}
		
		return $stats;
	}
	
	public static function showStatus($status){
		$value = 'Pending';
		
		if($status == 'confirm'){
			$value = 'Pending';
		}elseif($status == 'preparation'){
			$value = 'In preparation';
		}elseif($status == 'ready'){
			$value = 'Ready to ship';
		}elseif($status = 'sended'){
			$value = 'Sended';
		}
		
		return $value;
	}
	
}
