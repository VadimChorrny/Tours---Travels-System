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
  <div id="header">
    <div align="center"> <span class="headingMain">Bystrova Travel Agency</span> </div>
  </div>
  <br />
  <br />
  <div align="center"> <span class="subHead">Welcome <?php echo $name; ?></span> <br />
    <br />
    <table border="0">
      <tr>
        <td> <a href="holiday.php" class="cmd">♦ Manage Holiday Packages</a></td>
        <td><a href="changePasswordAdmin.php" class="cmd">♦ Change Password</a></td>
      </tr>
      <tr>
        <td><a href="orders.php" class="cmd">♦ Orders</a></td>
        <td><a href="logout.php" class="cmd">♦ Logout</a>
    </table>
  </div>
</body>

</html>