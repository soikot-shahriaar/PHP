<?php

$insert = false;
$update = false;
$delete = false;

// Connect to the Database 

$servername = "localhost";
$username = "root";
$password = "";
$database = "NoteNest";

// Create Connection

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Sorry! We Failed to Connect: " . mysqli_connect_error());
}

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
}

// Insertion & Updation

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {

        $sno = $_POST["snoEdit"];
        $title = $_POST["titleEdit"];
        $description = $_POST["descriptionEdit"];

        $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "Sorry! We Could not Update the Note Successfully.";
        }
    } else {
        $title = $_POST["title"];
        $description = $_POST["description"];

        $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        } else {
            echo "The Note was not Inserted Successfully, Because of this Error ---> " . mysqli_error($conn);
        }
    }
}
