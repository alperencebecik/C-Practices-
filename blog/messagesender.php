<?php
require("db.php");
error_reporting(-1);
ini_set('display_errors','On');

$con=mysqli_connect("localhost","root","merhaba","kullanici");


	$sender=$_GET["sender"];
	$receiver=$_GET["receiver"];
	$baslik=$_GET["baslik"];



$whois=$_SESSION["kullanici_adi"];

date_default_timezone_set('Europe/Istanbul');

if(isset($_COOKIE[$whois]))
	{
		if((time()-$_COOKIE[$whois])>10)
		{
			$LetTheMessage = true;
		}
		else
		{		
			$LetTheMessage= false;	
		}
	}
	else
	{

		$LetTheMessage = true;
		$cookie_value=time();
		setcookie($whois,$cookie_value,time() + 3600,"/");
	}

if($LetTheMessage)
{
if( empty($_GET["new"])   )   //ilk mesaj değil
{
	$sifir=0;

	if($_SESSION["kullanici_adi"] == $receiver)
	{
		$mesaj=$_POST["reply"];
		$length=strlen($mesaj);
		if( $length>5 )
		{
		


		$sorgu = mysqli_query($con,"SELECT * FROM mesaj ORDER BY id DESC LIMIT 0, 1");
		$sorgu2=mysqli_fetch_array($sorgu);
		$peki= $sorgu2["id"];
		$peki++;
	$kaydet=mysqli_query($con,"INSERT INTO mesaj SET 
				mesaj = '$mesaj',
				gonderen = '$receiver',
				alici= '$sender', 
				id='$peki',
				baslik='$baslik',
				okundu='$sifir'
				");
			if($kaydet)
			{
				$cookie_value=time();
				setcookie($whois,$cookie_value,time() + 3600,"/");
				header("location:message.php?sender=$sender&receiver=$receiver&baslik=$baslik");
			}
		
		

			
		}
		else
		{
			print '<script>alert("5 karakterden kısa mesaj gönderemezsiniz");window.location.href="message.php?sender='.$sender.'&receiver='.$receiver.'&baslik='.$baslik.' ";</script>';
		}
	}
}
else
{


	if($_SESSION["kullanici_adi"] == $sender)
	{
		$mesaj=$_POST["mesaj3"];
		$baslik2=$_POST["baslik"];
		$length=strlen($mesaj);
		if($length>5)
		{
			$sorgu = mysqli_query($con,"SELECT * FROM mesaj ORDER BY id DESC LIMIT 0, 1");
		$sorgu2=mysqli_fetch_array($sorgu);
		$peki= $sorgu2["id"];
		$peki++;
	
	$kaydet2=mysqli_query($con,"INSERT INTO mesaj SET
					alici='$receiver',
					gonderen='$sender',
					id='$peki',
					baslik='$baslik2',
					okundu=0,
					mesaj='$mesaj'
						");
			if($kaydet2)
			{
				$cookie_value=time();
				setcookie($whois,$cookie_value,time() + 3600,"/");
				print '<script>alert("Mesajınız gönderildi");window.location.href="home.php";</script>';
			}
		}
	else
	{
		print '<script>alert("5 Karakterden kısa mesaj gönderemezsiniz");window.location.href="who.php?who='.$receiver.'";</script>';
	}
		
	
	
	}
}

}
	else	
	{
		print '<script>alert("10 saniyede bir mesaj gönderebilirsiniz");window.location.href="message.php?sender='.$sender.'&receiver='.$receiver.'&baslik='.$baslik.' ";</script>';
	}	 



?>