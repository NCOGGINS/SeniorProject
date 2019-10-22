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

$username = mysqli_real_escape_string($con, $_REQUEST['username']);
$email = mysqli_real_escape_string($con, $_REQUEST['email']);
$password = mysqli_real_escape_string($con, $_REQUEST['password']);

$query = "INSERT INTO Owner (`username`,`email`,`password`) VALUES ('$username', '$email.', '$password')";

mysqli_query($con, $query);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    echo "<script> window.location.assign('../index.html'); </script>";
}
mysqli_close($con);
?> 
    </body>
</html>