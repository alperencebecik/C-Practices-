<!DOCTYPE html>
<html>
<title>Blog</title>
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
<nav class="w3-sidenav w3-collapse w3-black w3-animate-left" style="z-index:3;width:200px;" id="mySidenav"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
	Yazar Listesi
	<hr> </hr>
    <h4 class="w3-padding-0"><b></b></h4>
  </div>
	<?php 
$con=mysqli_connect("localhost","root","merhaba","kullanici");

	$Them=mysqli_query($con,"select * from uyelik");
	while($k=mysqli_fetch_array($Them ) )
	{
		echo '<a href="moderation.php?who='.$k["kullanici_adi"].'">'; echo $k["kullanici_adi"]; echo ' </a>  '; 
	}
	
	
	
	
	
	?>
	<div id="TheWriterList"> 
	 
	
	<div>
	
 
  
 
</nav>

<!-- Opening effect leftmenu for the small screens or mobiles -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- General page  -->
<div class="w3-main" style="margin-left:200px">

<?php
require("db.php");

if(!empty($_GET["who"] )  )
{
	$who=$_GET["who"];
	$ReadTheWriter=mysqli_query($con,"SELECT * from konu where gonderen='$who' ");
	
	if(!empty($_GET["thr"])  )
	{
		while( $GetThread=mysqli_fetch_array ($ReadTheWriter))
		{
			
			echo '
			
					<table id="ThreadTableOfUser" >
	<tr>				  
			<td> <a href="">'; echo $GetThread["baslik"]; echo' </a> </td>
			<td> a </td>
	</tr>		
			</table>
		
			'; 
		}
	}
	else if(!empty ($_GET["msg"] ))
	{
		echo "b";
	}
	else
	{
		echo '<div class="w3-center"> <a href="moderation.php?who='.$who.'&thr=y">';  echo ' Adlı Kullanıcının Açtığı Konular </a>   </div> ';
		echo '<div class="w3-center"> <a href="moderation.php?who='.$who.'&msg=y">';  echo ' Adlı Kullanıcının Yorumları </a>   </div> ';
	}
	
}

?>

<div class="w3-right-align">


  
  
	
  </header>

  



	
	


  
  

</div>



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

