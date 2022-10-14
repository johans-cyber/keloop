<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("location: index.php");
  }
  include 'koneksi.php';
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
              <a class="nav-link" href="order.php">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="user.php">User</a>
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
  <div class="row justify-content-around ms-auto">
    <div class="col-7 mt-5"><h3 class="fw-bolder display-5 mb-3">Users</h3></div>
    <div class="col-2 mt-5"><a class="btn btn-dark" href="#"> Add New User </a></div>
  </div>
  <div class="container">
    <table class="table table-striped table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">NIM</th>
        <th scope="col">Nama</th>
        <th scope="col">Ket</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT nim,nama,keterangan FROM users";
      $result = mysqli_query($conn, $sql);

      $count = 0;
      while ($row = mysqli_fetch_array($result)) {
        $count++;
      ?>
      <tr>
        <th scope="row"><?=$count?></th>
        <td class="nim"><?=$row["nim"]?></td>
        <td><?=$row["nama"]?></td>
        <td><?=$row["keterangan"]?></td>
        <td class="table-action">
          <a class="btn btn-secondary" href="#">Edit</a>
          <a class="btn btn-danger btn_delete" href="#">Delete</a>
        </td>
      </tr>
      <?php  
      }
      if($count==0){
        ?>
      <tr>
        <th scope="row">1</th>
        <td colspan="4">Tidak ada data</td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  </div>
  </body>
</html>
<script src="jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".btn_delete").on('click', function(){
      var element = $(this);
      $.ajax({
        url: "delete_user.php",
        type: "POST",
        data: {
          nama: "ddawwda",
          nim: ()=>{return element.parent().siblings(".nim").html()}
        },
        async: true,
        success: function(msg) {
          console.log(msg)
          if(msg == "sukses"){
            element.closest("tr").remove();
          }else{
            alert("Terjadi error pada api");
            window.location.reload();
          }
        },
        error: function(data) {
          alert("Error! Terjadi kesalahan, cek data Anda dan ulangi lagi.");
          window.location.reload();
        }
      });
    });
  });
</script>