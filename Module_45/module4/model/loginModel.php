<?php
	include_once('libs/Model.php');
	class loginModel extends Model{
		function __construct(){
			parent::__construct();
		}
		
		function getUser($u, $p){
			$sql = "SELECT * FROM tbl_users WHERE email = '".$u."' AND password = '".md5($p)."' ";
			$query = mysql_query($sql);
			
			$row = mysql_num_rows($query);
			return $row;
		}
		
		function getUserId($u, $p){
			$sql = "SELECT * FROM tbl_users WHERE email = '".$u."' AND password = '".md5($p)."' ";
			$query = mysql_query($sql);			
			$row = mysql_fetch_array($query);
			return $row;		
		}
						
	}
?>