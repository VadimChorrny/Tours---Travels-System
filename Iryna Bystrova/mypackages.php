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
$id = $_POST['pack'];
$p = mysqli_query($al, "SELECT * FROM holiday WHERE id='$id'");
$q = mysqli_fetch_array($p);
$rate = $q['amount'];
$pack = $q['name'];
$j = $_POST['j'];
$m = $_POST['mem'];
$d = $_POST['d'];

$amount = $m * $rate;
if ($id != NULL && $j != NULL && $m != NULL && $d != NULL) {
    $sql = mysqli_query($al, "INSERT INTO bookings(email,package,members,journey,amount,date,status) VALUES('$email','$pack','$m','$j','$amount','$d','0')");
    if ($sql) {
        $info = "Successfully Received Your Booking Info.<br> Total Amount Payable for $m Member(s) is INR $amount";
    } else {
        $info = "Error Please Try Again";
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
    <div class="mypackages__wrapper">
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
        <div class="package__list">
            <table>
                <thead>
                    <tr>
                        <th>Sr.No.</th>
                        <th>Package Name</th>
                        <th>Journey By</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $u = 1;
                    $x = mysqli_query($al, "SELECT * FROM bookings WHERE email='$email'");
                    while ($y = mysqli_fetch_array($x)) {
                    ?>
                        <tr>
                            <td><?php echo $u;
                                $u++; ?></td>
                            <td><?php echo $y['package']; ?></td>
                            <td><?php echo $y['journey']; ?></td>
                            <td><?php echo "INR " . $y['amount']; ?></td>
                            <td><?php echo $y['date']; ?></td>
                            <td><?php if ($y['status'] == 1) {
                                    echo "Approved";
                                } else {
                                    echo "Pending";
                                } ?></td>

                            <td><a href="deleteH.php?d=<?php echo $y['id']; ?>" class="link">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <br />
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