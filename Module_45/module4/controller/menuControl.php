<?php
	include_once('libs/Controller.php');
	class menuControl extends Controller{
		function __construct(){
			parent::render('menu');
			
			$item = new menuModel();
			$menu = $item->getSideBar();
			$title_url = 'Menu';	
			
			//Show Rate Menu	
			include_once('model/ratingModel.php');
			$menuRate = new ratingModel();
			//$rateCate = $menuRate->showRateCategory('3');
			
			
			include_once('libs/Core.php');			
			include_once('view/menu/index.php');			
		}
	}
?>