<?php
    if (file_exists('libs/Model.php')) include_once('libs/Model.php');
    else include_once('../libs/Model.php');

	class tagsModel extends Model{
		function __construct(){

			parent::__construct();
		}
//____________________ thêm hàm phục vụ ajax module 5

        function getTag($id, $title)
        {
            if ($title == '')
                $sql = "SELECT * FROM tbl_tag WHERE tbl_tag.tag_id = $id";
            else
                $sql = "SELECT * FROM tbl_tag WHERE tbl_tag.name = '$title'";

            $query = mysql_query($sql);
            return mysql_fetch_array($query);
        }

        function isExist($tag_title)
        {
            $sql = "SELECT * FROM tbl_tag WHERE tbl_tag.name = '$tag_title'";
            $query = mysql_query($sql);
            return mysql_num_rows($query);
        }

        function add($tag_title)
        {
            $sql = "INSERT INTO `tbl_tag`(`tag_id`, `name`) VALUES (0,'$tag_title')";
            $query = mysql_query($sql);
        }

        function attachTagToFood($tag_id, $food_id)
        {
            $sql = "INSERT INTO `tbl_food_tag`(`tag_id`, `food_id`) VALUES ($tag_id, $food_id)";
            $query = mysql_query($sql);
        }

        function detachTagFromFood($tag_id, $food_id)
        {
            $sql = "DELETE FROM `tbl_food_tag` WHERE `tag_id` = $tag_id AND `food_id` = $food_id";
            $query = mysql_query($sql);
        }

//________________________  end thêm hàm


        // ---> Thay tên thành getTagsById/  hoặc getFoodsFromTag và chuyển sang food model
		function getTagByTitle($title){
			$sql = "SELECT *
					FROM tbl_food
					INNER JOIN tbl_food_tag ON tbl_food.food_id = tbl_food_tag.food_id
					INNER JOIN tbl_tag ON tbl_tag.tag_id = tbl_food_tag.tag_id
					WHERE tbl_tag.tag_id IN (SELECT tag_id FROM tbl_tag WHERE name = '$title')";
			$query = mysql_query($sql);
			$kq = array();
			while ($row = mysql_fetch_array($query)){
				$kq[] = $row;
			}
			return $kq;
		}

        // Bỏ hàm này đi vì có hàm getTag rồi
//        function getTagByTitle($tittle){
//			$sql = "SELECT * FROM tbl_tag WHERE name = '$tittle' ";
//			$query = mysql_query($sql);
//			while ($row = mysql_fetch_array($query)){
//				return $row['tag_id'];
//			}
//		}
			
	}
?>