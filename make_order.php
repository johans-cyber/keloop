<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("location: index.php");
  }
  include 'koneksi.php';
  
  if(isset($_POST['btn_submit'])){

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["txtFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
      die();
    }
    
    // Check file size
    if ($_FILES["txtFile"]["size"] > 10000000) {
      echo "Sorry, your file is too large.". $_FILES["txtFile"]["size"];
      $uploadOk = 0;
      die();
    }
    
    // Allow certain file formats
    if($imageFileType != "pdf") {
      echo "Sorry, only PDF files are allowed.";
      $uploadOk = 0;
      die();
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
      die();
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["txtFile"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["txtFile"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
        die();
      }
    }

    $user = $_POST['user'];
    $print = $_POST['txtPrint'];
    $bahan = $_POST['txtBahan'];
    $banyak = $_POST['txtBanyak'];
    $ukuran = $_POST['txtUkuran'];
    $file = $_FILES["txtFile"]["name"];
    $keterangan = $_POST['txtKeterangan'];

    $sql = "INSERT INTO order_print VALUES('','$user','$print','$bahan','$banyak','$ukuran','$file','$keterangan')";
    
    try{
      if(mysqli_query($conn, $sql)){
        echo "<script>alert('Order print berhasil!')</script>";
        header("location: order.php");
      } else {
        echo "<script>alert('Order print gagal!');window.history.forward(1)</script>";
      }
    }
    catch(Exception $e)
    {
      echo "<script>alert('Order print gagal!');window.history.forward(1)</script>";
    }
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
    <nav class="navbar navbar-expand-lg bg-light bg-light shadow-lg justify-content-around">
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
              <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="order.php">Order</a>
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
  <div class="upload-container">
  <div class="row justify-content-around mt-5">
    <div class="col-10"><h3 class=" fw-bolder display-5 mb-3"> Create Order</h3>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="InputUser" class="form-label"> User</label>
          <select class="form-select" name="user" aria-label="Default select example">
            <option selected>Select User</option>
            <?php
            $sql = "SELECT nim,nama FROM users";
            $result = mysqli_query($conn, $sql);

            $count = 0;
            while ($row = mysqli_fetch_array($result)) {
              $count++;
            ?>
            <option value="<?=$row['nim']?>"><?=$row['nama']?></option>
            <?php  
            }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="InputPrint" class="form-label">Print</label>
          <input type="text" class="form-control" name="txtPrint" id="InputPrint">
        </div>
        <div class="mb-3">
          <label for="InputBahan" class="form-label">Bahan</label>
          <input type="text" class="form-control" name="txtBahan" id="Bahan">
        </div>
        <div class="mb-3">
          <label for="InputBanyak" class="form-label">Banyak</label>
          <input type="number" class="form-control" name="txtBanyak" id="InputBanyak">
        </div>
        <div class="mb-3">
          <label for="InputUkuran" class="form-label">Ukuran</label>
          <input type="text" class="form-control" name="txtUkuran" id="InputUkuran">
        </div>
        <div class="mb-3">
          <label for="formFile" class="form-label">Input File Print</label>
          <input class="form-control" type="file" name="txtFile" id="formFile">
        </div>
        <div class="mb-3">
          <label for="InputKeterangan" class="form-label">Keterangan</label>
          <textarea type="text" class="form-control" name="txtKeterangan" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="d-grid gap-2 d-md-block">
          <input class="btn btn-primary btn-lg" name="btn_submit" type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
  </div>
  </body>
</html>