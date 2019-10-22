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

$id = $_GET['RenterID'];

$query = "SELECT * FROM Rent WHERE Renter_RenterID= $id";
$result = mysqli_query($con, $query);

mysqli_close($con);

echo "<b><center>Payment History</center></b><br><br>";
?>
		<table id="owner" border="0" cellspacing="2" cellpadding="2">
		<tr>
			<th>paymentDate</th>
			<th>OnTime</th>
			<th>amount</th>
		</tr>

			<?php
while ($row = mysqli_fetch_array($result)) {
    $id = $row['RentID'];
    $date = $row['paymentDate'];
    $onTime = $row['OnTime'];
    $amount = $row['amount'];
    ?>

			<tr>
			<td>
					<?php echo "$date"; ?>
				</td>
			<td>
					<?php echo "$onTime"; ?>
				</td>
			<td>
					<?php echo "$amount"; ?>
				</td>
		</tr>

    <?php
}
echo "<renter>";
?>














</body>
</html>
