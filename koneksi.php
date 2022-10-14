<?php
error_reporting(0);
ini_set('display_errors', 0);

$servername = "localhost";
$database = "keloop";
$username = "root";
$password = "";
// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>