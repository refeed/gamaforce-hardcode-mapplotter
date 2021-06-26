<?php

include 'connection.php';

$missionID = $_POST['missionID'];

// FIXME: SANITIZE THE QUERY FIRST, POSSIBLE SQL INJECTION BUG IS HERE!!
$sql = "DELETE FROM Mission WHERE id=$missionID";

if (mysqli_query($conn, $sql)) {
    echo "OK";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
