<?php
  session_start();
  if(isset($_SESSION['id'])){
    header("location: dashboard.php");
  }
  if(isset($_POST['btn_login'])){
    include 'koneksi.php';

    $email = $_POST['email'];
    $passw = $_POST['password'];

    $passw = md5($passw);
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$passw'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['nim'];
        header("location: dashboard.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

    <title>Login</title>
    <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">L O G I N</h1>
            </div>
            <div class="card-text">
                <form action="" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                      <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelpBlock">
                        <!-- <div id="passwordHelpBlock" class="form-text">
                          Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        </div> -->
                    </div>
                    <!-- <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div> -->
                    <div class="d-grid gap-2">
                      <button type="submit" name="btn_login" id="btn_login" class="btn btn-primary" disabled>Login</button>  
                    </div>
                  </form>
            </div>
        </div>
    </div>
  </body>
</html>
<script src="jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#email").on('input change', function() {
      if($(this).val() != "" && $("#password").val() != ""){
        $("#btn_login").prop("disabled",false);
      }else{
        $("#btn_login").prop("disabled",true);
      }
    });
    $("#password").on('input change', function() {
      if($(this).val() != "" && $("#email").val() != ""){
        $("#btn_login").prop("disabled",false);
      }else{
        $("#btn_login").prop("disabled",true);
      }
    });
  });
</script>