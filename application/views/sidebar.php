<?php  
  $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;
  $level = $this->libraryku->tampil_user()->level;
  $cabang = $this->libraryku->tampil_user()->cabang;
  $departemen = $this->libraryku->tampil_user()->departemen;

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
                if($departemen=='DIREKSI'){
                  echo $nama_lengkap;
                }else{
                  echo $departemen;
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

          <!-- MASTER DATA -->
              <!-- Cek Apakah user ini punya format memo? -->
              <?php  
                $cek_punya_memo = $this->M_master->tampil_where('tbl_jenis_memo', array('jenis_memo_owner' => $departemen))->num_rows();
              ?>

          <?php if($level=='admin' || $level=='Department Head' && $cek_punya_memo>0){ ?>
          <li class="nav-item has-treeview <?= $this->uri->segment(1)=='master_user' || $this->uri->segment(1)=='master_format_memo' || $this->uri->segment(1)=='master_cabang' || $this->uri->segment(1)=='master_departemen' || $this->uri->segment(1)=='master_level' || $this->uri->segment(1)=='master_user_memo' ? 'menu-open' : null; ?>">
            <a href="#" class="nav-link <?= $this->uri->segment(1)=='master_user' || $this->uri->segment(1)=='master_format_memo' || $this->uri->segment(1)=='master_cabang' || $this->uri->segment(1)=='master_departemen' || $this->uri->segment(1)=='master_level' || $this->uri->segment(1)=='master_user_memo' ? 'active' : null; ?>">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php if($level == 'admin'){ ?>
              <li class="nav-item">
                <a href="<?php echo base_url().'master_cabang' ?>" class="nav-link <?= $this->uri->segment(1)=='master_cabang' ? 'active' : null; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Cabang</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url().'master_departemen' ?>" class="nav-link <?= $this->uri->segment(1)=='master_departemen' ? 'active' : null; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Departemen</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url().'master_level' ?>" class="nav-link <?= $this->uri->segment(1)=='master_level' ? 'active' : null; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Level</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url().'master_user' ?>" class="nav-link <?= $this->uri->segment(1)=='master_user' ? 'active' : null; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <?php } ?>

              <li class="nav-item">
                <a href="<?php echo base_url().'master_format_memo' ?>" class="nav-link <?= $this->uri->segment(1)=='master_format_memo' ? 'active' : null; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Format Memo</p>
                </a>
              </li>

              <?php if($level == 'admin'){ ?>
                <li class="nav-item">
                  <a href="<?php echo base_url().'master_user_memo' ?>" class="nav-link <?= $this->uri->segment(1)=='master_user_memo' ? 'active' : null; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Relasi User-Memo</p>
                  </a>
                </li>
              <?php } ?>

            </ul>
          </li>
          <?php } ?>
          <!-- / MASTER DATA -->

          <!-- Inquiry Memo ALL -->
          <?php if($level=='admin' || $departemen=='INTERNAL AUDIT'){ ?>
            <li class="nav-item">
              <a href="<?php echo base_url().'inquiry_memo_all' ?>" class="nav-link <?= $this->uri->segment(1)=='inquiry_memo_all' ? 'active' : null; ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Inquiry Memo (All)
                </p>
              </a>
            </li>
          <?php } ?>
          <!-- END Inquiry Memo ALL -->

          <li class="nav-item">
            <a href="#" class="nav-link <?= $this->uri->segment(1)=='Pengajuan_memo' ? 'active' : null; ?>" data-toggle="modal" data-target="#modal-ajukanMemo">
              <i class="nav-icon fa fa-list-alt"></i> Ajukan Memo
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'memo_terkirim' ?>" class="nav-link <?= $this->uri->segment(1)=='memo_terkirim' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Memo Terkirim
                <?php  
                  $jumlah_memo_terkirim = $this->M_master->tampil_where_memo('tbl_memo', array(
                    'cabang' => $cabang,
                    'bagian' => $identitas
                ))->num_rows();
                ?>
                <span class="badge badge-primary right">
                  <?php echo $jumlah_memo_terkirim; ?>
                </span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'memo_selesai' ?>" class="nav-link <?= $this->uri->segment(1)=='memo_selesai' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-check-double"></i>
              <p>
                Memo Selesai
                <?php  
                  $jumlah_memo_selesai = $this->M_master->tampil_where_memo('tbl_memo', array(
                    'cabang' => $cabang,
                    'bagian' => $identitas,
                    'status_mengetahui' => 0,
                    'status_menyetujui' => 0
                ))->num_rows();
                ?>
                <span class="badge badge-success right">
                  <?php echo $jumlah_memo_selesai; ?>
                </span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'revisi_memo' ?>" class="nav-link <?= $this->uri->segment(1)=='revisi_memo' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-allergies"></i>
              <p>
                Revisi Memo
                <?php  
                  $jumlah_memo_revisi = $this->db->query("SELECT * FROM tbl_memo WHERE cabang='$cabang' AND bagian='$identitas' AND status_mengetahui=-1 OR cabang='$cabang' AND bagian='$identitas' AND status_menyetujui=-1")->num_rows();
                ?>
                <span class="badge badge-warning right">
                  <?php echo $jumlah_memo_revisi; ?>
                </span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'rejected_memo' ?>" class="nav-link <?= $this->uri->segment(1)=='rejected_memo' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-times"></i>
              <p>
                Rejected Memo
                <?php  
                  $jumlah_memo_rejected = $this->db->query("SELECT * FROM tbl_memo WHERE cabang='$cabang' AND bagian='$identitas' AND status_mengetahui=-2 OR cabang='$cabang' AND bagian='$identitas' AND status_menyetujui=-2")->num_rows();
                ?>
                <span class="badge badge-danger right">
                  <?php echo $jumlah_memo_rejected; ?>
                </span>
              </p>
            </a>
          </li>

          <!-- Menu Bukan Untuk ADCO, ADCOLL, CMC, ADD-CABANG -->
          <?php if($level != 'ADCO' && $level != 'ADCOLL' && $level != 'CMC' && $level != 'ADD-CABANG'){ ?>

          <li class="nav-item">
            <a href="<?php echo base_url().'inbox_mengetahui' ?>" class="nav-link <?= $this->uri->segment(1)=='inbox_mengetahui' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Inbox Mengetahui
                <?php  
                  $jumlah_inbox_mengetahui = $this->M_master->tampil_inbox_mengetahui($departemen, $level, $nama_lengkap)->num_rows();
                ?>
                <span class="badge badge-success right">
                  <?php echo $jumlah_inbox_mengetahui; ?>
                </span>

              </p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="<?php echo base_url().'inbox_menyetujui' ?>" class="nav-link <?= $this->uri->segment(1)=='inbox_menyetujui' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Inbox Menyetujui
                <?php  
                  $jumlah_inbox_menyetujui = $this->M_master->tampil_inbox_menyetujui($departemen, $level, $nama_lengkap)->num_rows();
                ?>
                <span class="badge badge-primary right">
                  <?php echo $jumlah_inbox_menyetujui; ?>
                </span>

              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?php echo base_url().'memo_final' ?>" class="nav-link <?= $this->uri->segment(1)=='memo_final' ? 'active' : null; ?>">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Memo (Ditujukan Ke Saya)
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview <?= $this->uri->segment(1)=='approved_history_mengetahui' || $this->uri->segment(1)=='approved_history_menyetujui' ? 'menu-open' : null; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-list-ol"></i>
              <p>
                Approved History
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url().'approved_history_mengetahui' ?>" class="nav-link <?= $this->uri->segment(1)=='approved_history_mengetahui' ? 'active' : null; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mengetahui</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url().'approved_history_menyetujui' ?>" class="nav-link <?= $this->uri->segment(1)=='approved_history_menyetujui' ? 'active' : null; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menyetujui</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } ?>
          
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
                $data_jenisMemo = $this->db->query("SELECT * FROM tbl_user_memo WHERE user='$identitas'")->result_array();
                foreach($data_jenisMemo as $row){
              ?>
              <option value="<?php echo $row['jenis_memo'] ?>">
                <?php echo $row['jenis_memo'] ?>
                <?= $row['jenis_memo'] == 'PELEPASAN BPKB AYDA' ? '/ WO' : NULL; ?>
              </option>
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