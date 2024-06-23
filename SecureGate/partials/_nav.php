<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bolder fs-3" href="/SecureGate">SecureGate</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav d-flex flex-row flex-sm-row flex-md-row">
        <li class="nav-item">
          <a class="btn btn-outline-light btn-sm me-2" href="/SecureGate/index.php">Home</a>
        </li>';

if (!$loggedin) {
  echo '  <li class="nav-item">
          <a class="btn btn-outline-light btn-sm me-2" href="/SecureGate/signup.php">SignUp</a>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-light btn-sm me-2" href="/SecureGate/login.php">Login</a>
        </li>';
}

if ($loggedin) {
  echo '  <li class="nav-item">
          <a class="btn btn-outline-danger btn-sm" href="/SecureGate/logout.php">Logout</a>
        </li>';
}

echo ' </ul>
    </div>
  </div>
</nav>';
