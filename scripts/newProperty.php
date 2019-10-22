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

$StreetAddress = mysqli_real_escape_string($con, $_REQUEST['StreetAddress']);
$PurchasePrice = mysqli_real_escape_string($con, $_REQUEST['price']);
$userEmail = mysqli_real_escape_string($con, $_REQUEST['userEmail']);
$YearBuilt = mysqli_real_escape_string($con, $_REQUEST['YearBuilt']);
$City = mysqli_real_escape_string($con, $_REQUEST['City']);
$State = mysqli_real_escape_string($con, $_REQUEST['State']);
$ZIP = mysqli_real_escape_string($con, $_REQUEST['ZIP']);

$query = "INSERT INTO Property (`StreetAddress`, `Purchase Price`, `Owner_email`, `YearBuilt`,`City`,`State`,`ZIP`)
VALUES ('$StreetAddress', '$PurchasePrice', '$userEmail', '$YearBuilt', '$City', '$State', '$ZIP')";
mysqli_query($con, $query);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    echo "<script> window.location.assign('../properties.html'); </script>";
}

mysqli_close($con);
?> 
    </body>
</html>