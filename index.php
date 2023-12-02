<?php
include('dbcon.php');
include_once('KontrolMahasiswa.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Mahasiswa</h4>
                        <a href="mahasiswa-add.php" class="btn btn-primary float-end">Masukkan Data Baru</a>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>Pelatihan</th>
                                        <th>Ubah</th>
                                        <th>Hapus</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    <?php
                                        $db = new DatabaseConnection(); // Create a new instance of DatabaseConnection
                                        $mahasiswa = new KontrolMahasiswa($db->conn); // Pass the database connection to the controller
                                        $result = $mahasiswa->index();
                                        if($result)
                                        {
                                            foreach($result as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['nama'] ?></td>
                                                    <td><?= $row['email'] ?></td>
                                                    <td><?= $row['notelepon'] ?></td>
                                                    <td><?= $row['pelatihan'] ?></td>
                                                    <td>
                                                        <a href="mahasiswa-edit.php?id=<?=$row['id'];?>" class="btn btn-warning">Ubah</a>
                                                    </td>
                                                    <td>
                                                        <form action="mahasiswa-code.php" method="POST">
                                                            <button type="submit" name="hapusMahasiswa" value="<?= $row['id'] ?>" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "Data Tidak Ditemukan";
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>

                        </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>