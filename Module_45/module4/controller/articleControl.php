<?php
	class articleControl{
		function __construct(){
			
			include_once('model/articleModel.php');
			include_once('libs/Router.php');			
			include_once('model/ratingModel.php');			
			
			$alias = Router::getAlias();
			
			$articleM = new articleModel();
			$article = $articleM->getData($alias);				
						
			$tieude = $articleM->getMenu($article['food_id']);
			$tag = $articleM->getTags($article['food_id']);
			
			//Select List
			$selectList = $articleM->getTagAll($article['food_id']);
			foreach ($selectList as $sl){ echo $sl['name']; }
			
			//Handle Show Rating
			$rate = new ratingModel();
			$avg = $rate->showAvg($article['food_id']);
											
			//Handle Rating
			$this->rate($article['food_id']);
			
			if ($_SESSION['user'] == 'admin'){
				include_once('admin/index.php');
			}else{
				include_once('view/food/index.php');
			}						
			
		}
		
		
		function rate($food_id){
			
			if (isset($_POST['ok'])){
				$mark = $_POST['rating'];	
				
				$rate = new ratingModel();         
				
				if ($_POST['captcha_input'] == $_SESSION['code']){
					//khai báo mảng					
					$foodItem = array();
					//Nếu không có session['item'] thì khởi tạo bằng mảng
					if (!isset($_SESSION['item'])){
						$_SESSION['item'] = $foodItem;
					}
					//nếu food_id bình chọn đã có trong mảng rồi thì không cho thao tác tiếp
					if (in_array($food_id, $_SESSION['item'])){
						echo "Da Binh Chon";
					}else{
						//thêm một phần tử vào mảng
						array_push($_SESSION['item'],$food_id);
						print_r($_SESSION['item']);
						$rate->insertRate($food_id, $mark);
					}
				}
				
			}				
		}
									
	}
?>