<?php
include("setting.php");
session_start();
if (!isset($_SESSION['email'])) {
  header("location:index.php");
}
$email = $_SESSION['email'];
$a = mysqli_query($al, "SELECT * FROM customers WHERE email='$email'");
$b = mysqli_fetch_array($a);
$name = $b['name'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Bystrova Travel Agency</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="home__wrapper">
    <!--HEADER-->
    <div class="home__header">
      <div class="header__menu">
        <div class="menu__block" id="logo">Iryna Bystrova &amp Travel Agency</div>
      </div>
      <div class="header__menu">
        <div class="menu__block"><a href="home.php" id="home-href">Home</a></div>
        <div class="menu__block"><a href="book.php">Book holiday package</a></div>
        <div class="menu__block"><a href="mypackages.php">My Packages</a></div>
        <div class="menu__block"><a href="changePassword.php">Change Password</a></div>
        <div class="menu__block"><a href="logout.php">Logout</a></div>
      </div>
    </div>
    <!--MENU-->
    <div class="content">
      <div class="content-block" id="first-content">
        <h1>Explore and<br> Travel</h1>
        <h3>For decades travellers have reached for Lonely Planet books when looking to plan and execute their perfect
          trip, but now, they can also let Lonely Planet Experiences lead the way</h3>
        <button><a href="#">Explore</a></button>
      </div>
      <div class="content-block">
        <img src="./images/human.png" alt="human pic">
      </div>
      <!-- <div class="content-block" id="second-content">
        <h1>A new way to explore the<br> world </h1>
        <h3>Packed with tips and advice from our on-the-ground experts, our city guides app (iOS and Android) is the ultimate resource before and during a trip.</h3>
      </div> -->
    </div>
  </div>
</body>

</html>

<!--Creator Iryna Bystrova
======================================
| irynabystrova2002@gmail.com        |
| +380 97 740 56 10                  |
| https://github.com/irynabystrovaaa |
======================================
-->