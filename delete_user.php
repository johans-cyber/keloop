<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header("location: index.php");
  }

  include 'koneksi.php';
  
  $nim = $_POST['nim'];
  $sql = "DELETE FROM users WHERE nim='$nim'";
  if(!mysqli_query($conn, $sql)){
    echo "gagal";
    return;
  }

  $sql = "SELECT * FROM users WHERE nim='$nim'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows == 0) {
    echo "sukses";
    return;
  }

  echo "gagal";
?>