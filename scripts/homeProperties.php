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

$query = "SELECT * FROM Property LIMIT 3";
$result = mysqli_query($con, $query);

mysqli_close($con);

?>
		<table id="renter" border="0" cellspacing="2" cellpadding="2">
		<tr>
			<th>Address</th>
			<th>Purchase Price</th>
			<th>Year Built</th>
			<th>City</th>
			<th>State</th>
			<th>Zip</th>
		</tr>

			<?php
while ($row = mysqli_fetch_array($result)) {

    $addresss = $row['StreetAddress'];
    $price = $row['Purchase Price'];
    $built = $row['YearBuilt'];
    $city = $row['City'];
    $state = $row['State'];
    $zip = $row['ZIP'];

    ?>

			<tr>
			<td>
					<?php echo "$addresss"; ?>
				</td>
			<td>
					<?php echo "$$price"; ?>
				</td>
			<td>
					<?php echo "$built"; ?>
				</td>
			<td>
					<?php echo "$city"; ?>
				</td>
			<td>
					<?php echo "$state"; ?>
				</td>
			<td>
					<?php echo "$zip"; ?>
				</td>
		</tr>

    <?php
}
echo "<renter>";
?>




</body>
</html>
