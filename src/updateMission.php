<?php

include 'connection.php';

$missionGeoJSON = $_POST['missionGeoJSON'];
$missionName = $_POST['missionName'];
$missionID = $_POST['missionID'];

// FIXME: SANITIZE THE QUERY FIRST, POSSIBLE SQL INJECTION BUG IS HERE!!
$sql = "UPDATE Mission SET
            geoJSON='$missionGeoJSON',
            missionName='$missionName'
        WHERE id=$missionID";

if (mysqli_query($conn, $sql)) {
    echo "OK";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
