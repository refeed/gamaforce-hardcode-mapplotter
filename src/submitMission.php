<?php

include 'connection.php';

$missionGeoJSON = $_POST['missionGeoJSON'];
$missionName = $_POST['missionName'];

// FIXME: SANITIZE THE QUERY FIRST, POSSIBLE SQL INJECTION BUG IS HERE!!
// TODO: Validate the GeoJSON
$sql = "INSERT INTO Mission (missionName, geoJSON)
        VALUES ('$missionName', '$missionGeoJSON')";

if (mysqli_query($conn, $sql)) {
    echo "OK";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
