<?php

require_once "../koneksi.php";

$nama_lengkap = $_POST['nama_lengkap'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$status       = $_POST['status'];

$query = mysqli_query($conn,
"INSERT INTO users(nama_lengkap,username,password,status)
VALUES('$nama_lengkap','$username','$password','$status')");

if($query){

    echo "<script>

    alert('Data berhasil disimpan');

    window.location='../user.php';

    </script>";

}else{

    echo "<script>

    alert('Data gagal disimpan');

    window.location='../user_tambah.php';

    </script>";

}