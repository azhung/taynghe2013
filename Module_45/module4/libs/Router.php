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
			$path = 'controller/'.$index.'Control.php';
			if (file_exists($path)){
				include_once($path);
				$string = $index.'Control';
				new $string;
			}else{
				echo "NO PATH";
			}						
		}
		
		public static function getAlias(){
			if (isset($_GET['url'])){
				$url = rtrim($_GET['url']);
			}
			$url = explode('/', $url);
			return $url[1];
		}
		
	}
?>