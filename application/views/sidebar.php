<?php  
  $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;
  $level = $this->libraryku->tampil_user()->level;
  $cabang = $this->libraryku->tampil_user()->cabang;
  $departemen = $this->libraryku->tampil_user()->departemen;
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-orange elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-orange">
      <img src="<?php echo base_url().'asset2/' ?>dist/img/procar.png" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3"
           style="opacity: .9">
      <span class="brand-text font-weight-400">Pro-Memo</span>
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
                echo $departemen;
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

          <!-- MASTER DATA -->
          <li class="nav-item has-treeview <?= $this->uri->segment(1)=='master_user' || $this->uri->segment(1)=='master_format_memo' ? 'menu-open' : null; ?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1)=='master_user' || $this->uri->segment(1)=='master_format_memo' ? 'active' : null; ?>">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo base_url().'master_user' ?>" class="nav-link <?= $this->uri->segment(1)=='master_user' ? 'active' : null; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url().'master_format_memo' ?>" class="nav-link <?= $this->uri->segment(1)=='master_format_memo' ? 'active' : null; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Format Memo</p>
                </a>
              </li>

            </ul>
          </li>
          <!-- / MASTER DATA -->

          <li class="nav-item">
            <a href="#" class="nav-link <?= $this->uri->segment(1)=='Pengajuan_memo' ? 'active' : null; ?>" data-toggle="modal" data-target="#modal-ajukanMemo">
              <i class="nav-icon fa fa-list-alt"></i> Ajukan Memo
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'inbox_mengetahui' ?>" class="nav-link <?= $this->uri->segment(1)=='inbox_mengetahui' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Inbox Mengetahui
                <?php  
                  $jumlah_inbox_mengetahui = $this->M_master->tampil_inbox_mengetahui($departemen, $level)->num_rows();
                ?>
                <span class="badge badge-success right">
                  <?php echo $jumlah_inbox_mengetahui; ?>
                </span>

              </p>
            </a>
          </li>
          
          
          <li class="nav-header">USER</li>
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


  <!-- Modal Ajukan Memo -->
  <div class="modal fade" id="modal-ajukanMemo">
    <form method="post" action="<?php echo base_url().'Pengajuan_memo' ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pengajuan Memo</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <div class="form-group">
            <label for="tanggal_konsolidasi">Pilih Jenis Memo :</label>
            <select name="jenis_memo" id="jenis_memo" class="form-control" required="">
              <option value="">-Pilih-</option>
              <?php
                $data_jenisMemo = $this->M_master->jenis_memo()->result_array();
                foreach($data_jenisMemo as $row){
              ?>
              <option value="<?php echo $row['jenis_memo_perihal'] ?>"><?php echo $row['jenis_memo_perihal'] ?></option>
              <?php } ?>
            </select>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Proses</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </form>
  </div>
  <!-- /. Modal Ajukan Memo -->