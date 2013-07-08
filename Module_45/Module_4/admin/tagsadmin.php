<?php 

/*
 * Backend-functionality for the ajax script
 * It generates a (here still static) response to the requests (actions add, create and remove)
 */ 

$a = array();
$a['code'] = 1; // return code: 1 = we're good to go, 2 = unspecified error
$a['idTag'] = $_POST['idTag'] > 0 ? $_POST['idTag'] : 0; // id of tag (submitted / to send back)
$a['idMenu'] = $_POST['idMenu']; // id of menu (submitted / to send back)
$a['content'] = $_POST['content']; // content of tag (submitted / to send back)
$a['contenturl'] = $_POST['content'].$_POST['idMenu']; // content of tag for url eg. without blanks (submitted / to send back)
echo json_encode($a); // creates parsable json string

?>