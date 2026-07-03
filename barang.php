<?php
session_start();
require_once "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

// Ambil data produk
$data = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Produk | Project UAS</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

<!-- ================= NAVBAR ================= -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav ml-auto">

<li class="nav-item mr-3 mt-1">

<strong>
<i class="fas fa-user"></i>
<?php echo $_SESSION['username']; ?>
</strong>

</li>

<li class="nav-item">

<a href="logout.php"
class="btn btn-danger btn-sm"
onclick="return confirm('Apakah Anda yakin ingin logout?')">

<i class="fas fa-sign-out-alt"></i>
Logout

</a>

</li>

</ul>

<ul class="navbar-nav">

<li class="nav-item">

<a class="nav-link" data-widget="pushmenu" href="#">

<i class="fas fa-bars"></i>

</a>

</li>

</ul>

</nav>

<!-- ================= SIDEBAR ================= -->

<aside class="main-sidebar sidebar-dark-primary elevation-4">

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">

<div class="image">

<img src="dist/img/user2-160x160.jpg"
class="img-circle elevation-2"
alt="User Image">

</div>

<div class="info">

<a href="#" class="d-block">

<?php echo $_SESSION['username']; ?>

</a>

</div>

</div>

<nav class="mt-2">

<ul class="nav nav-pills nav-sidebar flex-column"
data-widget="treeview"
role="menu"
data-accordion="false">

<li class="nav-item">

<a href="index.php" class="nav-link">

<i class="nav-icon fas fa-tachometer-alt"></i>

<p>Dashboard</p>

</a>

</li>

<li class="nav-item has-treeview menu-open">

<a href="#" class="nav-link active">

<i class="nav-icon fas fa-table"></i>

<p>

Data Master

<i class="right fas fa-angle-left"></i>

</p>

</a>

<li class="nav-item">
    <a href="user.php" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Data User</p>
    </a>
</li>

<li class="nav-item">
    <a href="barang.php" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Barang</p>
    </a>
</li>

</ul>

</li>

<li class="nav-header">

TRANSAKSI

</li>

<li class="nav-item">

<a href="#" class="nav-link">

<i class="nav-icon far fa-calendar-alt"></i>

<p>Penjualan</p>

</a>

</li>

<li class="nav-item">

<a href="#" class="nav-link">

<i class="nav-icon far fa-image"></i>

<p>Pembelian</p>

</a>

</li>

<li class="nav-header">

LAPORAN

</li>

<li class="nav-item">

<a href="#" class="nav-link">

<i class="nav-icon fas fa-file"></i>

<p>Laporan Penjualan</p>

</a>

</li>

</ul>

</nav>

</div>

</aside>

<!-- ================= CONTENT ================= -->

<div class="content-wrapper">

<section class="content-header">

<div class="container-fluid">

<div class="row mb-2">

<div class="col-sm-6">

<h1>Data Produk</h1>

</div>

<div class="col-sm-6">

<ol class="breadcrumb float-sm-right">

<li class="breadcrumb-item">

<a href="index.php">Dashboard</a>

</li>

<li class="breadcrumb-item active">

Data Produk

</li>

</ol>

</div>

</div>

</div>

</section>

<section class="content">

<div class="row">

<div class="col-12">

<div class="card">

<div class="card-header">

<h3 class="card-title">

Data Produk Toko

</h3>

<div class="card-tools">

<button
class="btn btn-primary"
data-toggle="modal"
data-target="#modalTambah">

<i class="fas fa-plus"></i>

Tambah Produk

</button>

</div>

</div>

<div class="card-body">

<!-- ================= TABEL PRODUK AKAN DIMULAI DI BAGIAN 2 ================= -->
 <table id="example1" class="table table-bordered table-striped">

    <thead class="text-center">

        <tr>
            <th width="5%">No</th>
            <th>Nama Produk</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Status</th>
            <th width="18%">Aksi</th>
        </tr>

    </thead>

    <tbody>

    <?php
    $no = 1;

    while($row = mysqli_fetch_assoc($data)) :
    ?>

        <tr>

            <td class="text-center">
                <?= $no++; ?>
            </td>

            <td>
                <?= $row['nama_p']; ?>
            </td>

            <td>
                Rp <?= number_format($row['harga_beli'],0,',','.'); ?>
            </td>

            <td>
                Rp <?= number_format($row['harga_jual'],0,',','.'); ?>
            </td>

            <td class="text-center">
                <?= $row['stok']; ?>
            </td>

            <td class="text-center">

                <?php
                if($row['status']=="1"){
                    echo '<span class="badge badge-success">Aktif</span>';
                }else{
                    echo '<span class="badge badge-danger">Tidak Aktif</span>';
                }
                ?>

            </td>

            <td class="text-center">

                <button
                    class="btn btn-warning btn-sm"
                    data-toggle="modal"
                    data-target="#edit<?= $row['id_p']; ?>">

                    <i class="fas fa-edit"></i>

                    Edit

                </button>

                <a href="hapus_barang.php?id=<?= $row['id_p']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin ingin menghapus produk ini?')">

                    <i class="fas fa-trash"></i>

                    Hapus

                </a>

            </td>

        </tr>

        <!-- ================= MODAL EDIT ================= -->

        <div class="modal fade" id="edit<?= $row['id_p']; ?>">

            <div class="modal-dialog">

                <div class="modal-content">

                    <form action="update_barang.php" method="POST">

                        <div class="modal-header bg-warning">

                            <h4 class="modal-title">

                                Edit Produk

                            </h4>

                            <button type="button"
                                    class="close"
                                    data-dismiss="modal">

                                &times;

                            </button>

                        </div>

                        <div class="modal-body">

                            <input
                                type="hidden"
                                name="id_p"
                                value="<?= $row['id_p']; ?>">

                            <div class="form-group">

                                <label>Nama Produk</label>

                                <input
                                    type="text"
                                    name="nama_p"
                                    class="form-control"
                                    value="<?= $row['nama_p']; ?>"
                                    required>

                            </div>

                            <div class="form-group">

                                <label>Harga Beli</label>

                                <input
                                    type="number"
                                    name="harga_beli"
                                    class="form-control"
                                    value="<?= $row['harga_beli']; ?>"
                                    required>

                            </div>

                            <div class="form-group">

                                <label>Harga Jual</label>

                                <input
                                    type="number"
                                    name="harga_jual"
                                    class="form-control"
                                    value="<?= $row['harga_jual']; ?>"
                                    required>

                            </div>

                            <div class="form-group">

                                <label>Stok</label>

                                <input
                                    type="number"
                                    name="stok"
                                    class="form-control"
                                    value="<?= $row['stok']; ?>"
                                    required>

                            </div>

                            <div class="form-group">

                                <label>Status</label>

                                <select
                                    name="status"
                                    class="form-control">

                                    <option
                                        value="1"
                                        <?= ($row['status']=="1") ? "selected" : ""; ?>>
                                        Aktif
                                    </option>

                                    <option
                                        value="0"
                                        <?= ($row['status']=="0") ? "selected" : ""; ?>>
                                        Tidak Aktif
                                    </option>

                                </select>

                            </div>
                                                    </div>

                        <div class="modal-footer justify-content-between">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">

                                <i class="fas fa-times"></i>
                                Batal

                            </button>

                            <button
                                type="submit"
                                class="btn btn-warning">

                                <i class="fas fa-save"></i>
                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    <?php endwhile; ?>

    </tbody>

</table>

</div>

</div>

</div>

</div>

</section>

<!-- ================= MODAL TAMBAH ================= -->

<div class="modal fade" id="modalTambah">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="simpan_barang.php" method="POST">

                <div class="modal-header bg-primary">

                    <h4 class="modal-title">

                        Tambah Produk

                    </h4>

                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal">

                        &times;

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Nama Produk</label>

                        <input
                            type="text"
                            name="nama_p"
                            class="form-control"
                            placeholder="Masukkan nama produk"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Harga Beli</label>

                        <input
                            type="number"
                            name="harga_beli"
                            class="form-control"
                            placeholder="Masukkan harga beli"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Harga Jual</label>

                        <input
                            type="number"
                            name="harga_jual"
                            class="form-control"
                            placeholder="Masukkan harga jual"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Stok</label>

                        <input
                            type="number"
                            name="stok"
                            class="form-control"
                            placeholder="Masukkan stok"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-control">

                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer justify-content-between">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">

                        <i class="fas fa-times"></i>
                        Batal

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Simpan Produk

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
<!-- ================= FOOTER ================= -->

<footer class="main-footer">

    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0
    </div>

    <strong>

        Copyright &copy; 2026
        Project UAS Pemrograman Web.

    </strong>

</footer>

<!-- Control Sidebar -->

<aside class="control-sidebar control-sidebar-dark">
</aside>

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- AdminLTE -->
<script src="dist/js/adminlte.min.js"></script>

<script src="dist/js/demo.js"></script>

<script>

$(function () {

    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "language": {
            "search": "Cari :",
            "lengthMenu": "Tampilkan MENU data",
            "info": "Menampilkan START sampai END dari TOTAL data",
            "paginate": {
                "first": "Awal",
                "last": "Akhir",
                "next": "→",
                "previous": "←"
            },
            "zeroRecords": "Data tidak ditemukan"
        }
    });

});

</script>

</body>
</html>