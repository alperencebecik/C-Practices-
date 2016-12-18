<!DOCTYPE html>
<html>
<title>Kayıt ol</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">

<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="StyleOfAll.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>

<script>
var form = document.getElementById("form-id");

document.getElementById("your-id").addEventListener("click", function () {
  form.submit();
});


 </script>
 
<body class="w3-light-grey w3-content" style="max-width:1600px">

<nav class="w3-sidenav w3-collapse w3-black w3-animate-left" style="z-index:3;width:200px;" id="mySidenav"><h3 id="headerofsite" > Altın İmalat </h3>
  	<p id="description" >Altın İmalat ile ilgili her şey.. </p>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4 class="w3-padding-0"><b></b></h4>
  </div>
   <a href="home.php" onclick="w3_close()" class="w3-padding     w3-hover-black ne "><i class="fa fa-th-large fa-fw w3-margin-right"></i><span id="NavLeft" > Bugün</span> </a>
  <a href="hakkinda.php" onclick="w3_close()"     class="w3-padding     w3-hover-black ne "><i class="fa fa-user fa-fw w3-margin-right"></i><span id="NavLeft"> Hakkında</span></a>
  <a href="#contact" onclick="w3_close()"   class="w3-padding     w3-hover-black ne "><i class="fa fa-envelope fa-fw w3-margin-right"></i><span id="NavLeft" > İletişim</span></a>
  <form class="w3-container w3-card-4" action="form.asp">

 <!-- <select class="w3-select w3-border w3-tiny" name="option">
    <option value="" disabled selected>Listelemek İçin Tarih Seçin</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>-->
</form>
   
 
</nav>

<!-- Left nav opening for small screens -->

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
</body>


</html>

<?php
require("db.php");

$con=mysqli_connect("localhost","root","merhaba","kullanici");



if(isset($_POST["kullanici_adi"])  )
{
		$kullanici_adi=$_POST["kullanici_adi"];
		$sifre=$_POST["sifre"];
		$sifretekrar=$_POST["sifretekrar"];
	if(!empty($kullanici_adi) && !empty($sifre))
	{
		if(!empty($sifretekrar))
		{
			$register=mysqli_query($con,"INSERT INTO uyelik SET
					kullanici_adi='$kullanici_adi',
					sifre='$sifre',
					yetki= '0'
						");
 
		if($register)
		{
				echo '<div class="w3-center">
				<p> Kayıt işlemi başarılı</p>
				</div>
	 
				';
		}
		else
		{		
				echo '<div class="w3-center">
				<p> Kayıt sırasında bir hata oldu tekrar deneyin.</p>
								<a href="register.php"> Yeniden Denemelisin</a>

				</div>
	 
				';
		}
		}
		else
		{
			echo '<div class="w3-center">
				<p> Eksik alanları doldur.</p>
				<a href="register.php"> Yeniden Denemelisin</a>
				</div>
	 
				';
		}
		
	}
	else
	{
		echo '<div class="w3-center">
				<p> Eksik alanları doldur.</p>
				<a href="register.php"> Yeniden Denemelisin</a>
				</div>
	 
				';
	}
	

}








?>