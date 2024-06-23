<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

?>

<!-- HTML Starts Here -->

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Welcome - <?php echo $_SESSION['username'] ?></title>

</head>

<body>
  <?php require 'partials/_nav.php' ?>

  <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h3 class="alert-heading">Welcome - <?php echo $_SESSION['username'] ?></h3>
      <h5>SecureGate: Where your security is our priority. You are logged in as <?php echo $_SESSION['username'] ?>.</h5>
      <p>Welcome to SecureGate, your gateway to a protected online experience! Whether you're logging in, signing up, or exploring our secure features, trust that your online journey is safeguarded every step of the way. Embrace peace of mind with SecureGate – where security meets seamless connectivity.</p>
      <hr>
      <p class="mb-0">Whenever you need to, you can also <a class="text-decoration-none" href="/SecureGate/logout.php"> logout</a> from here.</p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>