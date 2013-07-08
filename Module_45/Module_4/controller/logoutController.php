<?php
	class logoutController{
		function __construct(){
			unset($_SESSION['user']);
			include_once('views/logout/index.php');
		}
	}
?>