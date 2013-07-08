<?php
	class foodController{
		function __construct(){
			include_once('libs/Router.php');
			include_once('models/foodModel.php');
			include_once('models/ratingModel.php');
			include_once('models/tagsModel.php');
			$foodMdl = new foodModel();
			//Get Alias			
			$aliasRou = Router::getAlias();
			//Lay food theo alias
			$foodInfo = $foodMdl->getFoodByAlias($aliasRou);
			//Lay Cat bang Alias			
			$catInfo = $foodMdl->getCatByAlias($aliasRou);			
			//Title
			$title = $foodInfo['title'];
			//Binh Chon
			$rate = $this->handleRate($foodInfo['food_id']);
			//Hien Thi Binh Chon
			$rateMdl = new ratingModel();
			$viewRate = $rateMdl->showAvgFood($foodInfo['food_id']);
			//Hien Thi Tag
			$tagMdl = new tagsModel();
			$tagView = $tagMdl->getTagByIdFood($foodInfo['food_id']);
			//Hien thi List Select khong trung voi tag da co
			$selectList = $tagMdl->getUnlinkTag($foodInfo['food_id']);
							
			//Kiem tra neu la admin thi load admin
			if ($_SESSION['user']=='admin'){
				include_once('admin/food/index.php');
			}else{
				include_once('views/food/index.php');
			}						
		}				
		
		function handleRate($food_id){
			include_once('models/ratingModel.php');
			$rateMdl = new ratingModel();
			$kq;
			if (isset($_POST['rate'])){
				$mark = $_POST['rating'];
				$captcha = $_POST['captcha_input'];
				
				if ($_SESSION['code'] == $captcha){
					$foodItem = array();
					if (!isset($_SESSION['item'])){
						$_SESSION['item'] = $foodItem;
					}
					if (!in_array($food_id, $_SESSION['item'])){
						array_push($_SESSION['item'], $food_id);
						print_r($_SESSION['item']);
						$rateMdl->insertRate($food_id, $mark);
					}				
				}else{
					$kq = "Text did not match the text on the CAPTCHA image. Try again with a new one!";
				}
			}
			return $kq;
		}
		
	}
?>