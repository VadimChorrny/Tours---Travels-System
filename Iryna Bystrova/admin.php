<?php
include("setting.php");
session_start();
if (isset($_SESSION['aid'])) {
	header("location:ahome.php");
}
$e = mysqli_real_escape_string($al, $_POST['aid']);
$p = mysqli_real_escape_string($al, $_POST['pass']);
if ($_POST['aid'] != NULL && $_POST['pass'] != NULL) {
	$pp = sha1($p);
	$sql = mysqli_query($al, "SELECT * FROM admin WHERE aid='$e' AND password='$pp'");
	if (mysqli_num_rows($sql) == 1) {
		$_SESSION['aid'] = $e;
		header("location:ahome.php");
	} else {
		$info = "Incorrect Admin ID or Password";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Tour &amp; Travels System</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="admin__wrapper">
		<div class="header">
			<h1>Iryna Bystrova</h1>
		</div>
		<br />
		<br />
		<div class="signin__wrapper">
			<form method="post" action="" id="home-auth">
				<h2>Sign In</h2>
				<input type="text" name="aid" id="email-input" placeholder="Enter Admin ID" required="required" autocomplete="off" />
				<input type="password" name="pass" id="password-input" placeholder="Password" required="required" autocomplete="off" />
				<br>
				<br>
				<input type="submit" value="Login" class="login" />
				<h3><a href="index.php">BACK</a></h3>
			</form>
		</div>
	</div>
</body>


<!--Creator Iryna Bystrova
======================================
| irynabystrova2002@gmail.com        |
| +380 97 740 56 10                  |
| https://github.com/irynabystrovaaa |
======================================
-->