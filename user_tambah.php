<?php
session_start();
require_once "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tambah User</title>

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

<div class="content-wrapper" style="margin-left:0;">

<section class="content pt-3">

<div class="container-fluid">

<div class="card card-primary">

<div class="card-header">
<h3 class="card-title">Tambah Data User</h3>
</div>

<form action="action/simpan_user.php" method="POST">

<div class="card-body">

<div class="form-group">
<label>Nama Lengkap</label>
<input type="text"
name="nama_lengkap"
class="form-control"
required>
</div>

<div class="form-group">
<label>Username</label>
<input type="text"
name="username"
class="form-control"
required>
</div>

<div class="form-group">
<label>Password</label>
<input type="password"
name="password"
class="form-control"
required>
</div>

<div class="form-group">
<label>Status</label>

<select name="status" class="form-control">

<option value="Admin">Admin</option>

<option value="Kasir">Kasir</option>

</select>

</div>

</div>

<div class="card-footer">

<button type="submit" class="btn btn-primary">

Simpan

</button>

<a href="user.php" class="btn btn-secondary">

Kembali

</a>

</div>

</form>

</div>

</div>

</section>

</div>

</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>