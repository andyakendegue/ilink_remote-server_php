<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>iLink | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/AdminLTE.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/iCheck/square/blue.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('favicon.ico') ?>" type="image/x-icon">
<link rel="icon" href="<?php echo base_url('favicon.ico') ?>" type="image/x-icon">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href='<?php echo base_url() ?>'  id="t">
      <img class="img img-responsive" src="<?php echo base_url('images/logo_blueback.png') ?>">
    </a>

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">


              <?php

              if($alert=="ok") {
                  ?>
                  <div class='alert alert-danger alert-dismissible'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                              <h4><i class='icon fa fa-ban'></i> Alert!</h4>
                              <?php echo $message; ?>
                            </div>
                  <?php
              }
               ?>


    <form action="<?php echo base_url('Login/validate') ?>" method="post">
      <div class="form-group has-feedback">
        <input name="maill" id="username" type="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <div class="col-xs-4">
          <button type="submit" name="Submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js') ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
