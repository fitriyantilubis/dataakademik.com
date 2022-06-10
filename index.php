<?php 
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari ditekan
if( isset($_POST["cari"]) ) {
  $mahasiswa = cari($_POST["keyword"]);
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
    <style type="text/css">
        body {
            background-image: url(image/bghome.png);
        }
        .navbar-nav a:hover {
            background-color: #1a75ff;
        } 
        .container {
            background-color: white;
            width: 950px;
        }
        h1 {
            padding-top: 70px;
        }
        hr {
            border-width: 3px;
        }
        .btn a {
          text-decoration: none;
          color: white;
        }
    </style>

    <title>Halaman Admin</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand font-weight-bold ml-5" href="index.php">POLITEKNIK NEGERI MEDAN</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto mr-5">
          <li>
            <form action="" method="post" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" name="keyword" placeholder="Search" aria-label="Search" autofocus autocomplete="off">
              <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="cari">Search..</button>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white ml-3" href="logout.php">LOGOUT</a>
          </li>
        </ul>

      </div>
    </nav>

    <div class="container">
        <h1>Daftar Mahasiswa</h1><hr>

        <button type="button" class="btn btn-primary mb-3 font-weight-bold" data-toggle="modal" data-target="#exampleModal"><a href="tambah.php">Tambah Data</a></button>

        <table class="table table-hover">
          <thead class="bg-info text-white">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">NIM</th>
              <th scope="col">Email</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <?php $i = 1; ?>
          <?php foreach( $mahasiswa as $row ) : ?>
          <tbody>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $row["nama"]; ?></td>
              <td><?= $row["nim"]; ?></td>
              <td><?= $row["email"]; ?></td>
              <td><?= $row["jurusan"]; ?></td>
              <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-info">Ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" class="btn btn-info">Hapus</a>
              </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table> 
    </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>