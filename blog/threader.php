<html <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr">

<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">

</head>

</html>



<?php
require("db.php");
$whois=$_SESSION["kullanici_adi"];
function replace($text) 
		{
	$text = trim($text);
	$search = array("'");
	$replace = array(" ");
	$new_text = str_replace($search,$replace,$text);
	return $new_text;
		}
	
// Thread Sender and flood preventer.
//Şu an doğru çalışmıyor herkesi engelliyor. Konu açma sınırı 20 saniye olacak.
//Yorum yaparken de 10 saniye sınır olacak.
$con=mysqli_connect("localhost","root","merhaba","kullanici");
	
	$a=0;
	 
	if(isset($_COOKIE[$whois]))
	{
		if((time()-$_COOKIE[$whois])>20)
		{
			$LetNewThread = true;
		}
		else
		{		
			$LetNewThread = false;	
		}
	}
	else
	{
		$whois=$_SESSION["kullanici_adi"];
		$LetNewThread = true;
		$cookie_value=time();
		setcookie($whois,$cookie_value,time() + 3600,"/");
	}

	if($LetNewThread)
	{
		$sorgu = mysqli_query($con,"SELECT * FROM konu ORDER BY id DESC LIMIT 0, 1");
		$sorgu2=mysqli_fetch_array($sorgu);
		$peki= $sorgu2["id"];
		$peki++;
		date_default_timezone_set('Europe/Istanbul');
		if( isset ( $_POST["baslik"] ) )
		{
			$baslik=$_POST["baslik"];
			$mesaj=$_POST["mesaj"];
			$baslik=replace($baslik);
			$mesaj=replace($mesaj);
			
		}
		if( !empty($_SESSION["login"]) )
		{
			$gonderen=$_SESSION["kullanici_adi"];
		
			$kaydet=mysqli_query($con,"INSERT INTO konu SET 
				mesaj = '$mesaj',
				gonderen = '$gonderen',
				baslik = '$baslik',
				id='$peki'
				");

				if($kaydet)		
				{
					$cookie_value=time();
					setcookie($whois,$cookie_value,time() + 3600,"/");
					header("location:home.php");
				}
	
		}
		else
		{
			echo "Önce üye girişi yapmalısın";
		}
	
	}
	else	
	{
		print '<script>alert("Yeni bir konu göndermek için 20 saniye beklemelisiniz."); window.location.href="http://localhost/blog/home.php" ;</script>';
	}	 
?>