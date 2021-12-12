<?php
include("setting.php");
$n=$_POST['name'];
$e=$_POST['email'];
$c=$_POST['contact'];
$p=sha1($_POST['pass']);
if($n!=NULL && $e!=NULL && $c!=NULL && $_POST['pass']!=NULL)
{
	$sql=mysqli_query($al, "INSERT INTO customers(name,email,contact,password) VALUES('$n','$e','$c','$p')");
	if($sql)
	{
		$info="Successfully Registered";
	}
	else
	{
		$info="Email ID Already Exists";
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
<div id="header">
<div align="center">
<span class="headingMain">Online Tours &amp; Travels System</span>
</div>
</div>
<br />
<br />
<div align="center"><br />
<br />
<span class="subHead">Registration Panel</span><br />
<br />

<form method="post" action="">
<table border="0" align="center" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" class="info" align="center"><?php echo $info;?></td></tr>
<tr><td class="labels">Name : </td><td><input type="text" size="25" name="name" class="fields" placeholder="Enter Full Name" required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Email : </td><td><input type="email" size="25" name="email" class="fields" placeholder="Enter Email ID" required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Contact : </td><td><input type="text" size="25" name="contact" class="fields" placeholder="Enter Mobile No." required="required" autocomplete="off" /></td></tr>
<tr><td class="labels">Password : </td><td><input type="password" size="25" name="pass" class="fields" placeholder="Enter Password" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Login" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="index.php" class="link">HOME</a>
</div>
</body>

</html>