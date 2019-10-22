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

$PropertyID = mysqli_real_escape_string($con, $_REQUEST['PropertyID']);
$query = "SELECT * FROM Tax WHERE Property_PropertyID= $PropertyID";
$result = mysqli_query($con, $query);

mysqli_close($con);

echo "<b><center>Properties</center></b><br><br>";
?>
		<table id="renter" border="0" cellspacing="2" cellpadding="2">
		<tr>
			<th>TaxID</th>
			<th>TaxAmount</th>
			<th>TaxPayDate</th>
		</tr>

			<?php
while ($row = mysqli_fetch_array($result)) {

    $TaxID = $row['TaxID'];
    $TaxAmount = $row['TaxAmount'];
    $TaxPayDate = $row['TaxPayDate'];
    ?>

			<tr>
			<td>
					<?php echo "$TaxID"; ?>
				</td>
			<td>
					<?php echo "$TaxAmount"; ?>
				</td>
			<td>
					<?php echo "$TaxPayDate"; ?>
				</td>

		</tr>

    <?php
}
echo "<renter>";
?>




















</body>
</html>
