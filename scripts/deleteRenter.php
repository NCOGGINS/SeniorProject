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

$RenterID = $_GET['RenterID'];
$query = "DELETE FROM `Renter`WHERE RenterID = $RenterID";
mysqli_query($con, $query);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    echo "<script> window.location.assign('../renters.html'); </script>";
}

mysqli_close($con);
?> 
    </body>
</html>