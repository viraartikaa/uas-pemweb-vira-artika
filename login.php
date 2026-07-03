<?php
session_start();
require_once "koneksi.php";

$error = "";

// Jika sudah login langsung ke dashboard
if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit();
}

// Proses Login
if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users
              WHERE username='$username'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit();

    } else {

        $error = "Username atau Password salah!";

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Login | Login db toko </title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page">

<div class="login-box">

<div class="login-logo">

<b>Login</b> db toko

</div>

<div class="card">

<div class="card-body login-card-body">

<p class="login-box-msg">

Silahkan Login

</p>

<?php if($error!=""){ ?>

<div class="alert alert-danger">

<?= $error; ?>

</div>

<?php } ?>

<form action="login.php" method="post">

<div class="input-group mb-3">

<input type="text"
       name="username"
       class="form-control"
       placeholder="Username">

</div>

<div class="input-group mb-3">

<input type="password"
       name="password"
       class="form-control"
       placeholder="Password">

</div>

<div class="row">

<div class="col-12">

<button type="submit"
        name="login"
        class="btn btn-primary btn-block">

Sign In

</button>

</div>

</div>

</form>

</div>

</div>

</div>

<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min.js"></script>

</body>
</html>