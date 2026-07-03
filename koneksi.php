<?php

// Konfigurasi Database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_toko";

// Membuat Koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek Koneksi
if (!$conn) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}

?>