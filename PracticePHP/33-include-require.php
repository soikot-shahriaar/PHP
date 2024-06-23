<?php

// include '_dbconnect1.php';
require '_dbconnect.php';


$sql = "SELECT * FROM `phptrip`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);
echo $num . " records found in the DataBase<br>";
$no = 1;
if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $no .  ". Hello " . $row['name'] . " Welcome to " . $row['dest'];
        echo "<br>";
        $no = $no + 1;
    }
}
