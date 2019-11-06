<?php
require_once 'models/user.php';

class UserController{
	
	public function index(){
		echo "Users Controller, Index Action";
	}
	
	public function register(){
		require_once 'views/user/register.php';
	}
	
	public function save(){
		if(isset($_POST)){
			
			$name = isset($_POST['name']) ? $_POST['name'] : false;
			$surname = isset($_POST['surname']) ? $_POST['surname'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			
			if($name && $surname && $email && $password){
				$user = new User();
				$user->setName($name);
				$user->setSurname($surname);
				$user->setEmail($email);
				$user->setPassword($password);

				$save = $user->save();
				if($save){
					$_SESSION['register'] = "complete";
				}else{
					$_SESSION['register'] = "failed";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}
		header("Location:".base_url.'user/register');
	}
	
	public function login(){
		if(isset($_POST)){
			// Identificar al user
			// Consulta a la base de datos
			$user = new User();
			$user->setEmail($_POST['email']);
			$user->setPassword($_POST['password']);
			
			$identity = $user->login();
			
			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;
				
				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}
				
			}else{
				$_SESSION['error_login'] = 'Failed identification!';
			}
		
		}
		header("Location:".base_url);
	}
	
	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		header("Location:".base_url);
	}
	
}