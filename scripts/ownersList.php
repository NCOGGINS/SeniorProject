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

$query = "SELECT * FROM Owner";
$result = mysqli_query($con, $query);

mysqli_close($con);

echo "<b><center>Database Output</center></b><br><br>";
?>
		<table id="owner" border="0" cellspacing="2" cellpadding="2">
		<tr>
			<th>ownerusername</th>
			<th>email</th>
			<th>ownerpassword</th>
			<th>ownerID</th>
		</tr>

			<?php
while ($row = mysqli_fetch_array($result)) {

    $ownerusername = $row['username'];
    $email = $row['email'];
    $ownerpassword = $row['password'];
    $ownerID = $row['OwnerID'];

    ?>

			<tr>
			<td>
					<?php echo "$ownerusername"; ?>
				</td>
			<td>
					<?php echo "$email"; ?>
				</td>
			<td>
					<?php echo "$ownerpassword"; ?>
				</td>
			<td>
					<?php echo "$ownerID"; ?>
				</td>
		</tr>

    <?php
}
echo "<renter>";
?>














</body>
</html>
