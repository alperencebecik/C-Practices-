<?php
$con=mysqli_connect("localhost","root","merhaba","kullanici");

require("db.php");


if(empty($_GET["MessageId"]) )
{
	$baslik=$_GET["baslik"];
	$threadno=$_GET["threadno"];
	$sil=mysqli_query($con,"DELETE from konu where baslik='$baslik'");
	$sil2=mysqli_query($con,"DELETE from yorum where threadno='$threadno'");
	if($sil)
	{
		header("location:home.php");
	}
}
else
{
	$MessageId=$_GET["MessageId"];
	$Threadno=$_GET["threadno"];
	$Page=$_GET["page"];
	$sil3=mysqli_query($con,"DELETE from yorum where id='$MessageId'");
	if($sil3)
	{
		header("location:thread.php?t=$Threadno&page=$Page");
	}
}


?>