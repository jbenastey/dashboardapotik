<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard Apotik</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url ('assets/plugins/font-awesome/css/font-awesome.min.css') ?>">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url ('assets/css/adminlte.min.css') ?>"> 
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url ('assets/plugins/datatables/dataTables.bootstrap4.min.css') ?>">
	<link rel="shortcut icon" href="<?=base_url()?>assets/img/AdminLTELogo.png">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
      <li class="nav-item">
        <a  class = "btn btn-primary" href="<?= base_url ('logout') ?>" onclick = "return confirm ('apakah anda yakin mau keluar')"><i
            class="fa fa-sign-out"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
      <img src="<?= base_url ('assets/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Apotik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url ('assets/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Rio</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
				<a href="<?=base_url()?>" class="nav-link <?php if ($this->uri->segment('1') == null) echo 'active'?>">
					<i class="nav-icon fa fa-home"></i>
					<p class="text">Beranda</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?=base_url('mentah')?>" class="nav-link <?php if ($this->uri->segment(1) == 'mentah') echo 'active'?>">
					<i class="nav-icon fa fa-file-excel-o"></i>
					<p class="text">Data Excel</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?=base_url('dimensi')?>" class="nav-link <?php if ($this->uri->segment('1') == 'dimensi') echo 'active'?>">
					<i class="nav-icon fa fa-file-o"></i>
					<p>Tabel Dimensi</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?=base_url('fakta')?>" class="nav-link <?php if ($this->uri->segment('1') == 'fakta') echo 'active'?>">
					<i class="nav-icon fa fa-file"></i>
					<p>Tabel Fakta</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?=base_url('laporan')?>" class="nav-link <?php if ($this->uri->segment('1') == 'laporan') echo 'active'?>">
					<i class="nav-icon fa fa-files-o"></i>
					<p>Laporan</p>
				</a>
			</li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    
    <!-- /.content -->
