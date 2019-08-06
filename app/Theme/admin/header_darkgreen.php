<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin DarkGreen</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= BASE_URL ?>/bootstrap4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/chatomz.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= BASE_URL ?>/font-awesome5/css/all.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"> -->
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.default.css" id="theme-stylesheet">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo  BASE_URL ?>/assets/icon/favicon.ico">
    <!-- Material Icon -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->

    <script src="<?= BASE_URL ?>/j-query/jquery.min.js"></script>
    <script src="<?= BASE_URL ?>/chartjs/Chart.min.js"></script>
    <script src="<?= BASE_URL ?>/bootstrap4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
      <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?php echo  BASE_URL ?>/assets/img/logo.png" alt="person">
            <h5 class="text-capitalize">Nama Admin</h5>
            <span class="text-capitalize">Selamat Datang Admin</span>
            
          </div>
            <h2 class="h5"></h2>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"><strong></strong><strong class="text-primary"></strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <li><a href="#"><i class="icon-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="icon-mail"></i> Data Menu</a></li>
           <!--  <li>
              <a href="#dropdwon-disposisi" aria-expanded="false" data-toggle="collapse"><i class="icon-interface-windows"></i>Disposisi Pengaduan</a>
              <ul id="dropdwon-disposisi" class="collapse list-unstyled">
                    <?php 
                $no = 0;
                foreach ($data['kategori'] as $row){ 
                  if ($data['jumdata'][$no] < 1) {
                    $warna = 'badge-secondary';
                  }else{
                    $warna = 'badge-success';
                  }
                  ?>
                  <li><a href="<?php echo  BASE_URL ?>/admin/datadisposisi/<?php echo $row['id_kategori'] ?>"><?php echo $row['kategori'] ?><span class="badge <?php echo $warna ?> badge-pill p-1"><?php echo $data['jumdata'][$no] ?></span></a></li>
                <?php $no++; } ?>
              </ul>
            </li> -->
            <li><a href="#"><i class="fa fa-cogs"></i> Pengaturan</a></li>
          </ul>
        </div>
    </nav>

    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header">
                <a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"></i></a>
                <a href="index.php" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block">
                    <strong class="text-secondary">Nama Aplikasi</strong>
                  </div>
                </a>
              </div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <li class="nav-item text-light">admin</li>
                <li class="nav-item"><a href="#" class="nav-link logout"> <span class="d-none d-sm-inline-block">Keluar</span><i class="fas fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>