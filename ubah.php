<?php require 'init.php';

    $id = $_GET['id'];

    $petugas = query("SELECT * FROM data_petugas WHERE id = $id")[0];

    if(isset($_POST['submit'])){
        if(ubah($_POST) > 0){
            echo "<script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'index.php';
                  </script>";
        }else{
            echo "<script>
                    alert('Data Gagal Diubah!');
                    document.location.href = 'index.php';
                  </script>";
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Ubah Data Petugas</title>
</head>
<body>
<div class="container mt-5">
    <div class="jumbotron">
    <h3>Ubah Data Petugas</h3>
    <a href="index.php"><button class="btn btn-primary mb-5">
    Halaman Utama
    </button></a>
    <hr>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $petugas['id']; ?>">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Nama Lengkap" required value="<?= $petugas['nama'] ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Alamat Email" required value="<?= $petugas['email'] ?>">
        </div>
        <div class="form-group">
            <label for="no_tlp">No Telephone</label>
            <input type="tlp" name="no_tlp" class="form-control" id="no_tlp" aria-describedby="emailHelp" placeholder="08387496xxxx" required value="<?= $petugas['no_tlp'] ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>

<?php 'templates/footer.php'; ?>