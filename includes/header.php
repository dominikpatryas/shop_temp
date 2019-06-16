<?php

require 'config/config.php';
include("includes/classes/User.php");


if(isset($_SESSION['username'])) {
$userLoggedIn = $_SESSION['username'];
$user_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
$user = mysqli_fetch_array($user_query);
}

if (basename($_SERVER['PHP_SELF']) != "register.php") { /* Returns The Current PHP File Name */
  if(!isset($_SESSION['username'])) {
    header("Location: register.php");
  }
  
}


?>


<html>
<head>
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"> </script>
<script src="assets/js/bootbox.min.js"> </script>
<script src="assets/js/shop.js"> </script>
<script src="assets/js/jcrop_bits.js"> </script>
<script src="assets/js/jquery.Jcrop.js"> </script>

<!-- CSS -->

<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



</head>

<body>

<header>
  <?php 
  if (isset($_SESSION['username'])) {
   echo " <div class='log_nav'>
        <ul>
            <li> <a href='includes/handlers/logout.php'>Wyloguj się</a></li>
            <li>Kontakt</li>
        </ul>
    </div>";
  } else {
    echo " <div class='log_nav'>
        <ul>
            <li> <a href='register.php'>Zarejestruj lub zaloguj się</a></li>
            <li>Kontakt</li>
        </ul>
    </div>";
  }
  ?>
    <div id="logo_img">
   <a href="index.php"><img src="./assets/images/logo-amazon.jpg" alt=""> </a>
    </div>
    <nav>
      <ul>
        <li><a href="#">Telefony</a></li>
        <li><a href="#">Telewizory</a></li>
        <li><a href="#">AGD</a></li>
        <li><a href="#">Dom</a></li>
        <li><a href="#">Ogród</a></li>
        <li><a href="#">Hobby</a></li>
      </ul>
    </nav>
  </header>
    



   
