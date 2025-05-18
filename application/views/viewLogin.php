<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('vendor/') ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/styles.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Custom CSS for gradient background -->
    <style>
        .gradient-background {
            /* Background gradient with two colors transitioning from top to bottom */
            background: linear-gradient(135deg, #4b4b4b, #228b22);
            /* Fallback color for older browsers */
            background-color: #c2e9fb;
        }
    </style>
</head>

<body class="hold-transition login-page gradient-background"> <!-- Tambahkan kelas 'gradient-background' -->
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>E-Learning</b> Fiqih </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
      <form action="<?= site_url('ControllerLogin/cekStatusLogin') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger"><?= form_error('username') ?></span>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger"><?= form_error('password') ?></span>
                    <div class="row">
                        <div class="col-6">
                        <a href="<?= site_url('ControllerHome') ?>" class="btn btn-warning btn-block">Dashboard</a>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                        <a href="<?= site_url('ControllerLogin/register') ?>" class="btn btn-dark btn-block mt-1">Daftar Akun</a>
                        </div>
                        <!-- /.col -->
                        
                </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>
