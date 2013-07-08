<?php
	class tagsControl{
		function __construct(){
			
			include_once('model/tagsModel.php');
			$tagView = new tagsModel();

            $tagView = new tagsModel();

            //Get url[1] de lay id tag
            $tagName = $this->getTags();

// Xoa 2 dong sau di
//            $tagG = $tagView->getTag(0,$tagName);
//            $tagId = $tagG['tag_id'];

            $tgView = $tagView->getTagByTitle($tagName);
            include_once('view/tags/index.php');
		}
		
		function getTags(){
			$url = $_GET['url'];						
			$url = explode('/', $url);
			return $url[1];
		}
		
	}
?>