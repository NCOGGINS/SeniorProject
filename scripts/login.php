<!DOCTYPE html>
<html>
<head>
<title>Insert</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
include ("dbinfo.inc.php");

$con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");

$username = mysqli_real_escape_string($con, $_REQUEST['username']);
$password = mysqli_real_escape_string($con, $_REQUEST['password']);

$query = "SELECT OwnerID, email FROM Owner WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
    $id = $row['OwnerID'];
    $email = $row['email'];
}
if($id > 0){
    $msg = 'Login Complete! Thanks';
    echo "<script> sessionStorage.setItem('userId', '$id'); </script>";
    echo "<script> sessionStorage.setItem('userEmail', '$email'); </script>";
    echo "<script> window.location.assign('../home.html'); </script>";
}
else{
    $msg = 'Login Failed!<br /> Please make sure that you enter the correct  details and that you have activated your account.';
}
mysqli_close($con);
?> 

<?php 
            if(isset($msg)){ // Check if $msg is not empty
                echo '<div class="statusmsg">'.$msg.'</div>'; // Display our message and add a div around it with the class statusmsg
            } ?>
    </body>
</html>