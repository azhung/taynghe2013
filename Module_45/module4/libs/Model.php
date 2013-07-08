<?php
	class Model{
		function __construct(){
            //sửa lại code include để dùng cho cả trường hợp include Model từ AJAX (đường dẫn sẽ khác)
            if (file_exists('config.php')) include_once('config.php');
            else include_once('../config.php');
            // end sửa code

			$conn = mysql_connect(HOST, USER, PASS) or die ('Could not connect to database');
			$db = mysql_select_db(DATA, $conn);
			mysql_query('SET NAMES UTF8');
		}
		
		/*function showArray($sql){
			
			$query = mysql_query($sql);
			$kq = array();
			while ($row = mysql_fetch_array($query)){
				$kq[] = $row;
			}
			return $kq;
		}*/
		
	}
?>