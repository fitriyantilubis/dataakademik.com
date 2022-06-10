<?php  

session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ){
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ){
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
				</script>
		";
	}
	else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
				</script>
		";
	}

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

    <title>Tambah Data Mahasiswa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand font-weight-bold ml-5" href="index.php">POLITEKNIK NEGERI MEDAN</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto mr-5">
        	<li class="nav-item">
	      	<a class="nav-link text-white ml-3" href="index.php">BACK</a>
	      </li>
          <li class="nav-item">
            <a class="nav-link text-white ml-3" href="logout.php">LOGOUT</a>
          </li>
        </ul>

      </div>
    </nav>

    <div class="container">
        <h1>Tambah Daftar Mahasiswa</h1><hr>

        <form action="" method="post">
		  <div class="form-group">
		    <label for="nama">Nama</label>
		    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" required>
		  </div>
		  <div class="form-group">
		    <label for="nim">NIM</label>
		    <input type="text" class="form-control" name="nim" id="nim" aria-describedby="emailHelp">
		  </div>
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
		  </div>
		  <div class="form-group">
		    <label for="jurusan">Jurusan</label>
		    <input type="text" class="form-control" name="jurusan" id="jurusan" aria-describedby="emailHelp">
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit">TAMBAH DATA</button>
		</form>

    </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>
