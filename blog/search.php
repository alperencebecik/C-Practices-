<!DOCTYPE html>
<html>
<title>Altın imalat</title>
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
  <a href="home.php" onclick="w3_close()" class="w3-padding w3-hover-black"><i class="fa fa-newspaper-o fa-fw w3-margin-right"></i>
  <span id="NavLeft"> Bugün </span> </a>
  
  <a href="hakkinda.php" onclick="w3_close()" class="w3-padding w3-hover-black"><i class="fa fa-chevron-circle-right fa-fw w3-margin-right"></i>
  <span id="NavLeft"> Hakkında </span> </a>

  <a href="#contact" onclick="w3_close()" class="w3-padding w3-hover-black "><i class="fa fa-envelope fa-fw w3-margin-right"></i>
  <span id="Navleft"> İletişim </span> </a>
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
require("db.php");

$con=mysqli_connect("localhost","root","merhaba","kullanici");

if( empty ($_SESSION["login"]) )
{
	echo '
	<a class="w3-btn w3-light-grey w3-tiny w3-hover-black" href="register.php"> Üye Ol</a>
	<a class="w3-btn w3-light-grey w3-tiny w3-hover-black" href="login.php"> Giriş </a>';
}
else
{
	$TheRank=mysqli_query($con,"SELECT * from uyelik where yetki");
	$TheRank2=mysqli_fetch_array($TheRank);
	
	if($TheRank2["yetki"]==1 )
	{
		//	echo '<a  style="text-decoration:none; color:red; font-weight:bold; background-color:light-grey; border-style:solid; border-color:green; padding-left:5px;" href="moderation.php"> M </a> ';
			$alici=$_SESSION["kullanici_adi"];
			echo '&nbsp&nbsp';
			$b=0;
			$NewMessage=mysqli_query($con,"SELECT * from mesaj where alici='$alici' and okundu='$b'   ");
			$IsThereNewMessage=mysqli_num_rows($NewMessage);

		echo '<a href="who.php?who='.$alici.' " >'; echo $_SESSION["kullanici_adi"];    echo '</a>';
		if(!$IsThereNewMessage)
		{
			echo '	<a href="message.php" id="MessageLink" class="w3-btn w3-light-grey w3-hover-green"> <i class="material-icons" id="MessageIcon" style="font-size:30px">mail_outline</i></a>';
			
		}
		else
		{
			echo '	<a href="message.php" id="MessageLink" class="w3-btn w3-green w3-hover-green"> <i class="material-icons" id="MessageIcon" style="font-size:30px">mail_outline</i></a>';
			
		}
	
	echo '
	<a class="w3-btn w3-light-grey w3-tiny w3-hover-black " id="CikisButton" href="logout.php"> Çıkış </a>';
	}
	
	else
	{
		$alici=$_SESSION["kullanici_adi"];
		$b=0;
		$NewMessage=mysqli_query($con,"SELECT * from mesaj where alici='$alici' and okundu='$b'   ");
		$IsThereNewMessage=mysqli_num_rows($NewMessage);
		echo '<a href="who.php?who='.$alici.' " >'; echo $_SESSION["kullanici_adi"];    echo '</a>';
		if(!$IsThereNewMessage)
		{
			echo '	<a href="message.php" id="MessageLink" class="w3-btn w3-light-grey w3-hover-green"> <i class="material-icons" id="MessageIcon" style="font-size:30px">mail_outline</i></a>';
			
		}
		else
		{
			echo '	<a href="message.php" id="MessageLink" class="w3-btn w3-green w3-hover-green"> <i class="material-icons" id="MessageIcon" style="font-size:30px">mail_outline</i></a>';
			
		}
	
	echo '
	<a class="w3-btn w3-light-grey w3-tiny w3-hover-black " id="CikisButton" href="logout.php"> Çıkış </a>';
	}
		
		
		
		
		
		
		
		
	}


?>
<form method="post" action="search.php" > 
<ul class="w3-navbar w3-border w3-black w3-center">
  <!--<li id="lo"   style="width:35%">a </li>--> 
	 
<li class="w3-navitem">
    <input type="text"  name="search" class="w3-input w3-border-0 w3-padding-0" placeholder="Konu ara..">
  </li>
      <li style="width:5%">  <button class="w3-btn w3-round w3-green" onclick="document.getElementById('form-id').submit();" ><i class="fa fa-search" style="font-size:20px"></i>  </button></li>

</ul>
</form>

</div>
  <!-- Header -->
  <header class="w3-container" id="portfolio">
    <span class="w3-opennav w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
<?php
				

	if($_POST["search"] )
	{
		$search=$_POST["search"];
	}
	if( empty( $search) )
	{
		header("location:home.php");
	}
   
	$sorgu=mysqli_query($con,"SELECT * from konu where baslik like '%$search%'");
	$varmi=mysqli_num_rows($sorgu);
	if(!$varmi)
	{
		echo "Böyle bir konu yok ";
	}
	else
	{
		while ($threadlist2=mysqli_fetch_array($sorgu) )
	{			$threadno=$threadlist2["id"];
		$HowManyComment=mysqli_query($con,"SELECT * from yorum where threadno=$threadno  ");
		$CountComments=mysqli_num_rows($HowManyComment);
		 echo ' 
<div class="w3-row-padding">
    <div class="w3-container w3-margin-bottom">
      <div class="w3-container w3-white">
			<a id="headerlink" href="thread.php?t='.$threadlist2["id"].'&page=1" ><b> '; echo $threadlist2["baslik"];echo ' </b></a><br>
				<i class="fa fa-calendar"></i>'; echo $threadlist2["tarih"]; echo '&nbsp'; echo '<span id="gonderenspan" ><i class="material-icons">person</i>
				
				</span><a id="GoSomeoneProfile" href="who.php?who='.$threadlist2["gonderen"].'">'; echo $threadlist2["gonderen"]; echo '</a> </i>
				<i class="fa fa-comment"></i>';	echo $CountComments;	echo ' 

				
				<p id="needwrap">'; 	$metin = $threadlist2["mesaj"];
				$uzunluk = strlen($metin);
				$sinir = 120;
				if ($uzunluk> $sinir) 
				{
				$icerik = substr($metin,0,$sinir);
				echo $icerik; echo '<br><a id="devaminioku" href="thread.php?t='.$threadlist2["id"].'&page=1"> Devamını Okuyayım... </a> ';
				}
				else if($uzunluk <70)
				{
					echo $metin;echo '<br><a id="devaminioku" href="thread.php?t='.$threadlist2["id"].'&page=1"> Devamını Okuyayım... </a> ';
				}
				 echo
				'</p>
</div>
	</div>
		</div>';
		
	}
	}
	
	
	?>
	


	


  </header>


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

