<?php
require_once "koneksi.php";

// Ambil data dari form
$id_p        = $_POST['id_p'];
$nama_p      = $_POST['nama_p'];
$harga_beli  = $_POST['harga_beli'];
$harga_jual  = $_POST['harga_jual'];
$stok        = $_POST['stok'];
$status      = $_POST['status'];

// Query update
$query = mysqli_query($conn, "UPDATE products SET
    nama_p = '$nama_p',
    harga_beli = '$harga_beli',
    harga_jual = '$harga_jual',
    stok = '$stok',
    status = '$status'
WHERE id_p = '$id_p'");

// Cek hasil
if($query){
    echo "
    <script>
        alert('Data produk berhasil diubah!');
        window.location='barang.php';
    </script>";
}else{
    echo "
    <script>
        alert('Data gagal diubah!');
        window.location='barang.php';
    </script>";
}
?>