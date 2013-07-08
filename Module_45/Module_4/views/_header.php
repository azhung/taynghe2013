<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title><?php echo $title; ?> @ Gordon&#39;s Crown</title>

<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>public/css/print.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>public/css/screen.css"/>

<script type="text/javascript" src="<?php echo ROOT; ?>public/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ROOT; ?>public/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo ROOT; ?>public/js/menu.js"></script>
<script type="text/javascript" src="<?php echo ROOT; ?>public/js/rating.js"></script>
<script type="text/javascript" src="<?php echo ROOT; ?>public/js/Tag.js"></script> 



</head>
<body class="home"><!-- class corresponds to current navigation menu -->
	
	<div id="canvas">
		<div id="header">
			<h1>
				<a href="<?php echo ROOT; ?>" title="Gordon&#39;s Crown - Dedicated to delicious British Food">
					<img alt="Gordon&#39;s Crown - Dedicated to delicious British Food" src="<?php echo ROOT; ?>public/img/header.png" />
				</a>
			</h1>
		</div>
		<ul id="menu">
			<li class="home"><a href="<?php echo ROOT; ?>home">Home</a></li>
			<li class="menu"><a href="<?php echo ROOT; ?>menu">Menu</a></li>
			<li class="contact"><a href="<?php echo ROOT; ?>contact">Contact</a></li>
            <?php
				if ($_SESSION['user']=='admin'){
					echo '<li class="login"><a href="'.ROOT.'tagsadmin">Tags</a></li>';
				}
            	if (isset($_SESSION['user'])){
					echo '<li class="logout"><a href="'.ROOT.'logout">Logout</a></li>';
				}else{
					echo '<li class="login"><a href="'.ROOT.'login">Login</a></li>';
				}				
			?>						
		</ul>
		<div id="content">