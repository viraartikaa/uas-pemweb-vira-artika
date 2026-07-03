<?php

require_once "../koneksi.php";

$id            = $_POST['id'];
$nama_lengkap  = $_POST['nama_lengkap'];
$username      = $_POST['username'];
$password      = $_POST['password'];
$status        = $_POST['status'];

$query = mysqli_query($conn,"UPDATE users SET

nama_lengkap='$nama_lengkap',
username='$username',
password='$password',
status='$status'

WHERE id='$id'");

if($query){

echo "<script>

alert('Data berhasil diubah');

window.location='../user.php';

</script>";

}else{

echo "<script>

alert('Data gagal diubah');

window.location='../user.php';

</script>";

}
?>