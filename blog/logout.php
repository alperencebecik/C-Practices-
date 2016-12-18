<?php
require("db.php");

$con=mysqli_connect("localhost","root","merhaba","kullanici");

session_destroy();
header('Location:home.php');

?>