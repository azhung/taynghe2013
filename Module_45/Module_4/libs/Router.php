<?php
	class Router{
		function __construct(){
			$url = 'home';
			if (isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');				
			}
			$url = explode('/', $url);			
			$this->getUrl($url[0]);
		}
		
		function getUrl($index){
			$path = 'controller/'.$index.'Controller.php';
			if (file_exists($path)){
				include_once($path);
				$str = $index.'Controller';
				new $str;
			}
			else{
				echo "NO PATH";
			}
		}
		//Get Alias
		public static function getAlias(){
			$url;
			if (isset($_GET['url'])){
				$url = rtrim($_GET['url'], '/');
			}
			$url = explode('/', $url);
			return $url[1];
		}
		
	}	
?>