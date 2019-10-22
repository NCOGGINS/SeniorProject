<!DOCTYPE html>
<html>
<head>
<title>List of Renters</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

		<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("dbinfo.inc.php");
$con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");

$RenterID = $_GET["RenterID"];
$query = "SELECT * FROM Renter WHERE RenterID = $RenterID";
$result = mysqli_query($con, $query);

echo "<b><center>Renter Information</center></b><br><br>";
?>
		<table id="renter" border="0" cellspacing="2" cellpadding="2">
		<tr>
			<th>Name</th>
			<th>Lease Start Date</th>
			<th>Lease End Date</th>
			<th>StreetAddress</th>
			<th>RentCost</th>
		</tr>

			<?php
$row = mysqli_fetch_array($result);

$FirstName = $row['FirstName'];
$LastName = $row['LastName'];
$LeaseStartDate = $row['Lease Start Date'];
$LeaseEndDate = $row['Lease End Date'];

$Property_PropertyID = $row['Property_PropertyID'];
$query2 = "SELECT StreetAddress FROM Property WHERE PropertyID = $Property_PropertyID";
$result2 = mysqli_query($con, $query2);

mysqli_close($con);

$row2 = mysqli_fetch_array($result2);
$StreetAddress = $row2['StreetAddress'];


$RentCost = $row['RentCost'];
?>

			<tr>
			<td>
					<?php echo "$FirstName $LastName"; ?>
				</td>
			<td>
					<?php echo "$LeaseStartDate"; ?>
				</td>
			<td>
					<?php echo "$LeaseEndDate"; ?>
				</td>
			<td>
					<?php echo $StreetAddress; ?>
				</td>
			<td>
					<?php echo "$$RentCost"; ?>
				</td>
		</tr>

    <?php

    echo "<renter>";
    ?>






</body>
</html>
