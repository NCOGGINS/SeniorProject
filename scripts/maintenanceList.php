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

$query = "SELECT * FROM Maintenance";
$result = mysqli_query($con, $query);

mysqli_close($con);

?>
		<table id="maintenance">
		<tr>
			<th>MaintanenceID</th>
			<th>Install Date</th>
			<th>Cost</th>
			<th>Service Due</th>
		</tr>

			<?php
while ($row = mysqli_fetch_array($result)) {

    $MaintenanceID = $row['MaintenanceID'];
    $InstallDate = $row['Install Date'];
    $Cost = $row['Cost'];
    $ServiceDue = $row['Service Due'];

    ?>

		<tr>

			<td>
					<?php echo "$MaintenanceID"; ?>
				</td>
			<td>
					<?php echo "$InstallDate"; ?>
				</td>
			<td>
					<?php echo "$Cost"; ?>
				</td>
			<td>
					<?php echo "$ServiceDue"; ?>
				</td>
		</tr>

    <?php
}
echo "<maintenance>";
?>

</body>
</html>