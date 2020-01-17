<?php
session_start();
include "../config/connection.php";
?>

<body class="">
  <div class="page">
    <div class="flex-fill">
      <div class="header py-4">
        <div class="container">
          <label class="d-flex">
            <a class="header-brand" href="./index.php">
              <img src="../assets/image/bantul.png" class="header-brand-img" alt="tabler logo">
              <label for="">SKB Bantul</label>
            </a>
            <div class="d-flex order-lg-2 ml-auto">
            <?php if (isset($_SESSION['level'])) { ?>
              <div class="dropdown d-none d-md-flex">
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <i class="fe fe-user"></i>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"></span>
                        <strong class="text-muted d-block mt-1"><?= $_SESSION['nama'] ?></strong>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="./logout.php">
                            <i class="dropdown-icon fe fe-lock"></i> Ganti Password
                          </a>
                          <a class="dropdown-item" href="./logout.php">
                            <i class="dropdown-icon fe fe-log-out"></i> Keluar
                          </a>
                        </div>
                    </span>
                  </a>
                </div>
              </div>
              <?php } else { ?>
                        <a href="../auth/login.php">
                        <strong class="text-muted d-block mt-1">Login</strong>
                        </a>
                      <?php } ?>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="col-lg order-lg-first">
              <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                <li class="nav-item">
                  <a href="./index.php" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                </li>
                <?php if ($_SESSION['level']==1) {?>
                <li class="nav-item">
                  <a href="pendaftaran.php" class="nav-link"><i class="fe fe-users"></i> Pendaftar</a>
                </li>
                <?php }?>
                <li class="nav-item">
                  <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-box"></i>Master Data</a>
                  <div class="dropdown-menu dropdown-menu-arrow">
                  <?php if ($_SESSION['level']==1) {?>
                    <a href="siswa.php" class="dropdown-item ">Siswa Diterima</a>
                  <?php }?>
                    <a href="siswaaktif.php" class="dropdown-item ">Siswa Aktif</a>
                    <a href="kelas.php" class="dropdown-item ">Kelas</a>
                    <?php if ($_SESSION['level']==1) {?>
                    <a href="tutor.php" class="dropdown-item ">Tutor</a>
                    <a href="mapel.php" class="dropdown-item ">Mata Pelajaran</a>
                    <?php }?>
                    <a href="ta.php" class="dropdown-item ">Tahun Ajaran</a>
                    <?php if ($_SESSION['level']==1) {?>
                    <a href="pengguna.php" class="dropdown-item ">Pengguna</a>
                    <?php }?>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-trending-up"></i>Kenaikan Kelas</a>
                </li>
                <li class="nav-item">
                  <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-book-open"></i>Nilai</a>
                  <div class="dropdown-menu dropdown-menu-arrow">
                    <?php if ($_SESSION['level']==2) {?>
                    <a href="nilai.php" class="dropdown-item ">Input Nilai</a>
                    <?php }?>
                    <a href="data_nilai.php" class="dropdown-item ">Data Nilai</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a href="jadwal.php" class="nav-link"><i class="fe fe-calendar"></i>Jadwal</a>
                </li>
                <?php if ($_SESSION['level']==1) {?>
                <li class="nav-item">
                  <a href="jadwal.php" class="nav-link"><i class="fe fe-file-text"></i>Laporan</a>
                </li>
                <?php }?>
              </ul>
            </div>
          </div>
        </div>
      </div>