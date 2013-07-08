<?php
	class tagsController{
		function __construct(){
			
			include_once('libs/Router.php');
			//Lay Ten tag ten URL
			$tagRou = Router::getAlias();
			//Hien Thi bai viet lien quan
			include_once('models/tagsModel.php');
			$tagMdlView = new tagsModel();
			$tagView = $tagMdlView->getFoodByTag($tagRou);
			
			include_once('views/tags/index.php');
		}
	}
?>