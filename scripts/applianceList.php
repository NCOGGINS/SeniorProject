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

$query = "SELECT * FROM Appliances";
$result = mysqli_query($con, $query);

mysqli_close($con);

?>
		<table id="appliances">
		<tr>
			<th>ApplianceID</th>
			<th>Install Date</th>
			<th>Cost</th>
		</tr>

			<?php
while ($row = mysqli_fetch_array($result)) {

    $ApplianceID = $row['ApplianceID'];
    $InstallDate = $row['InstallDate'];
    $Cost = $row['Cost'];

    ?>

		<tr>

			<td>
					<?php echo "$ApplianceID"; ?>
				</td>
			<td>
					<?php echo "$InstallDate"; ?>
				</td>
			<td>
					<?php echo "$Cost"; ?>
				</td>
		</tr>

    <?php
}
echo "<appliances>";
?>

</body>
</html>