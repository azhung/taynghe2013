<?php
	class menuController{
		function __construct(){
			//Title
			$title = "Menu";
			include_once('models/menuModel.php');
			//Category
			$catMdl = new menuModel();
			$cat = $catMdl->getCat();
			//Get Food By Id
			//$titFood = $catMdl->getFoodById(1);
			//Diem trung binh cua category
			//$catAvg = $catMdl->showAvgCat(1);
			
			include_once('views/menu/index.php');
		}
	}
?>