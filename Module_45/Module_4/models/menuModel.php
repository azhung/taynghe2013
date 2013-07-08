<?php
	class menuModel extends Model{
		function __construct(){
			parent::__construct();
		}
		
		//Lay du lieu tu bang cat cho vao category
		function getCat(){
			$sql = "SELECT * FROM tbl_cat";
			return parent::toArray($sql);
		}
		
		function getFoodById($id){
			$sql = "SELECT * FROM tbl_food WHERE cat_id = '".$id."' ";
			return parent::toArray($sql);
		}
		
		function showAvgCat($cat_id){
			$sql = "SELECT count( tbl_rate.food_id ) AS soluong, sum( mark ) / count( tbl_food.food_id ) AS trungbinh
					FROM tbl_rate
					INNER JOIN tbl_food ON tbl_rate.food_id = tbl_food.food_id
					INNER JOIN tbl_cat ON tbl_food.cat_id = tbl_cat.cat_id
					WHERE tbl_cat.cat_id = '$cat_id' ";
			return parent::toArray($sql);
		}
		
	}
?>