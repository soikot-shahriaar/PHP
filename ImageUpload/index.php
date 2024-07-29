<?php
include "dbconnect.php";

$showAlert = false;
$showError = false;

// Check if the file upload is initiated
if (isset($_FILES["image"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verify if the uploaded file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $showError = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if the file already exists in the target directory
    if (file_exists($targetFile)) {
        $showError = "Sorry, File already exists.";
        $uploadOk = 0;
    }

    // Check if the file size exceeds the maximum allowed size
    if ($_FILES["image"]["size"] > 500000) {
        $showError = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if the file type is allowed (JPG, JPEG, PNG)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $showError = "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $id = rand(10000000, 99999999);

            $fileName = basename($targetFile);
            $sql = sprintf("INSERT INTO img (id, pic) VALUES (%d, '%s')", $id, mysqli_real_escape_string($conn, $fileName));
            
            if (mysqli_query($conn, $sql)) {
                $showAlert = "File uploaded successfully.";
                header("Location: image.php");
                exit(); 
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            $showError = "Sorry, there was an error uploading your file.";
        }
    } else {
        $showError = "Sorry, your file was not uploaded.";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Upload Image</title>
</head>

<body>

    <?php
    if ($showAlert) {
        echo '<div class="container alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> ' . $showAlert . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    if ($showError) {
        echo '<div class="container alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
    ?>

    <section id="s_content">
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2 class="text-dark">Image Upload Form</h2>
                            <short class="text-dark">[Only jpg, jpeg, png file extensions are allowed]</short>
                        </div>

                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <input type="file" name="image">
                                </div>
                                <button type="submit" name="submit" class="btn btn-sm btn-outline-primary fw-bold">Upload & See Image</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eHz" crossorigin="anonymous">
    </script>
</body>

</html>