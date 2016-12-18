
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="tr">
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
</html>
<?php


error_reporting(-1);
ini_set('display_errors','On');
$con=mysqli_connect("localhost","root","merhaba","kullanici");
require("db.php");
	$threadnumber=$_GET["threadnumber"];
$gotowhere=mysqli_query($con,"SELECT * FROM yorum where threadno=$threadnumber");
	$gotowhere2=mysqli_num_rows($gotowhere);

	$gotowhere2=$gotowhere2/15;
	$gotowhere2=intval($gotowhere2);
	$gotowhere2++;
	$whois=$_SESSION["kullanici_adi"];	
if(isset($_COOKIE[$whois]))
	{
		if((time()-$_COOKIE[$whois])>10)
		{
			$LetTheComment = true;
		}
		else
		{		
			$LetTheComment= false;	
		}
	}
	else
	{

		$LetTheComment = true;
		$cookie_value=time();
		setcookie($whois,$cookie_value,time() + 3600,"/");
	}


if($LetTheComment)
{
	if($_SESSION["login"])
{
	$sorgu = mysqli_query($con,"SELECT * FROM yorum ORDER BY id DESC LIMIT 0, 1");
	$sorgu2=mysqli_fetch_array($sorgu);
	$peki= $sorgu2["id"];
	$peki++;
	
	$gonderen=$_SESSION["kullanici_adi"];
	$yorum=$_POST["yorum"];

	$sendthecomment=mysqli_query($con,"INSERT INTO yorum SET
				gonderen='$gonderen',
				yorum = '$yorum',
				id='$peki',
				threadno = '$threadnumber'
				
	");
	
	if($sendthecomment)
	{
		$cookie_value=time();
		setcookie($whois,$cookie_value,time() + 3600,"/");
		header("location:thread.php?t=$threadnumber&page=$gotowhere2");
	}
	else
	{
		echo "problem";
	}
}

}
else
{
	print '<script>alert("10 saniyede bir yorum yazabilirsiniz");window.location.href="thread.php?t='.$threadnumber.'&page='.$gotowhere2.' ";</script>';
}







?>