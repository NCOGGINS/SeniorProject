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
			<th style="padding: 20px 0px 20px 0px;">Total Rent Income</th>
			<th style="padding: 20px 0px 20px 0px;">Expected Expenditures</th>
			<th style="padding: 20px 0px 20px 0px;">Expected Profit</th>
		</tr>
		<tr>
			<td style="padding: 20px 0px 20px 0px;">
				<?php echo "$$RentIncome"; ?>
			</td>
		</tr>
    <?php
    echo "<summary>";
    ?>
































</body>
</html>
