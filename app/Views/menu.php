<body>
    <div class="container-fluid position-relative d-flex p-0">
      <!-- Spinner Start -->
      <!-- <div
        id="spinner"
        class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
      > -->
        <!-- <div
          class="spinner-border text-primary"
          style="width: 3rem; height: 3rem"
          role="status"
        >
          <span class="sr-only">Loading...</span> -->
        <!-- </div> -->
      <!-- </div> -->
      <!-- Spinner End -->

      <!-- Sidebar Start -->
      <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
          <a href="<?= base_url('home/index') ?>" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
              <img
                src="<?= base_url('img/logo/'.$menu->logo)?>"
                alt=""
                style="width: 40px; height: 40px"
              /><?= $menu->nama_web?>
            </h3>
          </a>
          <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
              <!-- <img
                class="rounded-circle"
                src="img/user.jpg"
                alt=""
                style="width: 40px; height: 40px"
              /> -->
              <div
                class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"
              ></div>
            </div>
            <div class="ms-3">
              <h6 class="mb-0"><?=session()->get('nama')?></h6>
              <span><?php
        if (session()->get('level') == 1) {
            echo 'Admin';
        } elseif (session()->get('level') == 2) {
            echo 'user';
        
      } elseif (session()->get('level') == 3) {
        echo 'kepala sekolah';
      }
      elseif (session()->get('level') == 4) {
        echo 'user';
      }
        elseif (session()->get('level') == 5) {
          echo 'wali';
        }
      
        ?></span>
            </div>
          </div>
          <div class="navbar-nav w-100">
            
            <!-- <a href="<?= base_url('home/index') ?>" class="nav-item nav-link"
              ><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a
            >
            <?php if(session()->get('level') == 4){?>
            <a href="<?= base_url('home/jadwal') ?>" class="nav-item nav-link"
              ><i class="fa fa-th me-2"></i>jadwal</a
            >
            <?php }?>
            <?php if(session()->get('level') == 4){?>
            <a href="<?= base_url('home/rjadwal') ?>" class="nav-item nav-link"
              ><i class="fa fa-th me-2"></i>Restore jadwal</a
            >
            <?php }?>
            <?php if(session()->get('level') == 4){?>
            <a href="<?= base_url('home/edit_data') ?>" class="nav-item nav-link"
              ><i class="fa fa-th me-2"></i>data sekolah</a
              
              >
              <?php }?>
            <?php if(session()->get('level') == 2){?>
            <a href="<?= base_url('home/siswa') ?>" class="nav-item nav-link"
              ><i class="fa fa-th me-2"></i>jadwal</a
            >
            <?php }?> 
         -->
          

      
            <?php if(session()->get('level') == 4){?>
            <a href="<?= base_url('home/edit_data') ?>" class="nav-item nav-link"
              ><i class="fa fa-th me-2"></i>data web</a>
              <?php }?> 

            <?php if(session()->get('level') == 4){?>
            <a href="<?= base_url('home/mediatampil') ?>" class="nav-item nav-link"
              ><i class="fa fa-th me-2"></i>mediatampil</a
            >
            <?php if(session()->get('level') == 4){?>
            <a href="<?= base_url('home/media') ?>" class="nav-item nav-link"
              ><i class="fa fa-th me-2"></i>media</a
            >
            <?php }?> 
            <?php }?>
            <?php if(session()->get('level') == 4){?>
            <a href="<?= base_url('home/activity') ?>" class="nav-item nav-link"
              ><i class="fa fa-th me-2"></i>activity</a
            >
            <?php }?>
            
            <!--<a href="chart.html" class="nav-item nav-link"
              ><i class="fa fa-chart-bar me-2"></i>Charts</a
            > -->
            <?php if($acc->data_user == 1 || $acc->data_sewa == 1 || $acc->data_pembayaran == 1 || $acc->data_kendaraan == 1){ ?>
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                ><i class="far fa-file-alt me-2"></i>Data</a
              >
              <div class="dropdown-menu bg-transparent border-0">
                <?php if($acc->data_user==1){?>
                <a href="<?= base_url('home/data_user') ?>" class="dropdown-item">User</a>
                <?php }?>
                <?php if($acc->data_sewa==1){?>
                <a href="<?= base_url('home/data_sewa') ?>" class="dropdown-item">Sewa</a>
                <?php }?>
                <?php if($acc->data_pembayaran==1){?>
                <a href="<?= base_url('home/data_pemba') ?>" class="dropdown-item">Pembayaran</a>
                <?php }?>
                <?php if($acc->data_kendaraan==1){?>
                <a href="<?= base_url('home/data_kendaraan') ?>" class="dropdown-item">Kendaraan</a>
                <?php }?>
              </div>
            </div>
            <?php }?>
            <?php if($acc->restore_user == 1 || $acc->restore_sewa == 1 || $acc->restore_pembayaran == 1 || $acc->restore_kendaraan == 1){ ?>
            <div class="nav-item dropdown">
              <a
                href="#"        
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
                ><i class="far fa-file-alt me-2"></i>Restore</a
              >
              <div class="dropdown-menu bg-transparent border-0">
                <?php if($acc->restore_user==1){?>
                <a href="<?= base_url('home/restore_user') ?>" class="dropdown-item">User</a>
                <?php }?>
                <?php if($acc->restore_sewa==1){?>
                <a href="<?= base_url('home/restore_sewa') ?>" class="dropdown-item">Sewa</a>
                <?php }?>
                <?php if($acc->restore_pembayaran==1){?>
                <a href="<?= base_url('home/restore_pembayaran') ?>" class="dropdown-item">Pembayaran</a>
                <?php }?>
                <?php if($acc->restore_kendaraan==1){?>
                <a href="<?= base_url('home/restore_kendaraan') ?>" class="dropdown-item">Kendaraan</a>
                <?php }?>
              </div>
            </div>
            <?php }?>
<?php if($acc->settings==1){?>
            <a href="<?= base_url('home/settings') ?>" class="nav-item nav-link"
              ><i class="fa fa-cog me-2"></i>Settings</a
            >
<?php }?>
          </div>
        </nav>
      </div>
      <!-- Sidebar End -->

      <!-- Content Start -->
      <div class="content">
        <!-- Navbar Start -->
        <nav
          class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0"
        >
          <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
          </a>
          <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
          </a>
          
          <div class="navbar-nav align-items-center ms-auto">
            
            <div class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-bs-toggle="dropdown"
              >
                <!-- <img
                  class="rounded-circle me-lg-2"
                  src="img/user.jpg"
                  alt=""
                  style="width: 40px; height: 40px"
                /> -->
                <span class="d-none d-lg-inline-flex"><?=session()->get('nama')?></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0"
              >
                <!-- <a href="#" class="dropdown-item">My Profile</a>
                <a href="#" class="dropdown-item">Settings</a> -->
                <a href="<?= base_url('home/logout') ?>" class="dropdown-item">Log Out</a>
              </div>
            </div>
          </div>
        </nav>