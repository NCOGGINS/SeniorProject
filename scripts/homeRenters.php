<!DOCTYPE html>
<html>
<head>
<title>List of Renters</title>
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
$query = "SELECT * FROM Renter LIMIT 3";
$result = mysqli_query($con, $query);

?>
		<table id="renter" border="0" cellspacing="2" cellpadding="2">
		<tr>
			<th>PropertyID</th>
			<th>Name</th>
			<th>Rent Amount</th>
			<th>Lease End Date</th>
		</tr>

			<?php
while ($row = mysqli_fetch_array($result)) {

    $FirstName = $row['FirstName'];
    $LastName = $row['LastName'];
    $RenterID = $row['RenterID'];
    $LeaseEndDate = $row['Lease End Date'];
    $Property_PropertyID = $row['Property_PropertyID'];
    $RentCost = $row['RentCost'];
    ?>

			<tr>
							<?php
    $query2 = "SELECT StreetAddress FROM Property WHERE PropertyID=$Property_PropertyID";
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($result2);
    $StreetAddress = $row2['StreetAddress'];
    ?>	
			<td>
					<?php echo $StreetAddress; ?>
				</td>
			<td>
					<?php echo "$FirstName $LastName"; ?>
				</td>
			<td>
					<?php echo "$$RentCost"; ?>
				</td>

			<td>
					<?php echo "$LeaseEndDate"; ?>
				</td>
		</tr>

    <?php
}
mysqli_close($con);
echo "<renter>";
?>
















</body>
</html>
