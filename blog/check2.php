<?php
require("db.php");

	/*	$requestURI = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		echo $requestURI;*/
	if(!empty($_GET["firstsifre"])   )
	{
		$firstsifre = $_GET["firstsifre"];
		$secondsifre=$_GET["secondsifre"];
		if($firstsifre!=$secondsifre)
		{
			echo "Şifreler uyuşmuyor";
		}
	}
	else
	{
		echo "Şifre boş bırakılamaz";
	}
	
	
	
	
?>