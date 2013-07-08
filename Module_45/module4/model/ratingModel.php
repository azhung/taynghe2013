<?php
	include_once('libs/Model.php');
	class ratingModel extends Model{
		function __construct(){
			parent::__construct();
		}
		
		function insertRate($food_id, $rate){
			$sql = "INSERT INTO tbl_rates(food_id, mark) values ('".$food_id."', '".$rate."') ";
			$query = mysql_query($sql) or die ('NO');
			echo $sql;
		}		
		
		function showAvg($id){
			$sql = 'SELECT sum(mark)/count(food_id) as avg, count(food_id) as col FROM tbl_rates WHERE food_id = "'.$id.'"';
			$query = mysql_query($sql) or die('NO NO');		
			$kq = array();	
			while ($row = mysql_fetch_array($query)){
				$kq[] = $row;
			}			
			return $kq;
		}
		
		function showRateCategory($id){
			$sql = 'SELECT count(tbl_rates.food_id) AS col, sum(mark)/count(tbl_rates.food_id) AS tong
					FROM (
					tbl_rates
					INNER JOIN tbl_food ON tbl_rates.food_id = tbl_food.food_id
					)
					INNER JOIN tbl_menu ON tbl_food.menu_id = tbl_menu.menu_id
					WHERE tbl_menu.menu_id = "'.$id.'"';
			$query = mysql_query($sql);
			$kq = array();
			while($row = mysql_fetch_array($query)){
				$kq[] = $row;
				//return $row['tong'];
			}
			return $kq;
		}
		
	}
?>