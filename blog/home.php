<!DOCTYPE html>
<html>

<head>
<meta name="robots" content="index, follow" />

<meta http-equiv=Content-Type content="text/html; charset=iso-8859-9">
<meta name="Description" content="Altın imalatı ile ilgili en yararlı bilgileri bu sayfada bulabilirsiniz.">
<meta name="Keywords" content="imalat,altinimalati,altin,altin üretimi">
<title>Altinimalat.com - İmalat ile ilgili her şey.</title>  
</head>




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
    <div id="id02" class="w3-modal-content w3-card-8 w3-animate-top ya">
      
      <header class="w3-container w3-theme-l1">

        <span onclick="document.getElementById('id01').style.display='none'" class="w3-closebtn">×</span>
			<?php
			

$con=mysqli_connect("localhost","root","merhaba","kullanici");
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
  <a href="home.php" onclick="w3_close()" class="w3-padding w3-text-green w3-hover-black"><i class="fa fa-newspaper-o fa-fw w3-margin-right"></i>
  <span id="NavLeft"> Bugün </span> </a>
  
  <a href="hakkinda.php" onclick="w3_close()" class="w3-padding w3-hover-black"><i class="fa fa-chevron-circle-right fa-fw w3-margin-right"></i>
  <span id="NavLeft"> Hakkında </span> </a>

  <a href="#contact" onclick="w3_close()" class="w3-padding w3-hover-black "><i class="fa fa-envelope fa-fw w3-margin-right"></i>
  <span id="Navleft"> İletişim </span> </a>
  
  <span id="Navleft"> En Çok Yorum Alanlar	</span> </a><br>
  
  <?php
  	date_default_timezone_set('Europe/Istanbul');
	session_start();

	
	$TodaysDate=date("Y-m-d");


	$SayBakalim=mysqli_query($con,"SELECT threadno , count(threadno) as cnt FROM yorum
GROUP BY threadno HAVING cnt > 1 ORDER BY cnt desc LIMIT 0,10");
	$Kackere=0;



	while($CommentCounter=mysqli_fetch_array($SayBakalim) )
	{
		$xd=$CommentCounter["threadno"];
		
		$GetTheThread=mysqli_query($con,"SELECT * from konu where id='$xd' ");
		$varmila=mysqli_num_rows($GetTheThread);
		
		if($varmila==1)
		{
			$hey=mysqli_fetch_array($GetTheThread); 
			$hah=substr($hey["baslik"],0,15);
			echo '<p><a href="thread.php?t='.$CommentCounter["threadno"].'&page=1">'; echo $hah; echo '&nbsp&nbsp&nbsp&nbsp'; echo $CommentCounter["cnt"]; echo '</a></p>';
			$Kackere++;
			if($Kackere==30)
			{
				break;
			}
		}
		
		
		
	}



/*
	$hayir=array_count_values($c);
	$MostCommented=mysql_query("select * from yorum ");
	$counter=0;
	while($ok2=mysql_fetch_array($MostCommented) )
	{
		$hangisi=$ok2["threadno"];
		$peki[$counter]=$hayir[$hangisi];
	}*/
	
	
	
	
  ?>

  <!-- <form class="w3-container w3-card-4" action="form.asp">

  <select class="w3-select w3-border w3-tiny" name="option">
    <option value="" disabled selected>Listelemek İçin Tarih Seçin</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
  </form>-->
   
 
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
    <h3><b>Son Gönderiler</b></h3>
    <?php
		if( !empty($_SESSION["login"]) )
		{
		$requestURI = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			if($requestURI=="http://localhost/blog/home.php?th=1")
			{
				echo "Konunuz Başarıyla Gönderildi";
			}

		
		}
	?>
	


	


  </header>

 	<button class="w3-btn NewThreadButton w3-round" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;"><b id="SubmitTheThread">Konu Aç</b></button>

  <!-- Threads -->
  
  <?php

	/* sayfalara göre konuların dağılımı*/
	/* ilk sayfa da son girilen 0-15 konu,   ikinci sayfada 15-30 arası böyle devam ediyor */
	
	
	
	$threadlist=mysqli_query($con,"SELECT * from konu ");
	$i=0;
	$countit=mysqli_num_rows($threadlist);
	if ( isset($_GET["p"] ) )
	{
		$page2=$_GET["p"];
		$secondlimiter=0;
		$firstlimiter=0;
		$firstlimiter=$page2*15-15;
		$secondlimiter=$firstlimiter+15;
	}
	else
	{
		$firstlimiter=0;
		$secondlimiter=15;
	}			
				$ok=0;
				if(!empty($_SESSION["kullanici_adi"]) )
				{
					$IsItAdmin=$_SESSION["kullanici_adi"];
					$TheRank3=mysqli_query($con,"SELECT * from uyelik where kullanici_adi='$IsItAdmin'");
				$TheRank4=mysqli_fetch_array($TheRank3);
				$ok=1;
				}
				
				

	$sorgu = mysqli_query($con,"SELECT * FROM konu ORDER BY id DESC LIMIT $firstlimiter, $secondlimiter");
	
	
	while ($threadlist2=mysqli_fetch_array($sorgu) )
	{			$threadno=$threadlist2["id"];
		$HowManyComment=mysqli_query($con,"SELECT * from yorum where threadno=$threadno  ");
		$BaslikToDelete=$threadlist2["baslik"];
		$CountComments=mysqli_num_rows($HowManyComment);
		 echo ' 
<div class="w3-row-padding">
    <div class="w3-container w3-margin-bottom">
      <div class="w3-container w3-white">
			<a id="headerlink" href="thread.php?t='.$threadlist2["id"].'&page=1" ><b> '; echo $threadlist2["baslik"];echo ' </b></a><br>
				<i class="fa fa-calendar"></i>'; echo $threadlist2["tarih"]; echo '&nbsp'; echo '<span id="gonderenspan" ><i class="material-icons">person</i>
				
				</span><a id="GoSomeoneProfile" href="who.php?who='.$threadlist2["gonderen"].'">'; echo $threadlist2["gonderen"]; echo '</a> </i>
				
				<i class="fa fa-comment"></i>';	echo $CountComments;	echo ' 
				'; 
				if($ok==1)
				{
				if($TheRank4["yetki"] == 1)
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
					height:30px;	
 
  
  
  
  
  
  
  
  " href="deleter.php?baslik='.$BaslikToDelete.'&threadno='.$threadno.' "> Sil</a> ';
				}	
				}
				
				
				echo '
				
				<p id="needwrap">'; 	$metin = $threadlist2["mesaj"];
				$uzunluk = strlen($metin);
				$sinir = 120;
				if ($uzunluk> $sinir) 
				{
				$icerik = substr($metin,0,$sinir);
				echo $icerik; echo '<br><a id="devaminioku" href="thread.php?t='.$threadlist2["id"].'&page=1"> Devamını Oku... </a> ';
				}
				else if($uzunluk <70)
				{
					echo $metin;echo '<br><a id="devaminioku" href="thread.php?t='.$threadlist2["id"].'&page=1"> Devamını Oku... </a> ';
				}
				 echo
				'</p>
</div>
	</div>
		</div>';
		$i++;
		if($i==15)
		{
			break;
		}
	}
	

	

  ?>

  <!-- Page Computing -->
  <div class="w3-center w3-padding-32">
    <ul class="w3-pagination">
	<?php
	  $countforpage=$countit/15;

	  $sorgu = mysqli_query($con,"SELECT * FROM konu ORDER BY id DESC LIMIT 0, 15");
		
	  if( isset($_GET["p"]) )
	  {
		$page=$_GET["p"];
		$HowManyPageExists=1;
		while($countforpage > 0 )
		{
				if($HowManyPageExists==$page)
				{
					echo '
					<li><a class="w3-hover-black w3-black" href="home.php?p='.$HowManyPageExists.'">'; echo $HowManyPageExists; echo ' </a></li>';
				}
				else
				{
					echo '
					<li><a class="w3-hover-black" href="home.php?p='.$HowManyPageExists.'">'; echo $HowManyPageExists; echo ' </a></li>';
				}
			
			
			
			$countforpage--;
			$HowManyPageExists++;
		}
	  }
	  else
	  {
		 $page=1;
		 $HowManyPageExists=1;
		while($countforpage > 0 )
		{
				if($HowManyPageExists==$page)
				{
					echo '
			<li><a class="w3-hover-black w3-black" href="home.php?p='.$HowManyPageExists.'">'; echo $HowManyPageExists; echo ' </a></li>';
				}
				else{
					echo '
			<li><a class="w3-hover-black" href="home.php?p='.$HowManyPageExists.'">'; echo $HowManyPageExists; echo ' </a></li>';
				}
			$countforpage--;
			$HowManyPageExists++;
		}
		 
	  }
	  
		
	  
		 
	  	  
	  
     
	  ?>
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
function silOnayla()
{
    return confirm("Silmek istediğinizden emin misiniz?");
}

</script>

</body>
</html>

