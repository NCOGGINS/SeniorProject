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

$alertsQuery = "select * from `Alerts` order by `Due Date` asc limit 3;";
$alertsResult = mysqli_query($con, $alertsQuery);


?>
		<table id="alerts" border="0" cellspacing="2" cellpadding="2">
		<tr>
			<th>Address</th>
			<th>Cost</th>
			<th>Due Date</th>

		</tr>

			<?php
while ($alertsRow = mysqli_fetch_array($alertsResult)) {

    $alertsPropertyID = $alertsRow['Property ID'];
    $alertsCost = $alertsRow['Cost'];
    $alertsDueDate = $alertsRow['Due Date'];

    ?>

			<tr>
										<?php
    $query2 = "SELECT StreetAddress FROM Property WHERE PropertyID=$alertsPropertyID";
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($result2);
    $StreetAddress = $row2['StreetAddress'];
    ?>	
			<td>
					<?php echo "$StreetAddress"; ?>
				</td>
			<td>
					<?php echo "$$alertsCost"; ?>
				</td>
			<td>
					<?php echo "$alertsDueDate"; ?>
				</td>

		</tr>
    <?php
}
mysqli_close($con);
echo "<alerts>";
?>










</body>
</html>
