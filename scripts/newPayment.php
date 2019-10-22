<!DOCTYPE html>
<html>
<head>
<title>Insert</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
include ("dbinfo.inc.php");

$con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");

$date = mysqli_real_escape_string($con, $_REQUEST['date']);
$id = mysqli_real_escape_string($con, $_REQUEST['id']);
$amount = mysqli_real_escape_string($con, $_REQUEST['amount']);
$onTime = mysqli_real_escape_string($con, $_REQUEST['onTime']);

$query = "INSERT INTO Rent (`paymentDate`,`OnTime`,`Renter_RenterID`,`amount`) VALUES ('$date', '$onTime.', '$id', '$amount')";
mysqli_query($con, $query);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    echo "<script> window.location.assign('../paymentHistory.html?RenterID=$id'); </script>";
}

mysqli_close($con);
?> 
    </body>
</html>