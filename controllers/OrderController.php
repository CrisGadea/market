<?php
require_once 'models/order.php';

class orderController{
	
	public function do(){
		
		require_once 'views/order/do.php';
	}
	
	public function add(){
		if(isset($_SESSION['identity'])){
			$user_id = $_SESSION['identity']->id;
			$province = isset($_POST['province']) ? $_POST['province'] : false;
			$location = isset($_POST['location']) ? $_POST['location'] : false;
			$direction = isset($_POST['direction']) ? $_POST['direction'] : false;
			
			$stats = Utils::statsKart();
			$cost = $stats['total'];
				
			if($province && $location && $direction){
				// Guardar datos en bd
				$order = new Order();
				$order->setUserId($user_id);
				$order->setProvince($province);
				$order->setLocation($location);
				$order->setDirection($direction);
				$order->setCost($cost);
				
				$save = $order->save();
				
				// Guardar linea order
				$save_line = $order->saveLine();
				
				if($save && $save_line){
					$_SESSION['order'] = "complete";
				}else{
					$_SESSION['order'] = "failed";
				}
				
			}else{
				$_SESSION['order'] = "failed";
			}
			
			header("Location:".base_url.'order/confirm');			
		}else{
			// Redigir al index
			header("Location:".base_url);
		}
	}
	
	public function confirm(){
		if(isset($_SESSION['identity'])){
			$identity = $_SESSION['identity'];
			$order = new Order();
			$order->setUserId($identity->id);
			
			$order = $order->getOneByUser();
			
			$order_products = new Order();
			$products = $order_products->getProductsByOrder($order->id);
		}
		require_once 'views/order/confirm.php';
	}
	
	public function myOrders(){
		Utils::isIdentity();
		$user_id = $_SESSION['identity']->id;
		$order = new Order();
		
		// Sacar los orders del usuario
		$order->setUserId($user_id);
		$orders = $order->getAllByUser();
		
		require_once 'views/order/myOrders.php';
	}
	
	public function detail(){
		Utils::isIdentity();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Sacar el order
			$order = new Order();
			$order->setId($id);
			$order = $order->getOne();
			
			// Sacar los poductos
			$order_products = new Order();
			$products = $order_products->getProductsByOrder($id);
			
			require_once 'views/order/detail.php';
		}else{
			header('Location:'.base_url.'order/myOrders');
		}
	}
	
	public function management(){
		Utils::isAdmin();
		$management = true;
		
		$order = new Order();
		$orders = $order->getAll();
		
		require_once 'views/order/myOrders.php';
	}
	
	public function status(){
		Utils::isAdmin();
		if(isset($_POST['order_id']) && isset($_POST['status'])){
			// Recoger datos form
			$id = $_POST['order_id'];
			$status = $_POST['status'];
			
			// Upadate del order
			$order = new Order();
			$order->setId($id);
			$order->setStatus($status);
			$order->edit();
			
			header("Location:".base_url.'order/detail&id='.$id);
		}else{
			header("Location:".base_url);
		}
	}
	
	
}