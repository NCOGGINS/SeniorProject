<!DOCTYPE html>
<html>
<head>
<title>Insert</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="csscss.css">
</head>
<body>
<?php
include ("dbinfo.inc.php");

$con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");

$FirstName = mysqli_real_escape_string($con, $_REQUEST['FirstName']);
$last = mysqli_real_escape_string($con, $_REQUEST['last']);
$start = mysqli_real_escape_string($con, $_REQUEST['start']);
$end = mysqli_real_escape_string($con, $_REQUEST['end']);
$Property = mysqli_real_escape_string($con, $_REQUEST['property']);
$cost = mysqli_real_escape_string($con, $_REQUEST['cost']);

$firstQuery = "SELECT PropertyID FROM Property Where StreetAddress = '$Property'";
$result = mysqli_query($con, $firstQuery);

echo $start;

$row = mysqli_fetch_array($result);
$Property_PropertyID = $row['PropertyID'];

$query = "INSERT INTO Renter (`FirstName`,`LastName`,`Lease Start Date`,`Lease End Date`,`Property_PropertyID`,`RentCost`) VALUES ('$FirstName', '$last', '$start', '$end', '$Property_PropertyID', '$cost')";
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