<?php include 'dbconnect.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <title>NoteNest | PHP CRUD</title>

</head>

<body>


    <!-- Edit Modal -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title font-weight-bold" id="editModalLabel">Edit this Note</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form action="/NoteNest/index.php" method="POST">

                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label class="font-weight-bold" for="title">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold" for="desc">Note Description</label>
                            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Note</button>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <!-- Navbar -->

    <nav class="navbar navbar-dark bg-info">
        <a class="navbar-brand" href="#">
            <img src="logo.svg" width="50" height="32" class="d-inline-block align-top" alt="">
            <span class="font-weight-bold">NoteNest</span>
        </a>
    </nav>


    <!-- Alerts for Insert, Delete & Update -->

    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Note has been Inserted Successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
    </button>
  </div>";
    }
    ?>

    <?php
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Note has been Deleted Successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
    </button>
  </div>";
    }
    ?>

    <?php
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Note has been Updated Successfully.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
    </button>
  </div>";
    }
    ?>


    <!-- Form Section  -->

    <div class="container my-4">

        <div class="row justify-content-center  ">
            <h2 class="text-center font-weight-bold text-primary">Add Short Notes to NoteNest</h2>
        </div>
        <hr>

        <form action="/NoteNest/index.php" method="POST" class="mt-4">

            <div class="form-group">
                <label for="title" class="font-weight-bold">Note Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Note Title" required>
            </div>

            <div class="form-group">
                <label for="desc" class="font-weight-bold">Note Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Note Description" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>

    </div>


    <!-- Notes Data Tables -->

    <div class="container my-4">

        <div class="table-responsive">

            <table class="table" id="myTable">

                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT * FROM `notes`";
                    $result = mysqli_query($conn, $sql);
                    $sno = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sno = $sno + 1;
                        echo "<tr>
                            <th scope='row'>" . $sno . "</th>
                            <td>" . $row['title'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['sno'] . ">Edit</button> 
                            <button class='delete btn btn-sm btn-danger' id=d" . $row['sno'] . ">Delete</button>  
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="navbar navbar-dark bg-info d-flex justify-content-center align-items-center" style="height: 32px;">
        <p class="m-0"> @soikot.shahriaar</p>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="script.js"></script>

</body>

</html>