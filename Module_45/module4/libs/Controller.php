<?php
	class Controller{
		function __construct(){

		}
		
		public static function render($index){
			include_once('model/'.$index.'Model.php');
		}

        function getParam($index)
        {
            $url = explode('/', $_GET['url']);
            return ( !empty($url[$index]) ? $url[$index] : '');
        }
		
	}
?>