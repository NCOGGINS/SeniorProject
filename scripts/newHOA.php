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

$StreetAddress = $_GET['address'];
$idquery = "Select PropertyID FROM Property WHERE StreetAddress = '$StreetAddress'";
$result = mysqli_query($con, $idquery);
mysqli_query($con, $idquery);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    $row = mysqli_fetch_array($result);
}

$PropertyID = $row['PropertyID'];
$HOAPayDate = mysqli_real_escape_string($con, $_REQUEST['date']);
$HOAFee = mysqli_real_escape_string($con, $_REQUEST['amount']);

$query = "INSERT INTO HOA (`Property_PropertyID`,`HOAPayDate`,`HOAFee`) VALUES ('$PropertyID', '$HOAPayDate.', '$HOAFee')";
mysqli_query($con, $query);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    echo "New HOA created.";
}

mysqli_close($con);
?> 
    </body>
</html>