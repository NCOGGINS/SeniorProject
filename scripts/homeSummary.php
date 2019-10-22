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
$query = "SELECT SUM(RentCost) FROM Renter";
$result = mysqli_query($con, $query);
mysqli_close($con);
?>
		<table id="summary" border="0" cellspacing="2" cellpadding="2">

			<?php
$row = mysqli_fetch_array($result);
$RentIncome = $row['SUM(RentCost)'];
?>
		<tr>
		<td>Total Rent Income</td>
		<td>
				<?php echo "$$RentIncome"; ?>
			</td>
		</tr>
		<tr>
			<td>Expected Expenditures</td>
		</tr>
		<tr>
			<td>Expected Profit</td>
		</tr>
    <?php
    echo "<summary>";
    ?>
































</body>
</html>
