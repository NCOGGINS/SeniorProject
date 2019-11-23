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

$StreetAddress = $_GET['address'];

$idquery = "Select PropertyID FROM Property WHERE StreetAddress = '$StreetAddress'";
$result = mysqli_query($con, $idquery);
mysqli_query($con, $idquery);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    $row = mysqli_fetch_array($result);
}

$ApplianceName = mysqli_real_escape_string($con, $_REQUEST['ApplianceType']);
$InstallDate = mysqli_real_escape_string($con, $_REQUEST['installDate']);
$PropertyID = $row['PropertyID'];
$Cost = mysqli_real_escape_string($con, $_REQUEST['cost']);

$query = "INSERT INTO Appliances (`InstallDate`,`Cost`,`Property_PropertyID`) VALUES ('$InstallDate', '$Cost', '$PropertyID')";
mysqli_query($con, $query);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    $Applianceidquery = "Select ApplianceID FROM Appliances WHERE Property_PropertyID = '$PropertyID' AND Cost = '$Cost'";   
    $Applianceresult = mysqli_query($con, $Applianceidquery);
    if (mysqli_errno($con) != 0) {
        echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
    } else {
        $Appliancerow = mysqli_fetch_array($Applianceresult);
        $ApplianceID = $Appliancerow['ApplianceID'];
        $ApplianceTypequery = "Select ApplianceTypeID FROM ApplianceType WHERE ApplianceName = '$ApplianceName'";
        echo $ApplianceName;
        $ApplianceTyperesult = mysqli_query($con, $ApplianceTypequery);
        if (mysqli_errno($con) != 0) {
            echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
        } else {
            $ApplianceTypeRow = mysqli_fetch_array($ApplianceTyperesult);
            $ApplianceTypeID = $ApplianceTypeRow['ApplianceTypeID'];
            $joinquery = "INSERT INTO ApplianceTypeHasAppliances (`Appliance Type_ApplianceTypeID`,`Appliances_ApplianceID`) VALUES ('$ApplianceTypeID', '$ApplianceID')";
            mysqli_query($con, $joinquery);
            if (mysqli_errno($con) != 0) {
                echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
                echo $joinquery;
            } else{
               echo "Appliance Added.";
            }
        }
    }
}

mysqli_close($con);
?> 
    </body>
</html>