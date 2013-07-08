<?php
	include_once('libs/Core.php');
	class homeControl extends Core{
		function __construct(){												
			
			$title_url = 'Home';	
			include_once('view/home/index.php');
		}
	}
?>