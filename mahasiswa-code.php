<?php
session_start();

include('dbcon.php');
include('KontrolMahasiswa.php');

$db = new DatabaseConnection();

if (isset($_POST['save_mahasiswa'])) {
    $inputData = [
        'nama' => mysqli_real_escape_string($db->conn, $_POST['nama']),
        'email'    => mysqli_real_escape_string($db->conn, $_POST['email']),
        'notelepon'    => mysqli_real_escape_string($db->conn, $_POST['notelepon']),
        'pelatihan'   => mysqli_real_escape_string($db->conn, $_POST['pelatihan']),
    ];

    $mahasiswa = new KontrolMahasiswa($db->conn); // Pass the database connection to the controller
    $result  = $mahasiswa->create($inputData);

    if ($result) {
        $_SESSION['message'] = "Sukses Menambahkan Mahasiswa";
        header("Location: index.php");
    } else {
        $_SESSION['message'] = "Tidak Dapat Dimasukkan";
    }

    header("Location: mahasiswa-add.php");
    exit(0);
}

if(isset($_POST['update_mahasiswa']))
{
    $id = mysqli_real_escape_string($db->conn,$_POST['mahasiswa_id']);
    $inputData = [
        'nama' => mysqli_real_escape_string($db->conn,$_POST['nama']),
        'email' => mysqli_real_escape_string($db->conn,$_POST['email']),
        'notelepon' => mysqli_real_escape_string($db->conn,$_POST['notelepon']),
        'pelatihan' => mysqli_real_escape_string($db->conn,$_POST['pelatihan']),
    ];
    $mahasiswa = new KontrolMahasiswa($db->conn);
    $result = $mahasiswa->update($inputData, $id);

    if($result)
    {
        $_SESSION['message'] = "Mahasiswa Berhasil Ditambahkan";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Mahasiswa Gagal Ditambahkan";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['hapusMahasiswa']))
{
    $id = mysqli_real_escape_string($db->conn, $_POST['hapusMahasiswa']);
    $mahasiswa = new KontrolMahasiswa($db->conn);
    $result = $mahasiswa->delete($id);
    if($result)
    {
        $_SESSION['message'] = "Mahasiswa Berhasil Ditambahkan";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Mahasiswa Gagal Ditambahkan";
        header("Location: index.php");
        exit(0);
    }
}
?>