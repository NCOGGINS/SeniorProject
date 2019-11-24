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

$taxQuery = "SELECT SUM(TaxAmount) FROM Tax";
$taxResult = mysqli_query($con, $taxQuery);
$taxRow = mysqli_fetch_array($taxResult);
$tax = $taxRow['SUM(TaxAmount)'] / 12;

$InsuranceQuery = "SELECT SUM(InsuranceCost) FROM Insurance";
$insuranceResult = mysqli_query($con, $InsuranceQuery);
$InsuranceRow = mysqli_fetch_array($insuranceResult);
$Insurance = $InsuranceRow['SUM(InsuranceCost)'] / 12;

$MaintenanceQuery = "SELECT SUM(Cost) FROM Maintenance";
$Maintenanceresult = mysqli_query($con, $MaintenanceQuery);
$MaintenanceRow = mysqli_fetch_array($Maintenanceresult);
$Maintenance = $MaintenanceRow['SUM(Cost)'] / 12;

$Total = ($tax + $Insurance + $Maintenance);

mysqli_close($con);
?>
		<table id="summary" border="0" cellspacing="2" cellpadding="2">

			<?php
$row = mysqli_fetch_array($result);
$RentIncome = $row['SUM(RentCost)'];
$Profit = $RentIncome - $Total;
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
			<td style="padding: 20px 0px 20px 0px;">
				<?php echo "$$Total"; ?>
			</td>
						<td style="padding: 20px 0px 20px 0px;">
				<?php echo "$$Profit"; ?>
			</td>
		</tr>
    <?php
    echo "<summary>";
    ?>


































</body>
</html>
