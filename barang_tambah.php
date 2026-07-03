<?php

require_once "koneksi.php";

if(isset($_POST['simpan'])){

$id_p = $_POST['id_p'];
$nama = $_POST['nama_p'];
$hb   = $_POST['harga_beli'];
$hj   = $_POST['harga_jual'];
$stok = $_POST['stok'];
$status = $_POST['status'];

mysqli_query($conn,"
INSERT INTO products
(id_p,nama_p,harga_beli,harga_jual,stok,status)
VALUES
('$id_p','$nama','$hb','$hj','$stok','$status')
");

header("Location: barang.php");
}

?>
<form method="POST">

<div class="form-group">
<label>ID Produk</label>
<input type="number" name="id_p" class="form-control">
</div>

<div class="form-group">
<label>Nama Produk</label>
<input type="text" name="nama_p" class="form-control">
</div>

<div class="form-group">
<label>Harga Beli</label>
<input type="number" name="harga_beli" class="form-control">
</div>

<div class="form-group">
<label>Harga Jual</label>
<input type="number" name="harga_jual" class="form-control">
</div>

<div class="form-group">
<label>Stok</label>
<input type="number" name="stok" class="form-control">
</div>

<div class="form-group">
<label>Status</label>

<select name="status" class="form-control">
    <option value="1">Aktif</option>
    <option value="0">Tidak Aktif</option>
</select>

</div>

<button type="submit"
name="simpan"
class="btn btn-success">

Simpan Data

</button>

</form>