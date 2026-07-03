<?php
require_once "koneksi.php";

// Ambil data dari form
$nama_p      = $_POST['nama_p'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];
$stok        = $_POST['stok'];
$status      = $_POST['status'];

// Simpan ke tabel products
$query = mysqli_query($conn, "INSERT INTO products
(
    nama_p,
    harga_beli,
    harga_jual,
    stok,
    status
)
VALUES
(
    '$nama_p',
    '$harga_beli',
    '$harga_jual',
    '$stok',
    '$status'
)");

if($query){
    echo "
    <script>
        alert('Data produk berhasil ditambahkan!');
        window.location='barang.php';
    </script>";
}else{
    echo "
    <script>
        alert('Data gagal disimpan!');
        window.location='barang.php';
    </script>";
}
?>