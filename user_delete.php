<?php
require_once "koneksi.php";

// Ambil ID user
$id = $_GET['id'];

// Hapus data user berdasarkan ID
$query = mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

// Cek hasil
if ($query) {
    echo "
    <script>
        alert('Data user berhasil dihapus!');
        window.location='user.php';
    </script>";
} else {
    echo "
    <script>
        alert('Data user gagal dihapus!');
        window.location='user.php';
    </script>";
}
?>