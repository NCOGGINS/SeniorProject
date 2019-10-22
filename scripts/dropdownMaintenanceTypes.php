<!DOCTYPE html>
<html>
<head>
<title>List of Owners</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/css.css">
</head>
<body>

		<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("dbinfo.inc.php");
$con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");

$query = "SELECT * FROM MaintenanceType";
$result = mysqli_query($con, $query);

echo "<input type='search' list='maintenanceType' name = 'maintenanceType'/>";
echo "<datalist id='maintenanceType'?";
echo "<option disabled selected value> -- select an option -- </option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option>$row[MaintenanceName]</option>";
}
echo "</datalist>";

mysqli_close($con);

?>


</body>
</html>
