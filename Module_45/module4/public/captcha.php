<?php
	session_start();
	$captcha = imagecreatefromgif('img/emptycaptcha.gif');	
			
	$brack = imagecolorallocate($captcha, 0, 0, 0);
	$white = imagecolorallocate($captcha, 255, 255, 255);
	$red = imagecolorallocate($captcha, 255, 0, 0);
			
	$string = md5(rand(0, 9999));
	$text = substr($string, 0, 5);
	$_SESSION['code'] = $text;
	
	//imagestring();
	imagestring($captcha, 6, 8, 2, $text, $red);
	imageline($captcha,0, 10, 60, 10, $brack);
			
	//Create
	header('content-type: image/gif');
	imagegif($captcha);						
?>