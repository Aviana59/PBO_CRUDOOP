<?php

class KontrolMahasiswa
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($inputData)
    {
        $nama = $inputData['nama'];
        $email    = $inputData['email'];
        $notelepon    = $inputData['notelepon'];
        $pelatihan  = $inputData['pelatihan'];

        $mahasiswaQuery = "INSERT INTO mahasiswa (nama,email,notelepon,pelatihan) VALUES ('$nama','$email','$notelepon','$pelatihan')";
        $result       = $this->conn->query($mahasiswaQuery);

        return $result;
    }

    public function index()
    {
        $mahasiswaQuery = "SELECT * FROM mahasiswa";
        $result = $this->conn->query($mahasiswaQuery);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function edit($id)
    {
        $mahasiswa_id = mysqli_real_escape_string($this->conn, $id);
        $mahasiswaQuery = "SELECT * FROM mahasiswa WHERE id='$mahasiswa_id' LIMIT 1";
        $result = $this->conn->query($mahasiswaQuery);
        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return false;
        }
    }

    public function update($inputData, $id)
    {
        $mahasiswa_id = mysqli_real_escape_string($this->conn, $id);
        $nama = $inputData['nama'];
        $email = $inputData['email'];
        $notelepon = $inputData['notelepon'];
        $pelatihan = $inputData['pelatihan'];

        $mahasiswaQuery = "UPDATE mahasiswa SET nama='$nama', email='$email', notelepon='$notelepon', pelatihan='$pelatihan' WHERE id='$mahasiswa_id' LIMIT 1";
        $result = $this->conn->query($mahasiswaQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $mahasiswa_id = mysqli_real_escape_string($this->conn,$id);
        $mahasiswaDeleteQuery = "DELETE FROM mahasiswa WHERE id='$mahasiswa_id' LIMIT 1";
        $result = $this->conn->query($mahasiswaDeleteQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>