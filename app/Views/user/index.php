<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BaseCI4</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('template/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('template/dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= site_url('auth/login') ?>" class="h1"><b>Base</b>CI4</a>
    </div>

    <div class="card-body">
      <p class="login-box-msg">Example to start your project</p>


      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="https://www.instagram.com/rid1bdbx/" class="btn btn-primary btn-block" target="_blank">
          <i class="fab fa-instagram fa-fw"></i><span class="border-left" style="margin-right: 5px; margin-left: 5px;"></span>
          CONTACT ME
        </a>

        <a href="https://github.com/ridwanrenaldi/baseci4" class="btn btn-block btn-success" target="_blank">
          <i class="fab fa-github fa-fw"></i><span class="border-left" style="margin-right: 5px; margin-left: 5px;"></span>
          GITHUB
        </a>

        <a href="<?= site_url('auth/login') ?>" class="btn btn-block btn-danger">
          <i class="fas fa-user fa-fw"></i><span class="border-left" style="margin-right: 5px; margin-left: 5px;"></span>
          GO TO ADMIN
        </a>


      </div>
      <!-- /.social-auth-links -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('template/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
