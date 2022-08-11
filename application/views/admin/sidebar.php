<?php  
  $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;
  $level = $this->libraryku->tampil_user()->level;
  $cabang = $this->libraryku->tampil_user()->cabang;
  $departemen = $this->libraryku->tampil_user()->departemen;
  $departemen_update = $this->libraryku->tampil_user()->departemen_update;

  if($cabang == 'HEAD OFFICE'){
      $identitas = $departemen;
  }else{
      $identitas = $level;
  }
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-orange elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-orange">
      <img src="<?php echo base_url().'gambar/' ?>logo.png" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3"
           style="opacity: .9">
      <span class="brand-text font-weight-400">Arah-Parking</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url().'asset2/' ?>dist/img/user.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info" style="margin-top: -10px;">
          <span style="color: black;">
            <?php echo $level; ?> <br> 

            <?php 
              if($cabang == 'HEAD OFFICE'){
                if($departemen=='DIREKSI'){
                  echo $nama_lengkap;
                }else{
                  echo $departemen_update;
                }
                
              }else{
                echo $cabang; 
              }
              
            ?>
          </span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url().'home' ?>" class="nav-link <?= $this->uri->segment(1)=='home' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'pesan_masuk' ?>" class="nav-link <?= $this->uri->segment(1)=='pesan_masuk' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Pesan Masuk
                <?php  
                  $jml_pesan_masuk = $this->M_master->tampil_data('tbl_pesan')->num_rows();
                ?>
                <span class="badge badge-success right">
                  <?php echo $jml_pesan_masuk; ?>
                </span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'admin_about' ?>" class="nav-link <?= $this->uri->segment(1)=='admin_about' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                About
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'info_tambahan' ?>" class="nav-link <?= $this->uri->segment(1)=='info_tambahan' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Info Tambahan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'produk' ?>" class="nav-link <?= $this->uri->segment(1)=='produk' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Produk
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'portfolio' ?>" class="nav-link <?= $this->uri->segment(1)=='portfolio' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Portofolio
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'team' ?>" class="nav-link <?= $this->uri->segment(1)=='team' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Team
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'contact' ?>" class="nav-link <?= $this->uri->segment(1)=='contact' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-phone-square"></i>
              <p>
                Contact
              </p>
            </a>
          </li>
          
          <li class="nav-header">USER</li>

          <li class="nav-item">
            <a href="<?php echo base_url().'ganti_password' ?>" class="nav-link <?= $this->uri->segment(1)=='ganti_password' ? 'active' : null; ?>">
              <i class="nav-icon fa fa-lock"></i>
              <p class="text">Ganti Password</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'Login/logout' ?>" class="nav-link">
              <i class="nav-icon fa fa-times text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->