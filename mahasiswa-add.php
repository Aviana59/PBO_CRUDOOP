<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Data Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(isset($_SESSION['message']))
                    {
                        echo "<h5>".$_SESSION['message']."</h5>";
                        unset($_SESSION['message']);
                    }
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Tambahkan Data Mahasiswa</h4>
                        <a href="index.php" class="btn btn-primary float-end">Kembali</a>
                    </div>
                    <div class="card-body">

                        <form action="mahasiswa-code.php" method="POST">
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" name="nama" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Pelatihan</label>
                                <input type="text" name="pelatihan" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">No Telepon</label>
                                <input type="text" name="notelepon" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_mahasiswa" class="btn btn-success">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>