<?php
	class logoutControl{
		function __construct(){
			unset($_SESSION['user']);
			
			$title_url = 'Logout';
			
			include_once('view/logout/index.php');
		}
	}
?>