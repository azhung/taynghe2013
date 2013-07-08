<?php
	session_start();
	$cap = imagecreatefromgif('img/emptycaptcha.gif');
	
	$black = imagecolorallocate($cap, 0, 0, 0);
	$red = imagecolorallocate($cap, 255, 0, 0);
	
	$string = md5(rand(0, 9999));
	$text = substr($string, 0, 5);
	$_SESSION['code'] = $text;
	
	imagestring($cap, 6, 8, 2, $text, $red);
	imageline($cap, 0, 10, 60, 10, $black);
	
	header('content-type: image/gif');
	imagegif($cap);
?>