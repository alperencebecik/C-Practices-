<!DOCTYPE html>
<html>
<title>Üye Ol</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
<link href='//fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>

<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="StyleOfAll.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

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
  <a href="home.php" onclick="w3_close()" class="w3-padding w3-hover-black"><i class="fa fa-newspaper-o fa-fw w3-margin-right"></i>
  <span id="NavLeft"> Bugün </span> </a>
  
  <a href="hakkinda.php" onclick="w3_close()" class="w3-padding w3-hover-black"><i class="fa fa-chevron-circle-right fa-fw w3-margin-right"></i>
  <span id="NavLeft"> Hakkında </span> </a>

  <a href="#contact" onclick="w3_close()" class="w3-padding w3-hover-black "><i class="fa fa-envelope fa-fw w3-margin-right"></i>
  <span id="Navleft"> İletişim </span> </a>
  <form class="w3-container w3-card-4" action="home.php">

  <!--<select class="w3-select w3-border w3-tiny" name="option">
    <option value="" disabled selected>Listelemek İçin Tarih Seçin</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>-->
</form>
   
 
</nav>

<!-- Left nav opening for small screens -->


<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<div class="w3-main" style="margin-left:200px">



<div class="w3-center w3-padding-64"  >
<div class="w3-center w3-padding-128">
<div id="kayitform" class="w3-container w3-round-xlarge w3-green w3-padding-24" >
<p id="LoginHeaderParagraph"> Kayıt Formu </p>
</div>
<br>
<form id="LoginForm" class="w3-container" method="post" action="register2.php">
  <input class="w3-input w3-round w3-padding-4"  name="kullanici_adi" type="text" id="kullanici_adi" placeholder="Kullanıcı Adı" >  <p id="kontrol"> </p>
<br>

  
  <input class="w3-input w3-round w3-padding-4 " name="sifre" type="password" id="firstsifre" placeholder="Şifre" ><br>
  
  <input class="w3-input w3-round w3-padding-4 " name="sifretekrar" type="password" id="secondsifre" placeholder="Şifre Tekrar" ><p id="kontroltwo"> </p><br>

  <input class="w3-input w3-round w3-padding-4"  name="e_mail" type="text" placeholder="E-Mail"><br>
  
  <button class="w3-btn LoginButton w3-round" onclick="document.getElementById('form-id').submit();" >  <b id="submitit"> Kayıt Ol</b> </button>
 <!-- <a href="javascript:;" id="check"> Kontrol Et </a>-->
</form>
</div>
</div>

<script>
 $('#kullanici_adi').change(
	function()
	{
        
		var kullanici_adi = $('#kullanici_adi').val();
		if(kullanici_adi!="") 
		{
       	   	 $('#kontrol').load('check.php?uid='+kullanici_adi);
		}
		else 
		{
	         $('#kontrol').load('check.php');
		}
		
	}
	  );
	  
	  
	
	  $('#secondsifre').change(
	function()
	{
        
		var firstsifre = $('#firstsifre').val();
		var secondsifre=$('#secondsifre').val();
		if(firstsifre!="") 
		{
			$('#kontroltwo').load('check2.php?firstsifre='+firstsifre+'&secondsifre='+secondsifre);
		}
		else 
		{
	         $('#kontroltwo').load('check2.php');
		}
		
	}
	  );
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  





</script>
 
  


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
</script>

</body>
</html>

