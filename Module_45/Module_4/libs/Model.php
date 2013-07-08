<?php
	class Model{
		function __construct(){
			include_once('config.php');
			$this->connect();
		}
		//Connect toi database
		function connect(){
			$conn = mysql_connect(HOST, USER, PASS) or die ("Cound not connect");
			$db = mysql_select_db(DB_NAME, $conn);
			mysql_query("SET NAMES UTF8");
		}
		
		function toArray($sql){
			$query = mysql_query($sql);
			
			$kq = array();
			while ($row = mysql_fetch_array($query)){
				$kq[] = $row;
			}
			return $kq;
		}						
			
	}
?>