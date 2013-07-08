<?php	
	class userModel extends Model{
		function __construct(){
						
			parent::__construct();
		}
		
		//Ham kiem tra xem da ton tai chua
		function isExist($u, $p){
			$sql = "SELECT * FROM tbl_user WHERE username = '".$u."' AND password = '".md5($p)."' ";
			$query = mysql_query($sql) or die (mysql_error());
			$row = mysql_num_rows($query);
			return $row;
		}		
	}
?>