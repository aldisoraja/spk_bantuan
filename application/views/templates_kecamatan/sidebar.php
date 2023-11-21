<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader"></div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-sidebar" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
      <div class="logo-wrapper"><a href="<?php echo base_url('kecamatan/dashboard') ?>"><img width="70px" height="60px" class="img-fluid" src="<?php echo base_url() ?>/assets/images/logo/logo.png" alt=""></a></div>
      <div class="dark-logo-wrapper"><a href="<?php echo base_url('kecamatan/dashboard') ?>"><img class="img-fluid" width="30px" height="40px" src="<?php echo base_url() ?>/assets/images/logo/logo.png" alt=""></a></div>
      <div class="sidebar-brand-text text-left mx-2">DP3APPKB Kota Surabaya</div>
      <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">    </i></div>
    </div>
    <div class="left-menu-header col">
      <ul>
        <li>
          <h4>SPK Penerimaan Bantuan Alat Kontrasepsi Gratis</h4>
        </li>
      </ul>
    </div>
    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">
        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li class="onhover-dropdown p-0">
          <a class="btn btn-primary-light" href="<?php echo base_url('login/logout') ?>"><i data-feather="log-out"></i>Log out</a>
        </li>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="#"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="<?php echo base_url() ?>/assets/images/dashboard/1.png" alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">User</span></div>
        <a href="user-profile"> <h6 class="mt-3 f-14 f-w-600"><?php echo $this->session->userdata('nama_akses'); ?></h6></a>
        <p class="mb-0 font-roboto">Koordinator KB</p>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('kecamatan/dashboard') ?>"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Melihat Data</h6>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kecamatan/kriteria') ?>"><i data-feather="server"></i><span>Kriteria</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kecamatan/subKriteria') ?>"><i data-feather="database"></i><span>Sub Kriteria</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kecamatan/dataMbr') ?>"><i data-feather="users"></i><span>Data MBR </span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Perhitungan</h6>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kecamatan/hitungUjiCoba') ?>"><i data-feather="monitor"></i><span> Hitung</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kecamatan/perhitunganUjiCoba') ?>"><i data-feather="star"></i><span> Analisa Perhitungan</span></a>
                    </li>
                    <!-- <li class="sidebar-main-title">
                        <div>
                            <h6>Perhitungan</h6>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kecamatan/hitung') ?>"><i data-feather="monitor"></i><span> Hitung</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kecamatan/perhitungan') ?>"><i data-feather="star"></i><span> Analisa Perhitungan</span></a>
                    </li> -->
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Laporan</h6>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('kecamatan/hasil') ?>"><i data-feather="file-text"></i><span>Hasil</span></a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
<!-- Page Sidebar Ends-->