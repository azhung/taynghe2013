<?php 

/*
 * Backend-functionality for the ajax script
 * It generates a (here still static) response to the requests (actions add, create and remove)
 */ 

$a = array();
$a['code'] = 1; // return code: 1 = we're good to go, 2 = unspecified error
$a['idTag'] = 3; // id of tag (submitted / to send back)
$a['idMenu'] = 4; // id of menu (submitted / to send back)
$a['content'] = "Testtag 1"; // content of tag (submitted / to send back)
$a['contenturl'] = "Testtag-1"; // content of tag for url eg. without blanks (submitted / to send back)
echo json_encode($a); // creates parsable json string

?>