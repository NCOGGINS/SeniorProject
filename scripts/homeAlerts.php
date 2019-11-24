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

$alertsQuery = "select * from `Alerts` order by `Due Date` desc limit 3;";
$alertsResult = mysqli_query($con, $alertsQuery);

mysqli_close($con);
?>
		<table id="alerts" border="0" cellspacing="2" cellpadding="2">
		<tr>
			<th>Property ID</th>
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
			<td>
					<?php echo "$alertsPropertyID"; ?>
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
echo "<alerts>";
?>






</body>
</html>
