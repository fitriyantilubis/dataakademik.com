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

    <title>Stock Barang</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand font-weight-bold ml-5" href="#">TOKO AWESOME</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto mr-5">
          <li class="nav-item active">
            <a class="nav-link text-white" href="dashboard.php">DASHBOARD<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
        <h1>Stock Barang</h1><hr>

        <?php 
            require 'connection.php';
            $ambilnama = mysqli_query($conn, "SELECT * FROM stock WHERE StockBarang < 1");

            while($fetch = mysqli_fetch_array($ambilnama)) {
                $nama = $fetch['NamaBarang'];
        ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Pemberitahuan !</strong> Stock pada barang <?= $nama; ?> telah habis.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php } ?>

        <button type="button" class="btn btn-primary mb-3 font-weight-bold" data-toggle="modal" data-target="#exampleModal">Tambah Barang</button>

        <table class="table table-hover">
          <thead class="bg-info text-white">
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Stock Barang</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

        <?php 
            $stock = query("SELECT * FROM stock");
            $i = 1;
            foreach ($stock as $row) {
        ?>

          <tbody>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $row["NamaBarang"]; ?></td>
              <td><?= $row["StockBarang"]; ?></td>
              <td><?= $row["Deskripsi"]; ?></td>
              <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ubah<?= $row["IdBarang"]; ?>">Ubah</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#hapus<?= $row["IdBarang"]; ?>">Hapus</button>
              </td>
            </tr>

            <!-- Ubah Modal -->
            <form method="post">
            <div class="modal fade" id="ubah<?= $row["IdBarang"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <input type="text" class="form-control my-3" name="namabrg" value="<?= $row["NamaBarang"]; ?>" required>
                    <input type="text" class="form-control mb-3" name="desk" value="<?= $row["Deskripsi"]; ?>" required>
                    <input type="hidden" name="idbrg" value="<?= $row["IdBarang"]; ?>">
                  </div>
                  
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="ubahbrg">Simpan</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Hapus Modal -->
            <div class="modal fade" id="hapus<?= $row["IdBarang"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" name="idbrg" value="<?= $row["IdBarang"]; ?>">
                  </div>

                  <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus <?= $row["NamaBarang"]; ?> ?</p>
                    <button type="submit" class="btn btn-primary mb-2" name="hapusbrg">Ya, hapus</button>
                  </div>
                </div>
              </div>
            </div>
            </form>

          </tbody>
        <?php $i++; } ?>
        </table> 
    </div>

    <!-- Tambah Barang Modal -->
    <form method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <input type="text" class="form-control my-3" name="namabrg" placeholder="Nama Barang" required>
            <input type="number" class="form-control mb-3" name="stockbrg" placeholder="Stock" required>
            <input type="text" class="form-control mb-3" name="desk" placeholder="Deskripsi" required>
          </div>
          
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="tambahbrg">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    </form>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>