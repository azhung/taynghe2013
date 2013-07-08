<?php
	include_once('libs/Model.php');
	class articleModel extends Model{
		function __construct(){
			parent::__construct();
		}
		
		function getData($alias){
			$sql = "SELECT * FROM tbl_food WHERE alias = '$alias' ";
			$query  = mysql_query($sql);
			$rows = mysql_fetch_array($query);
			return $rows;
		}				
		
		function getMenu($id){
			$sql = "SELECT * FROM tbl_menu WHERE menu_id = $id ";
			$query = mysql_query($sql);
			$row = mysql_fetch_array($query);
			return $row['name'];			
		}
		
		function getTags($food_id){
			$sql = "SELECT name, tbl_tag.tag_id
					FROM tbl_tag
					INNER JOIN tbl_food_tag ON tbl_tag.tag_id = tbl_food_tag.tag_id
					INNER JOIN tbl_food ON tbl_food_tag.food_id = tbl_food.food_id
					WHERE tbl_food.food_id = $food_id";
			$query = mysql_query($sql);	
			$kq = array();
			while ($row = mysql_fetch_array($query)){
				$kq[] = $row;
			}
			return $kq;		
		}
		
		function getTagAll($id){
			$sqlid = "SELECT tbl_tag.tag_id FROM tbl_tag
					INNER JOIN tbl_food_tag ON tbl_tag.tag_id = tbl_food_tag.tag_id
					INNER JOIN tbl_food ON tbl_food_tag.food_id = tbl_food.food_id
					WHERE tbl_food.food_id = $id";
					
			$sql = "SELECT * FROM tbl_tag WHERE tag_id NOT IN ($sqlid)";
			$query = mysql_query($sql) or die(mysql_error());	
			$kq = array();
			while ($row = mysql_fetch_array($query)){
				$kq[] = $row;
			}
			return $kq;		
		}
		
	}
?>