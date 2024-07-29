<?php include "dbconnect.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Display Images</title>
</head>

<body>
    <section id="s_content">
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="text-dark">Uploaded Images Display</h3>
                        </div>
                        <div class="card-body">
                            <div class="row gx-4 gy-4">
                            <?php
                            $sql = "SELECT * FROM img";
                            $result = mysqli_query($conn, $sql);

                            // Display Images
                            while ($row = mysqli_fetch_assoc($result)) {
                                $image = $row['pic'];
                                echo '<div class="col-md-4">
                                    <img src="uploads/' . $image . '" class="img-fluid" alt="Uploaded Image">
                                    </div>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-4 text-center">
            <a href="index.php" class="btn btn-sm btn-outline-primary">Upload Another Image</a>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eHz" crossorigin="anonymous"></script>
</body>

</html>
