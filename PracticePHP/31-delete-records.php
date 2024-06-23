<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_skt_01";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
} else {
    echo "Connection was successful<br>";
}


$sql = "DELETE FROM `phptrip` WHERE `dest` = 'Russia' LIMIT 3";
$result = mysqli_query($conn, $sql);

// Number of effected records
$aff = mysqli_affected_rows($conn);
echo "<br>Number of affected rows: $aff <br>";

if ($result) {
    echo "Delete successfully";
} else {
    $err = mysqli_error($conn);
    echo "Not Delete successfully due to this error --> $err";
}
