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
$pass = $b['password'];
$old = sha1($_POST['old']);
$p1 = sha1($_POST['p1']);
$p2 = sha1($_POST['p2']);
if ($_POST['old'] == NULL || $_POST['p1'] == NULL || $_POST['p2'] == NULL) {
	//ASL Do Nothing
} else {
	if ($old != $pass) {
		$info = "Incorrect Old Password";
	} elseif ($p1 != $p2) {
		$info = "New Password Didn't Matched";
	} else {
		mysqli_query($al, "UPDATE admin SET password='$p2' WHERE aid='$aid'");
		$info = "Successfully Changed your Password";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Tour &amp; Travels System</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.ashu {
			border: 1px solid #333;
			border-collapse: collapse;
			color: #FFF;
			text-shadow: 1px 1px 1px #000000;
		}
	</style>
</head>

<body>
	<div class="changePassword__wrapper">
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
		<br>
		<br>
		<div class="change__form">
			<form method="post" action="">
				<table>
					<tr>
						<td id="text">Old Password :</td>
						<td><input id="inp-pass" type="password" name="old" size="25" placeholder="Enter Old Password" required="required" /></td>
					</tr>
					<tr>
						<td id="text">New Password :</td>
						<td><input id="inp-pass" type="password" name="p1" size="25" placeholder="Enter New Password" required="required" /></td>
					</tr>
					<tr>
						<td id="text">Re-Type Password :</td>
						<td><input id="inp-pass" type="password" name="p2" size="25" placeholder="Re-Type New Password" required="required" /></td>
					</tr>
					<tr>
						<td><input type="submit" value="Change Password" id="changePassword" /></td>
					</tr>
				</table>
			</form>
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