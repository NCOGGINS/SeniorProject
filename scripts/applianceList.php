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

$query = "SELECT * FROM ApplianceType";
$result = mysqli_query($con, $query);

echo "<form action='scripts/newAppliance.php' method='post'>";
echo "<input type='search' list='appliance' />";
echo "<datalist id='appliance'?";
while ($row = mysqli_fetch_array($result)) {
    echo "<option>$row[ApplianceName]</option>";
}
echo "</datalist>";
echo "<br></div><br><input type='Submit'></form>";

mysqli_close($con);

?>


</body>
</html>
