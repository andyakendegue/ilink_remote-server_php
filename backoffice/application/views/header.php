<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>iLink | Dashboard</title>
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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('dist/css/skins/_all-skins.min.css') ?>">
    <link rel="shortcut icon" href="<?php echo base_url('favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('favicon.ico') ?>" type="image/x-icon">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  -->
    <style media="screen">
        .img-dash {
            height: 50px !important;
            float: left !important;
            padding: 1% !important;
        }

        .table_modified {
            font-size: 11px !important;
        }

    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>iLink</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
        <img class="img img-responsive img-dash" src="<?php echo base_url('images/logo.png') ?>">
        <b>iLink</b> World
      </span>

            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Bienvenue  <span class="hidden-xs"><b><?php  $s=$this->session->userdata('username'); echo $s;?></b></span>
            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">

                                    <p>
                                        <?php  $s=$this->session->userdata('username'); echo $s;?>
                                        <small><?php  $s=$this->session->userdata('Email'); echo $s;?></small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">

                                    <div class="pull-right">
                                        <a href="<?php echo base_url('Login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">



                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">

                    <li class="<?php if($active==" dash "){echo "active ";}  ?>">


                        <a href="<?php echo base_url('Admin_dash') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
                    </li>
                    <li class="<?php if($active==" members "){echo "active ";}  ?>">
                        <a href="<?php echo base_url('Listes_admin') ?>">
            <i class="fa fa-users"></i> <span>Geolocated Members</span>
          </a>

                    </li>
                    <li class="<?php if($active==" simple_members "){echo "active ";}  ?>">
                        <a href="<?php echo base_url('Listes_members') ?>">
            <i class="fa fa-users"></i> <span>Simple Members</span>
          </a>

                    </li>
                    <li class="<?php if($active==" members_code "){echo "active ";}  ?>">
                        <a href="<?php echo base_url('Member_code_admin') ?>">
            <i class="fa fa-database"></i> <span>Members code</span>
          </a>

                    </li>
                    <li class="<?php if($active==" codes "){echo "active ";}  ?>">
                        <a href="<?php echo base_url('CodesG') ?>">
            <i class="fa fa-ticket"></i> <span>Codes</span>
          </a>

                    </li>


                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
