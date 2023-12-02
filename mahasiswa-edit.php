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

    <title>Ubah & Update Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah & Update Data Mahasiswa</h4>
                        <a href="index.php" class="btn btn-primary float-end">Kembali</a>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $db = new DatabaseConnection();
                            $mahasiswa_id = mysqli_real_escape_string($db->conn, $_GET['id']);
                            $mahasiswa = new KontrolMahasiswa($db->conn);
                            $result = $mahasiswa->edit($mahasiswa_id);

                            if($result)
                            {
                                ?>
                                <form action="mahasiswa-code.php" method="POST">
                                    <input type="hidden" name="mahasiswa_id" value="<?=$result['id']?>">

                                    <div class="mb-3">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" value="<?=$result['nama']?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Email ID</label>
                                        <input type="text" name="email" value="<?=$result['email']?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Pelatihan</label>
                                        <input type="text" name="pelatihan" value="<?=$result['pelatihan']?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">No Telepon</label>
                                        <input type="text" name="notelepon" value="<?=$result['notelepon']?>" required class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_mahasiswa" class="btn btn-success">Update</button>
                                    </div>
                                </form>

                                <?php
                            }
                            else
                            {
                                echo "<h4>Data Tidak Ditemukan</h4>";
                            }
                        }
                        else
                        {
                            echo "<h4>Terjadi Kesalahan</h4>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>