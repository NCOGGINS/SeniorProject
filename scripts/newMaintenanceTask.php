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

$MaintenanceName = mysqli_real_escape_string($con, $_REQUEST['maintenanceType']);
$InstallDate = mysqli_real_escape_string($con, $_REQUEST['installDate']);
$PropertyID = $row['PropertyID'];
$Cost = mysqli_real_escape_string($con, $_REQUEST['cost']);
$ServiceDue = mysqli_real_escape_string($con, $_REQUEST['serviceDate']);

$query = "INSERT INTO Maintenance (`Install Date`,`Cost`,`Property_PropertyID`,`Service Due`) VALUES ('$InstallDate', '$Cost', '$PropertyID', '$ServiceDue')";
mysqli_query($con, $query);
if (mysqli_errno($con) != 0) {
    echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
} else {
    $maintenanceidquery = "Select MaintenanceID FROM Maintenance WHERE 'Property_PropertyID' = '$PropertyID' & 'Install Date' = '$InstallDate' & 'Cost' = '$Cost' & 'Service Due' = '$ServiceDue'";   
    $maintenanceresult = mysqli_query($con, $maintenanceidquery);
    mysqli_query($con, $maintenanceidquery);
    if (mysqli_errno($con) != 0) {
        echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
       
    } else {
        $maintenancerow = mysqli_fetch_array($maintenanceresult);
        $MaintenanceID = $maintenancerow['MaintenanceID'];
        echo $MaintenanceID;
        $maintenanceTypequery = "Select MaintenanceTypeID FROM MaintenanceType WHERE 'MaintenanceName' = '$MaintenanceName'";
        $maintenanceTyperesult = mysqli_query($con, $maintenanceTypequery);
        if (mysqli_errno($con) != 0) {
            echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
        } else {
            $MaintenanceTypeRow = mysqli_fetch_array($maintenanceTyperesult);
            $MaintenanceTpeID = $MaintenanceTypeRow['MaintenanceTypeID'];
            $joinquery = "INSERT INTO MaintenanceTypeHasMaintenance (`Maintenance Type_MaintenanceTypeID`,`Maintenance_MaintenanceID`) VALUES ('$MaintenanceTpeID', '$MaintenanceID')";
            mysqli_query($con, $joinquery);
            if (mysqli_errno($con) != 0) {
                echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
                echo $joinquery;
            } else{
                "Maintenance Item Added.";
            }
        }
    }
}

mysqli_close($con);
?> 
    </body>
</html>