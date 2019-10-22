<!DOCTYPE html>
<html>
<head>
<title>List of Owners</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

		<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("dbinfo.inc.php");
$con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");

$query = "SELECT * FROM Property";
$result = mysqli_query($con, $query);

echo "<input type='search' list='property' name = 'property'/>";
echo "<datalist id='property'?";
echo "<option disabled selected value> -- select an option -- </option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option>$row[StreetAddress]</option>";
}
echo "</datalist>";

mysqli_close($con);

?>


</body>
</html>
