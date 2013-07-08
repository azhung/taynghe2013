<?php

    /*
     * Backend-functionality for the ajax script
     * It generates a (here still static) response to the requests (actions add, create and remove)
     */


    //Lấy dữ liệu được gửi từ AJAX qua POST
    $a = array();
    $a['code'] = 1; // return code: 1 = we're good to go, 2 = unspecified error
    $a['idTag'] = $_POST['idTag'] > 0 ? $_POST['idTag'] : 0; // id of tag (submitted / to send back)
    $a['idMenu'] = $_POST['idMenu']; // id of menu (submitted / to send back)
    $a['content'] = $_POST['content']; // content of tag (submitted / to send back)
    $a['contenturl'] = $_POST['content'] . $_POST['idMenu']; // content of tag for url eg. without blanks (submitted / to send back)

    $a['result'] = true; // quyết định tag mới nhập có được thêm vào CSDL hay không.

    // chú ý khi include file từ đây và include file từ index thì path sẽ khác nhau.  --> sửa code include cho cả 2 trường hợp ở tất cả các file liên quan include: ví dụ: tagsModel.php và Model.php
    include_once ('../model/tagsModel.php');
    $tagModel = new tagsModel();



    if ($_POST['action'] == 'create' or $_POST['action'] == 'add')
    {
        // __________________ trường hợp 1:   chọn tag từ select-list thì phải suy ra tên tag từ tag_id vừa lấy được.
        if ($a['idTag'] > 0) {
            $tag = $tagModel->getTag($a['idTag'], '');
            $a['content'] = $tag['name'];
        }

        // _________________ trường hợp 2: nhập tag mới từ text box
        if ($a['idTag'] == 0  and  $_POST['action'] == 'create') {
            //Nếu tên tag chưa tồn tại trong bảng tag thì thêm tag mới vào bảng tag --> INSERT INTO tbl_tags
            if (!$tagModel->isExist($a['content']))
                $tagModel->add($a['content']);

            //cập nhật lại giá trị tag_id để hiển thị lên html
            $newTagFromDb = $tagModel->getTag(0, $a['content']);
            $a['idTag'] = $newTagFromDb['tag_id'];
        }


        //Sau đó thêm tag mới cho food trong CSDL --> INSERT INTO tbl_food_tags
        $tagModel->attachTagToFood($a['idTag'], $a['idMenu']);
    }



    // Remove tag from food in database (but retain tags in tags table)
    if ($_POST['action'] == 'remove')
    {
        $tagModel->detachTagFromFood($a['idTag'], $a['idMenu']);
    }

    // Kiểm tra Trường hợp Nhâp tags mới trùng hợp với danh sách
    if ($_POST['action'] == 'validate_new_tag')
    {
        $a['result'] = $tagModel->isExist($a['content']) ? false : true;
    }

    echo json_encode($a); // creates parsable json string
?>