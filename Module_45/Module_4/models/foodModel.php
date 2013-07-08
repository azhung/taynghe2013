<?php
	class foodModel extends Model{
		function __construct(){
			parent::__construct();
		}
		
		//Get Food By Alias
		function getFoodByAlias($alias){
			$sql = "SELECT * FROM tbl_food WHERE alias = '".$alias."' ";
			$query = mysql_query($sql);
			while ($row = mysql_fetch_array($query)){
				return $row;
			}
		}
		//Get Title Category by Alias
		function getCatByAlias($alias){
			$sql = "SELECT tbl_cat.cat_name
					FROM tbl_cat
					INNER JOIN tbl_food ON tbl_cat.cat_id = tbl_food.food_id
					WHERE tbl_food.alias = '".$alias."' ";
			$query = mysql_query($sql);
			$row = mysql_fetch_array($query);
			return $row;			
		}
		
		
		
	}		
		
?>