<!DOCTYPE html>
<html>
<title>Gelen Kutusu</title>
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
			$con=mysqli_connect("localhost","root","merhaba","kullanici");

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

if( empty ($_SESSION["login"]) )
{
	print '<script>alert("Bu sayfada üye olmayanın işi yok kardeş!"); window.location.href="http://localhost/blog/home.php" ;</script>';
}
else
{
	echo '	<a href="message.php" id="MessageLink" class="w3-btn w3-light-grey w3-hover-black"> <i class="material-icons" id="MessageIcon" style="font-size:30px">mail_outline</i></a>
';
	echo '
	<a class="w3-btn w3-light-grey w3-tiny w3-hover-black " id="CikisButton" href="logout.php"> Çıkış </a>';
}






?>



</div>
<?php
require("db.php");

$user=$_SESSION["kullanici_adi"];

$MesajList=mysqli_query($con,"SELECT * from mesaj where alici='$user' order by id desc ");
$MesajList2=mysqli_query($con,"SELECT * from mesaj where alici='$user' order by id desc");

$g=0;
		error_reporting(0);

		$query3=mysqli_query($con,"SELECT * from mesaj where alici='$_SESSION[kullanici_adi]'  ");
		
		$bslk="a";
	if(empty($_GET["sender"]) )
	{ echo '
		<table id="MessageListTable" class="w3-table-all w3-small" >
		
		<tr>
		<td id="OpenMessage">Sohbeti Aç </td>
		<td id="Gonderen" >Gönderen</td>
		<td id="Baslik" >Sohbet Başlığı </td>
		</tr>';
		$say=0;
		$a=array();
		$i=0;
		while($Basliklar=mysqli_fetch_array($MesajList2)  )
		{
			if($i>0)
			{
				if( $a[$i-1] != $Basliklar["baslik"]  )
				{
					$a[$i]=$Basliklar["baslik"];
					$i++;
				}
			}
			else
			{
				$a[$i]=$Basliklar["baslik"];
				$i++;
			}
			
			
		}
		$kimki2=$_SESSION["kullanici_adi"];

		
		while($Listit=mysqli_fetch_array($MesajList) )
		{
					$kk=$Listit["baslik"];
					$NewMessage=mysqli_query($con,"SELECT * from mesaj where alici='$kimki2' and okundu='$b' and baslik='$kk'   ");
					$Countthe=mysqli_num_rows($NewMessage);
			$cnt=0;
			while($a[$cnt] != null)
			{
				if($a[$cnt] == $Listit["baslik"])
				{
						echo '
					<tr>
						<td id="OpenIcon" >';  echo'<a href="message.php?sender='.$Listit["gonderen"].'&receiver='.$Listit["alici"].'&baslik='.$Listit["baslik"].'" > <i class="fa fa-folder-open-o ';

if($Countthe >0 ){

	echo "oyle";
}

echo '




						" style="font-size:24px"></i></a></td>
						<td id="Gonderen2">';echo $Listit["gonderen"]; echo ' </td>
						<td id="Baslik2"> ';echo $Listit["baslik"];  echo '</td>
					</tr>';
					$a[$cnt]="b";
					break;
					
				}
				$cnt++;
			}        
				
		}
		echo '
		</table>';
		
	}
	else
	{
		
		$sender=$_GET["sender"];
		$receiver=$_GET["receiver"];
		$baslik=$_GET["baslik"];
		$kimki=$_SESSION["kullanici_adi"];
		$sorgu = mysqli_query($con,"SELECT * from mesaj where baslik='$baslik' ORDER BY id desc ");// İlk girilen yorum en başta olsun
		
		$query4=mysqli_query($con,"SELECT * from mesaj");
		while($biryap=mysqli_fetch_array($query4))
		{
			$guncelle=mysqli_query($con,"UPDATE mesaj SET okundu='1' WHERE okundu='$g' and baslik='$baslik' and alici='$kimki'  ");
		}
		
		
		if($receiver!= $_SESSION["kullanici_adi"])
		{
			echo "Hatalı sulardasınız hocam";
		}
		else
		{
		$TheMessage=mysqli_query($con,"SELECT * from mesaj where alici='$_SESSION[kullanici_adi]' and gonderen='$sender' ");
			echo '
		 <div id="Reply" >
			<div  class="w3-container w3-margin-bottom">
				<div id="textareaforcomment2" class="w3-container w3-round w3-black">Bu mesajı cevaplayın..
					<form action="messagesender.php?sender='.$sender.'&receiver='.$receiver.'&baslik='.$baslik.'" method="post" id="replyform"> 	 
						<textarea id="textareaninkendisi2" name="reply">    </textarea>
						<input class="w3-btn w3-round" id="commentsenderbutton2" type="submit" value="yolla" >
					</form>
				</div>
			</div>
		</div>
	  ';
		while($go=mysqli_fetch_array($sorgu)  )
		{
			
			echo '
	<div id="MessageShower" >

       <p id="NeedWrap2"><span id="d" >'; echo $go["gonderen"]; echo ':</span>'; echo $go["mesaj"];   echo '</p>
		
		</div>
		
		';
		
		}
	
		}

	}
	
?>



  <!-- Header -->
  <header class="w3-container" id="portfolio">
    <span class="w3-opennav w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
 
  </header>

  <!-- Threads -->
  

    </ul>
  </div>

 <br>
 <br>
 <br><br>
 

  
  

</div>

<script>

$('form').submit(function(){
  $(this).find(':submit').attr('disabled','disabled');
});

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

