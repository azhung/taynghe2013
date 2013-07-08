<?php
	class loginController{
		function __construct(){			
			
			//Title
			$title = "Login";
			
			//Kiem tra du lieu
			$isLogin = $this->handleLogin();
						
			include_once('views/login/index.php');
		}
		
		function handleLogin(){
			include_once('models/userModel.php');
			
			$user = $_POST['email'];
			$pass = $_POST['password'];			
			$isExMdl = new userModel();
			
			//Kiem ta xem dang nhap thanh cong khong
			$isLoginOk = false;
			if ($_POST['ok']){
				if ($isExMdl->isExist($user, $pass)){
					$isLoginOk = true;
					$_SESSION['user'] = $user;				
				}
			}			
			return $isLoginOk;
		}		
	}
?>