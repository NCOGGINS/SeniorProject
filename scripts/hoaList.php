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

$query = "SELECT * FROM HOA";
$result = mysqli_query($con, $query);

?>
		<table id="how">
		<tr>
			<th>Address</th>
			<th>Payment Due Date</th>
			<th>Fee Amount</th>
		</tr>

			<?php
while ($row = mysqli_fetch_array($result)) {
    $PropertyID = $row['Property_PropertyID'];
    $propertyquery = "SELECT StreetAddress FROM Property WHERE PropertyID = $PropertyID";
    $propertyresult = mysqli_query($con, $propertyquery);
    $propertyrow = mysqli_fetch_array($propertyresult);

    $addresss = $propertyrow['StreetAddress'];
    $HOAPayDate = $row['HOAPayDate'];
    $HOAFee = $row['HOAFee'];
    ?>

			<tr>
			<td>
			<?php echo "<a href='property.html?address=$addresss'> $addresss"; ?>
				</td>
			<td>
					<?php echo "$HOAPayDate"; ?>
				</td>
			<td>
					<?php echo "$HOAFee"; ?>
				</td>

		</tr>

    <?php
}
mysqli_close($con);
echo "<properties>";
?>








</body>
</html>
