<?php
	class tagsModel extends Model{
		function __construct(){
			parent::__construct();
		}
		
		//Hien thi tag khi biet id food
		function getTagByIdFood($id){
			$sql = "SELECT tbl_tag.tag_id, tbl_tag.tag_name
					FROM tbl_tag
					INNER JOIN tbl_food_tag ON tbl_tag.tag_id = tbl_food_tag.tag_id
					INNER JOIN tbl_food ON tbl_food.food_id = tbl_food_tag.food_id
					WHERE tbl_food.food_id = '$id' ";
			return parent::toArray($sql);			
		}
		
		//Hien thi food khi click tag
		function getFoodByTag($title){
			$sql = "SELECT *
					FROM tbl_food
					INNER JOIN tbl_food_tag ON tbl_food.food_id = tbl_food_tag.food_id
					INNER JOIN tbl_tag ON tbl_food_tag.tag_id = tbl_tag.tag_id
					WHERE tbl_food_tag.tag_id in (
					SELECT tbl_tag.tag_id
					FROM tbl_tag
					WHERE tbl_tag.tag_name = '$title' )";
			return parent::toArray($sql);
		}
		
		//Hien thi tag khong giong voi tag con lai trong select list
		function getUnlinkTag($food_id){
			$sql = "SELECT tag_name, tbl_tag.tag_id
					FROM tbl_tag
					WHERE tag_id NOT
					IN (
					
					SELECT tbl_tag.tag_id
					FROM tbl_tag
					INNER JOIN tbl_food_tag ON tbl_tag.tag_id = tbl_food_tag.tag_id
					INNER JOIN tbl_food ON tbl_food_tag.food_id = tbl_food.food_id
					WHERE tbl_food.food_id = $food_id)";
			return parent::toArray($sql);
		}
		
		
	}
?>