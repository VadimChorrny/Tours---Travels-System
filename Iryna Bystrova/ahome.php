<?php
include("setting.php");
session_start();
if (!isset($_SESSION['aid'])) {
  header("location:admin.php");
}
$aid = $_SESSION['aid'];
$a = mysqli_query($al, "SELECT * FROM admin WHERE aid='$aid'");
$b = mysqli_fetch_array($a);
$name = $b['name'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Tour &amp; Travels System</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <nav class="navbar">
    <div class="navbar-container container">
      <input type="checkbox" name="" id="">
      <div class="hamburger-lines">
        <span class="line line1"></span>
        <span class="line line2"></span>
        <span class="line line3"></span>
      </div>
      <ul class="menu-items">
        <li><a href="holiday.php">Manage Holiday</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="changePasswordAdmin.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <h1 class="logo">Iryna Bystrova</h1>
    </div>
  </nav>
  <br />
  <br />

  <div class="welcome-title">
    <h1>Welcome <?php echo $name; ?></php>!</h1>
    <h2>This is your admin panel for<br><span>Iryna Bystrova Travel Agency</span></h2>
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