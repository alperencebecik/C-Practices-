<!DOCTYPE html>
<html>

<?php
	$whois=$_GET["who"];
	echo '<title> '; echo $whois; echo ' </title>';


?>



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
        <h4>Yeni Bir Konu Açmak Üzeresiniz</h4>
        
      </header>
	  
 
    </div>
	
	</div>

	
<!-- Sidenav/menu -->
<nav class="w3-sidenav w3-collapse w3-black w3-animate-left" style="z-index:3;width:200px;" id="mySidenav"><h3 id="headerofsite" > Altın İmalat </h3>
  	<p id="description" >Altın İmalat ile ilgili her şey.. </p>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <h4 class="w3-padding-0"><b></b></h4>
  </div>
    
	 <a href="home.php" onclick="w3_close()" class="w3-padding  w3-hover-black"><i class="fa fa-newspaper-o fa-fw w3-margin-right"></i>
  <span id="NavLeft"> Bugün </span> </a>

 
  
<p> &nbsp <?php   
$con=mysqli_connect("localhost","root","merhaba","kullanici");

$who=$_GET["who"];
 echo $who; ?>'nin konuları  </p>
    <?php
		
		$FromWhom=$who;
		$FindTheThreads=mysqli_query($con,"SELECT * from konu where gonderen='$FromWhom' ");
		while($PrintThem=mysqli_fetch_array($FindTheThreads)  )
		{
			$Head=$PrintThem["baslik"];
			$Head=substr($Head,0,30);
			
			$threadno=$PrintThem["id"];
		echo '
	<a class="w3-btn w3-hover-grey threadlink" href="thread.php?t='.$threadno.'&page=1" ><span id="SpanOfThreadLink" > '.$Head.'</span> </a><br>
		';
		}
		
		
		
		
	?>
 
</nav>

<!-- Opening effect leftmenu for the small screens or mobiles -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- General page  -->
<div class="w3-main" style="margin-left:200px">
<div class="w3-right-align">
<?php
require("db.php");

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



</div>
  <header class="w3-container" id="portfolio">
    <span class="w3-opennav w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
<?php
if(!empty($_SESSION["kullanici_adi"]))
{
	$sender=$_SESSION["kullanici_adi"];
	$receiver=$who;
	
	if($sender!=$receiver)
	{
		echo '
	<div id="xx2" class="w3-padding-4">
						<div id="messagewho" class="w3-card-4">
							<div  id="hm2" class="w3-container w3-grey">
    
					</div>
							<form class="w3-container" action="messagesender.php?sender='.$sender.'&receiver='.$who.'&new=1" id="uform" method="POST">
    
									<p>
										<label class="w3-label w3-text-grey"><b> Başlık </b></label>
										<input class="w3-input w3-border w3-green mesajbaslik" name="baslik" type="text">
									</p>
	
									<p>
										<label class="w3-label w3-text-grey"><b> İçerik </b></label>
									</p>
	
							<textarea id="TextForMessage" rows="4" cols="50" name="mesaj3" class="w3-input w3-border w3-light-grey w3-autosize" placeholder="......"  form="uform">
							</textarea>
	
					

				<button class="w3-btn w3-black w3-hover-red">Mesajı Gönder</button></p>
				</form>
						</div>
						</div>';
	}

	
}


?>


  
  
	
  </header>

  



	
	
	
 

  
  

</div>

<script>
// for small screens or mobiles = opener script
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

