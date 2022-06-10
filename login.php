<?php 
session_start();

if( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}

require 'functions.php';

if ( isset($_POST["login"]) ) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if( mysqli_num_rows($result) === 1 ) {

    //cek password
    $row = mysqli_fetch_assoc($result);
    if( password_verify($password, $row["password"]) ) {
      // set session
      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;
    }
  }

  $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/278024428c.js" crossorigin="anonymous"></script>

    <style type="text/css">
        body {
            background-image: url(image/bglogin.png);
        }
        .container {
            background-color: ghostwhite;
            width: 430px;
            margin-top: 5%;
            box-shadow: 0px 3px 20px rgba(0,0,0,0.3);
            padding: 40px;
            padding-top: 60px;
        }
        .form-group {
            padding-top: 10px;
        }
        .textbox input {
            width: 90%;
            border: none;
            outline: none;
            background: none;
            border-bottom: 2px solid lightblue;
        }
        .textbox i {
            width: 30px;
            font-size: 23px;
            text-align: center;
        }
        button {
            width: 100%;
        }
    </style>

    <title>Form Login</title>
  </head>
  <body>      

    <div class="container">
      <h1 class="text-center font-weight-bold mb-3">Login Form</h1>

      <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">Username / password salah</p>
      <?php endif; ?>

      <form action="" method="post">
        <div class="form-group">
          <label for="username">Username</label>  
          <div class="textbox">   
            <i class="fas fa-envelope text-primary"></i>       
            <input type="text" name="username" id="username" placeholder="Masukkan Username Anda">
          </div>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <div class="textbox">
            <i class="fas fa-lock text-primary"></i>
            <input type="password" name="password" id="password" placeholder="Masukkan Password Anda">
          </div>  
        </div>

        <button type="submit" class="btn btn-primary text-center mt-4 mb-5" name="login">LOGIN</i></button>
        <p>Belum punya akun? <a href="registrasi.php">Daftar disini</a></p>
      </form>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>