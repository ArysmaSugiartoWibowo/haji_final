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
      <a href="../../index2.html" class="h1"><b>Register</b></a>
 
    <div class="card-body">
  
                   
                    <form action="<?= site_url('ControllerLogin/register_action') ?>" method="post">
                            <div class="col-md-10 mx-auto">
                                <div class="form-group">
                                <label for="username">Username:</label>
                                   <input type="text" id="username" class="form-control" name="username" value="<?= set_value('username') ?>">
                                    <span class="text-danger"><?= form_error('username') ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" class="form-control" name="password"><br>
                                    <span class="text-danger"><?= form_error('password') ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas:</label>
                                    <select id="kelas" class="form-control" name="kelas">
                                        <option value="1">VII</option>
                                        <option value="2">VIII</option>
                                        <option value="3">IX</option>
                                    </select>
                                    <br>
                                    <span class="text-danger"><?= form_error('kelas') ?></span>
                                </div>
                                <input type="hidden" id="level" name="level" value="siswa"><br>
                                <div class="col-md-12">
                                    <!-- <div class="col-md-12"> -->
                                        <a type="button" href="<?= site_url('controllerLogin'); ?>" class="btn btn-danger waves-effect waves-light">Cancel</a>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Simpan</button>
                                    <!-- </div> -->
                                </div>
                                
                            </div>

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





