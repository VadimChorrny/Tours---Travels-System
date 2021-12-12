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
$n = $_POST['name'];
$am = $_POST['amount'];
if ($n != NULL && $am != NULL) {
	$sql = mysqli_query($al, "INSERT INTO holiday(name,amount) VALUES('$n','$am')");
	if ($sql) {
		$info = "Successfully Added";
	} else {
		$info = "Package Name Already Exists";
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
		}
	</style>
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
			<h1 class="logo"><a href="ahome.php">Iryna Bystrova</a></h1>
		</div>
	</nav>
	<br />
	<br />
	<br />
	<br />
	<div align="center"> <span class="subHead">Manage Holiday Packages<br />
			<br />
			<form method="post" action="">
				<table border="0" cellpadding="2" cellspacing="2" class="design">
					<tr>
						<td align="center" class="info"><?php echo $info; ?></td>
					</tr>
					<tr>
						<td><input type="text" name="name" placeholder="Enter Holiday Package Name" size="40" class="fields" required="required" autocomplete="off" /></td>
					</tr>
					<tr>
						<td><input type="text" name="amount" placeholder="Enter Amount Per Member" size="40" class="fields" required="required" autocomplete="off" /></td>
					</tr>
					<tr>
						<td align="center"><input type="submit" value="ADD" class="fields" /></td>
					</tr>
				</table>
			</form>
			<br />



			<span class="subHead">Current Holiday Packages<br /></span><br />

			<table border="0" cellpadding="5" cellspacing="5" class="design ashu">
				<tr class="labels ashu">
					<th class="ashu">Sr.No.</th>
					<th class="ashu">Package Name</th>
					<th class="ashu">Amount Per Member</th>
					<th class="ashu">Delete</th>
				</tr>
				<?php
				$u = 1;
				$x = mysqli_query($al, "SELECT * FROM holiday");
				while ($y = mysqli_fetch_array($x)) {
				?>
					<tr class="labels">
						<td class="ashu"><?php echo $u;
											$u++; ?></td>
						<td class="ashu"><?php echo $y['name']; ?></td>
						<td class="ashu"><?php echo "INR " . $y['amount']; ?></td>
						<td class="ashu"><a href="deleteH.php?del=<?php echo $y['id']; ?>" class="link">Delete</a></td>
					</tr>
				<?php } ?>
			</table>

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