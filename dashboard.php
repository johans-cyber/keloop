<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("location: index.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

    <title>dashboard</title>
    <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
  <header>
    <script src="bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-light shadow-lg justify-content-around">
      <div class="container">
        <a class="navbar-brand" href="dashboard.php">
          <img src="img/logo.png" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mb-3 mb-lg-0" id="navbarNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3 gap-2">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order.php">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user.php">User</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                Account
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Info</a></li>
                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
    <div class="container-fluid banner">
      <div class="container text">
        <h4 class="display-6 fw-bolder">Selamat Datang di Website Kami</h4>
        <h3 class="display-1 fw-bolder">Hello, World!</h3>
        <a href="#">
          <button type="button" class="btn btn-primary btn-lg mt-3">
            Download Company Profile
          </button>
        </a>
      </div>
    </div>
  </body>
</html>