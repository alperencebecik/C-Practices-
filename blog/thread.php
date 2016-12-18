<!DOCTYPE html>
<html>
<?php
require("db.php");
$con=mysqli_connect("localhost","root","merhaba","kullanici");

$threadnumber10=$_GET["t"];

		$who15=mysqli_query($con,"SELECT * from konu where id=$threadnumber10  ");
		$who30=mysqli_fetch_array($who15);
		
		$fortitle=$who30["baslik"];
		
	echo '<title>'; echo $fortitle;    echo '</title>';
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
	
	</p>

    <button class="w3-btn w3-black w3-hover-red">Konuyu Gönder</button></p>
	   </form>
		</div>
	
		
		</form>
      </div>
     
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
 <a href="home.php" onclick="w3_close()" class="w3-padding w3-hover-black"><i class="fa fa-newspaper-o fa-fw w3-margin-right"></i>
  <span id="NavLeft"> Bugün </span> </a>
  
  <a href="hakkinda.php" onclick="w3_close()" class="w3-padding w3-hover-black"><i class="fa fa-chevron-circle-right fa-fw w3-margin-right"></i>
  <span id="NavLeft"> Hakkında </span> </a>

  <a href="#contact" onclick="w3_close()" class="w3-padding w3-hover-black "><i class="fa fa-envelope fa-fw w3-margin-right"></i>
  <span id="Navleft"> İletişim </span> </a>
  <form class="w3-container w3-card-4" action="form.asp">

  
</form>
   
 
</nav>

<!-- Overlay effect when opening sidenav on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
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
  <!-- Header -->
  <header class="w3-container" id="portfolio">
    <span class="w3-opennav w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
  
  <?php
		require("db.php");

		$threadnumber=$_GET["t"];
		$who=mysqli_query($con,"SELECT * from konu where id=$threadnumber  ");
		$who2=mysqli_fetch_array($who);
		
		$fortitle=$who2["baslik"];

		echo '<div class="w3-row-padding">
		<div class="w3-container w3-margin-bottom">
		<div id="baslik" class="w3-container w3-round w3-grey">
		
		<h3 id="baslik2">'; echo $who2["baslik"]; echo ' </h3>
		
		</div>
				</div>

						</div><br>

		
		
		
		';
		
		
		echo ' <div class="w3-row-padding w3-border entry">
    <div  class="w3-container w3-margin-bottom">
      <div  class="w3-container w3-round w3-lightgrey">
	   
	  
	  <p id="needwrap" >
        '; 
				$metin = $who2["mesaj"];
				$uzunluk = strlen($metin);
				$sinir=120;
				$a=0;
				error_reporting(0);
				$kacenter=$uzunluk/$sinir;
				if ( $_GET["page"]==1 ) 
				{
					echo $metin; 
				}				
				echo '</p>';
				echo '<p id="threadwriter" ><b>'; echo '<span id="threaddate">'; echo $who2["tarih"]; echo '</span>&nbsp <a  id="GoSomeoneProfile" href="who.php?who='.$who2["gonderen"].'"> ';  echo $who2["gonderen"]; echo '</a></b> </p>
				</div>
					</div>
						</div>';
  
  
  /* 
  Burada da sayfalara göre konu içindeki yorumların dağılımı.
  Her sayfada 15 yorum gözüküyor. Kalanı diğer sayfalara geçiyor.
  */
		$threadno=$_GET["t"];
		$sorgu=mysqli_query($con,"SELECT * from yorum where threadno=30 ");
		$i=0;
	
		$page2=$_GET["page"];
		$secondlimiter=0;
		$firstlimiter=0;
		$firstlimiter=$page2*15-15;
		$secondlimiter=$firstlimiter+15;
		
				$ok=0;
				if(!empty($_SESSION["kullanici_adi"]) )
				{
					$IsItAdmin=$_SESSION["kullanici_adi"];
					$TheRank3=mysqli_query($con,"SELECT * from uyelik where kullanici_adi='$IsItAdmin'");
				$TheRank4=mysqli_fetch_array($TheRank3);
				$ok=1;
				}	
	
	
	$sorgu = mysqli_query( $con,"SELECT * FROM yorum WHERE threadno=$threadno ORDER BY id ASC LIMIT $firstlimiter, $secondlimiter");// İlk girilen yorum en başta olsun
	
	while ($commentlist2=mysqli_fetch_array($sorgu) )  
	{
		 echo ' <div id="comments" > <div  class="w3-row-padding w3-border">
					<div class="w3-container w3-margin-bottom">
						<div  class="w3-container w3-lightgrey">
				<p id="needwrap" >'; 	$metin = $commentlist2["yorum"];
	
					
				echo'</p>
				</div>
					</div>
						<div id="InformationOfComment" > <p id="commentwriter2" ><b>'; echo '<span id="threaddate">'; echo $commentlist2["tarih"]; echo '</span>&nbsp'; echo '<a href="who.php?who='.$commentlist2["gonderen"].'">'; echo $commentlist2["gonderen"];  echo' </a>  '; echo '</b>
						
						';

						echo '
						 <div class="desparag" >
						<p class="wrapto" >
						';
						echo $metin;
						echo '</p></div>';


						if($ok==1)
						{
							if($TheRank4["yetki"]==1 )
							{
								echo '<a class="w3-btn w3-round w3-tiny w3-hover-red "
					onclick="return silOnayla();"
					style="
					
					background-color:white;
					color:black;
					border-style:solid;
					border-color:red;
					font-family:arial;
					font-weight:bold;
					box-shadow: 0px 0px 0px #000;
					-moz-box-shadow: 0px 0px 0px #000;
					-webkit-box-shadow: 0px 0px 0px #000;
					transition:0s;
					height:30px; " 	onclick="return silOnayla();" href="deleter.php?MessageId='.$commentlist2["id"].'&threadno='.$threadnumber.'&page='.$page2.'" >Sil</a> ';
							}
						}
						
						
						
						
						
						
						
						
						
					  echo'	</p></div>
   
					</div>
						</div>';
				$i++;
				if($i==15)
				{
					break;
				}
	}
	
	echo '
   <div class="w3-center w3-padding-128">
		<div class="w3-center w3-padding-128">
			<div class="w3-center w3-padding-128"></div>
			<ul class="w3-pagination">';
  
		$commentlist=mysqli_query($con,"SELECT * from yorum where threadno=$threadnumber");
		$i=0;
		
		$countit=mysqli_num_rows($commentlist);
		$page=$_GET["page"];
		$howmany=1;
		$count2=$countit/15;
		while($count2 > 0 )
		{ 
				if($howmany==$page) // Hangi sayfadaysa pagination sayılarında o sayı seçili oluyor .
				{
					 echo '
					<li><a class="w3-btn w3-hover-black w3-black" href="thread.php?t='.$threadnumber.'&page='.$howmany.'">'; echo $howmany; echo ' </a></li>';
				}
				else
				{
					echo '
					<li><a class="w3-hover-black w3-btn w3-light-grey" href="thread.php?t='.$threadnumber.'&page='.$howmany.'">'; echo $howmany; echo ' </a></li>';
				}
			
			
			
			$count2--;
			$howmany++;
		}
	  echo '
   
			</ul>
		</div>
	</div>';
		
   
	if($_SESSION["login"]) // Login yapıldıysa yorum yapma bölümü açık.
	{ 
		echo '
		 <div id="endiscommenter" >
			<div  class="w3-container w3-margin-bottom">
				<div id="textareaforcomment" class="w3-container w3-round w3-black">Konu Hakkında Bilgi Verin..
					<form action="commentsender.php?threadnumber='.$threadnumber.'" method="post" > 	 
						<textarea id="textareaninkendisi" name="yorum"	 >   </textarea>
						<input class="w3-btn w3-round" id="commentsenderbutton" type="submit" value="yolla" >
					</form>
				</div>
			</div>
		</div>
	  ';
	}
	
	?>
   </header>
</div>

<script>
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
function silOnayla()
{
    return confirm("Silmek istediğinizden emin misiniz?");
}
</script>

</body>
</html>

