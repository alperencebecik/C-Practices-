<!DOCTYPE html>
<html>
<title>Blog</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="StyleOfAll.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>

<body class="w3-light-grey w3-content" style="max-width:1600px">

<div id="id01" class="w3-modal">
    <div id="id02" class="w3-modal-content w3-card-8 w3-animate-top">
      <header class="w3-container w3-theme-l1">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn">×</span>
			<?php 
			require("db.php");

				if( !empty($_SESSION["login"]) )
				{
				echo ' <h4>Yeni Bir Konu Açmak Üzeresiniz</h4>
					</header>
	  
					<div id="xx2" class="w3-padding-4">
						<div id="hm2" class="w3-card-4">
							<div  id="hm2" class="w3-container w3-grey">
    
					</div>
							<form class="w3-container" action="threader.php" id="uform" method="POST">
    
									<p>
										<label class="w3-label w3-text-grey"><b> Başlık </b></label>
										<input class="w3-input w3-border w3-green" name="baslik" type="text">
									</p>
	
									<p>
										<label class="w3-label w3-text-grey"><b> İçerik </b></label>
									</p>
	
							<textarea id="TextForNewThread" rows="4" cols="50" name="mesaj" class="w3-input w3-border w3-light-grey w3-autosize" placeholder="......"  form="uform">
							</textarea>
	
					

				<button class="w3-btn w3-black w3-hover-red">Konuyu Gönder</button></p>
				</form>
						</div>
						</div>';
				}
				else
				{
					echo "Konu Açmak İçin Üye Girişi Yapmalısın";
				}
		  
	  
    ?> 
		</div>
			</div>
	
	

	
<!-- Left nav  -->
<nav class="w3-sidenav w3-collapse w3-black w3-animate-left" style="z-index:3;width:200px;" id="mySidenav"><h3 id="headerofsite" > Altın İmalat </h3>
  	<p id="description" >Altın İmalat ile ilgili her şey.. </p>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4 class="w3-padding-0"><b></b></h4>
  </div>
  <a href="home.php" onclick="w3_close()" class="w3-padding w3-text-teal w3-hover-black"><i class="fa fa-th-large fa-fw w3-margin-right"></i><span id="merhaba2" > Bugün</span></a>
  
  <a href="hakkinda.php" onclick="w3_close()" class="w3-padding w3-hover-black"><i class="fa fa-user fa-fw w3-margin-right"></i><span id="merhaba"> Hakkında </span> </a>
  <a href="#contact" onclick="w3_close()" class="w3-padding w3-hover-black "><i class="fa fa-envelope fa-fw w3-margin-right"></i><span id="merhaba"> İletişim </span> </a>
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

<!-- General page attribute -->
<div class="w3-main" style="margin-left:200px">
<div class="w3-right-align">
<?php

if( empty ($_SESSION["login"]) )
{
	echo '
	<a class="w3-btn w3-light-grey w3-tiny w3-hover-black" href="register.php"> Üye Ol</a>
	<a class="w3-btn w3-light-grey w3-tiny w3-hover-black" href="login.php"> Giriş </a>';
}
else
{
	echo '	<a href="message.php" id="MessageLink" class="w3-btn w3-light-grey w3-hover-green"> <i class="material-icons" id="MessageIcon" style="font-size:30px">mail_outline</i></a>
';
	echo '
	<a class="w3-btn w3-light-grey w3-tiny w3-hover-black " id="CikisButton" href="logout.php"> Çıkış </a>';
}


?>



</div>
  <!-- Header -->
  <header class="w3-container" id="portfolio">
    <span class="w3-opennav w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <h3><b>Son Gönderiler</b></h3>
 
  </header>
 	<button class="w3-btn NewThreadButton w3-round" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;"><b id="SubmitTheThread">Konu Aç</b></button>

  <!-- Threads -->
  

    </ul>
  </div>

 <br>
 <br>
 <br><br>
 

  
  

</div>

<script>
// Mobil için sidenav opener/closer
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>

