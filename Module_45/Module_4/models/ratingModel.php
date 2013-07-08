<?php
	class ratingModel extends Model{
		function __construct(){
			parent::__construct();
		}
		
		function insertRate($food_id, $mark){
			$sql = "INSERT INTO tbl_rate(food_id, mark) values ('$food_id', '$mark')";
			$query = mysql_query($sql);
		}
		
		function showAvgCat($id){
			
		}
		
		function showAvgFood($id){
			$sql = "SELECT count(food_id) AS soluong, sum(mark)/count(food_id) as trungbinh
					FROM tbl_rate
					WHERE food_id = '".$id."' ";
			
			return parent::toArray($sql);						
		}
				
	}
?>