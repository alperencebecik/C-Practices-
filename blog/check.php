

<?php 
error_reporting(0);
$con=mysqli_connect("localhost","root","merhaba","kullanici");
require("db.php");



if(!empty($_GET["uid"]))
{
	$username = $_GET["uid"];
	$uzunluk=strlen($username);
	$j=true;
	$a[$uzunluk];
	
	
	for($i=0;$i<$uzunluk;$i++)
	{
		$a[$i]=ord($username[$i] );
	}
	
	for($u=0;$u<$uzunluk;$u++)
	{
		if($a[$u]=='159' || $a[$u]=='158' )
		{
			echo "Türkçe karakter kullanmasanız daha iyi";
			$j=false;
		}
		else if( $a[$u]=='188' || $a[$u]=='156' )
		{
			echo "Türkçe karakter kullanmasanız daha iyi";
			$j=false;
		}
		else if( $a[$u]=='135' || $a[$u]=='167' )
		{
			echo "Türkçe karakter kullanmasanız daha iyi";
			$j=false;
		}
		else if($a[$u]=='182' || $a[$u]=='150' )
		{
			echo "Türkçe karakter kullanmasanız daha iyi";
			$j=false;
		}
		
	}
	if($j)
	{
		$result = mysqli_query($con,"SELECT * FROM uyelik WHERE kullanici_adi = '$username'");
		if(mysqli_num_rows($result)) 
		{
			echo "Bu kullanıcı adı mevcut. Başka isim seçin";
		} 
		else 
		{
			echo "Kullanıcı adı müsait";
		}
	}
	else
	{
		
	}
}
	






?>