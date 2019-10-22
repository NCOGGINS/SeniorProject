<!DOCTYPE html>
<html>
<head>
<title>Insert</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/css.css">
</head>
<body>
<?php
include ("dbinfo.inc.php");

$con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");

$id = mysqli_real_escape_string($con, $_REQUEST['id']);

$query = "DELETE FROM Property WHERE PropertyID='$id';";
mysqli_query($con, $query);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    // echo "SQL is...<br>";
    // echo $query;
    // echo "<br> Rows affected: ";
    // echo mysqli_affected_rows($con);
    echo "Property deleted.";
}

mysqli_close($con);
?> 
    </body>
</html>