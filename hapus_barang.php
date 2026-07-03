<?php
require_once "koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM products WHERE id_p='$id'");

if($query){
    echo "
    <script>
        alert('Data produk berhasil dihapus!');
        window.location='barang.php';
    </script>";
}else{
    echo "
    <script>
        alert('Data produk gagal dihapus!');
        window.location='barang.php';
    </script>";
}
?>