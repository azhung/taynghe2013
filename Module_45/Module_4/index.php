<?php
	session_start();
	$root = 'http://'.$_SERVER['HTTP_HOST'].str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
	define('ROOT', $root);
	

	include_once('libs/Model.php');	
	include_once('libs/Router.php');	
	new Router();
?>