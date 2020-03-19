<?php
require 'init.php';
$petugas = query("SELECT * FROM data_petugas ORDER BY id DESC");

// jika tombol cari dipencet
if (isset($_POST['submit'])) {
    $petugas    = cari($_POST['cari']);
}

require "templates/header.php";
?>

<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h3>Data Petugas</h3>
            <a href="tambah.php">
                <button class="btn btn-primary mb-5"><i class="fas fa-plus"></i> Tambah Data Petugas</button>
            </a><br>

            <form action="" method="post">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <input type="text" name="cari" class="form-control" placeholder="Pencarian..." autofocus autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                        <a href="index.php" class="btn btn-success float-right"><i class="fas fa-sync-alt"></i> Refresh</a>
                    </div>
                </div>
            </form>

            <hr>
            <!-- table -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Telephone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($petugas as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row["nama"]; ?></td>
                            <td><?= $row["email"]; ?></td>
                            <td><?= $row["no_tlp"]; ?></td>
                            <td><a href="ubah.php?id=<?= $row['id']; ?>" class="btn btn-success"><i class="fas fa-pen"></i> Ubah</a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require 'templates/footer.php'; ?>