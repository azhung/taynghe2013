<?php
	include_once('libs/Model.php');
	class menuModel extends Model{
		function __construct(){
			parent::__construct();
		}
		
		function getSideBar(){
			$sql = "SELECT * FROM tbl_menu";
			$query = mysql_query($sql);
			$kq = array();
			while ($row = mysql_fetch_array($query)){
				$kq[] = $row;
			}
			return $kq;
		}
		
		function getCategory($id){
			$sql = "SELECT * FROM tbl_food WHERE menu_id = '$id' ";
			$query = mysql_query($sql);
			$kq = array();
			while ($row = mysql_fetch_array($query)){
				$kq[] = $row;
			}
			return $kq;
		}
				
				
	}
?>