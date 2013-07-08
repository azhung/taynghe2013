<?php
	include_once('libs/Controller.php');
	class loginControl extends Controller{
		function __construct(){
			parent::__construct();	
			
			$title_url = 'Login';		
			$thongtin = $this->handleLogin();	
			include_once('view/login/index.php');
		}
		
		function handleLogin(){
			$kq = '';
			Controller::render('login');
			$log = new loginModel();
			if (isset($_POST['ok'])){
				$user = $_POST['email'];				
				$pass = $_POST['password'];
				
				$dn = $log->getUserId($user, $pass);				
				if ($log->getUser($user, $pass) == 0 ){
					$kq = "<p class='message_error'>We could not find the Email/ Nickname or password you have supplied. Please check the entries</p>";					
				}else{
					$_SESSION['user'] = $user;					
					$kq = "<p class='message_error'>Hello '".$user."', you are successfully logged in</p>";

                    // Them code chuyen huong sang tagsmanager neu truy nhap truc tiep vao tagsmanager ma chua dang nhap
                    if (parent::getParam(1) == 'tagsmanager')
                        echo   '<script>
                                    setTimeout(function(){
                                        window.location = "'.ROOT.'tagsmanager";
                                    }, 1500);
                                </script>';
                    // end them
				}
			}
			return $kq;
		}			
	}
?>