<?php
	class Core{
		function __construct(){
		
		}
		
		public static function replaceUrl($index){
			$title = strtolower($index);
			$title = str_replace(' ', '-', $title);	
			$title = str_replace("'", '', $title);
			return $title;
		}		
	}
?>