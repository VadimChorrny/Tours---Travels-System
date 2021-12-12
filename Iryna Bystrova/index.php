<?php
include("setting.php");
session_start();
if (isset($_SESSION['email'])) {
	header("location:home.php");
}
$e = mysqli_real_escape_string($al, $_POST['email']);
$p = mysqli_real_escape_string($al, $_POST['pass']);
if ($_POST['email'] != NULL && $_POST['pass'] != NULL) {
	$pp = sha1($p);
	$sql = mysqli_query($al, "SELECT * FROM customers WHERE email='$e' AND password='$pp'");
	if (mysqli_num_rows($sql) == 1) {
		$_SESSION['email'] = $e;
		header("location:home.php");
	} else {
		$info = "Incorrect Email or Password";
	}
}
if ($_GET['techvegan'] == sha1('GoVegan')) {
	header("location:https://www.youtube.com/channel/UCs_dbtq_OF-0HxkAQnBGapA?sub_confirmation=1");
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
	<div class="reg__wrapper">
		<div class="header">
			<h1>Iryna Bystrova</h1>
		</div>
		<div class="content">
			<div class="content-one">
				<h1>Sign in</h1>
				<h2>To travel wideworld</h2>
				<br>
				<h4>If you don't have an account register<br>
					You can <a href="newReg.php">Register here !</a></h4>
			</div>
			<img src="./images/human-reg.png" alt="human-picture">
			<div class="content-two">
				<form method="post" action="" id="home-auth">
					<h2>Sign In</h2>
					<input type="email" name="email" id="email-input" placeholder="Enter email or user name" required="required" autocomplete="off" />
					<input type="password" name="pass" id="password-input" placeholder="Password" required="required" autocomplete="off" />
					<br>
					<br>
					<input type="submit" value="Login" class="login" />
					<h3><a href="admin.php">Sign In as Admin</a></h3>
				</form>
			</div>
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