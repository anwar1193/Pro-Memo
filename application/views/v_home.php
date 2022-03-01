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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard LPPD</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Small boxes (Stat box) -->
        <div class="row">


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php  
                    $jumlah_memo_terkirim = $this->M_master->tampil_where_memo('tbl_memo', array(
                      'cabang' => $cabang,
                      'bagian' => $identitas
                  ))->num_rows();
                  ?>
                  <span>
                    <?php echo $jumlah_memo_terkirim; ?>
                  </span>
                </h3>

                <p>MEMO TERKIRIM</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url().'memo_terkirim' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php  
                    $jumlah_memo_selesai = $this->M_master->tampil_where_memo('tbl_memo', array(
                      'cabang' => $cabang,
                      'bagian' => $identitas,
                      'status_mengetahui' => 0,
                      'status_menyetujui' => 0
                  ))->num_rows();
                  ?>
                  
                  <?php echo $jumlah_memo_selesai; ?>
                </h3>

                <p>MEMO SELESAI</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url().'memo_selesai' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                <?php  
                  $jumlah_memo_revisi = $this->db->query("SELECT * FROM tbl_memo WHERE cabang='$cabang' AND bagian='$identitas' AND status_mengetahui=-1 OR cabang='$cabang' AND bagian='$identitas' AND status_menyetujui=-1")->num_rows();
                ?>
                
                <?php echo $jumlah_memo_revisi; ?>
                </h3>

                <p>MEMO REVISI</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url().'revisi_memo' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                <?php  
                  $jumlah_memo_rejected = $this->db->query("SELECT * FROM tbl_memo WHERE cabang='$cabang' AND bagian='$identitas' AND status_mengetahui=-2 OR cabang='$cabang' AND bagian='$identitas' AND status_menyetujui=-2")->num_rows();
                ?>
                
                <?php echo $jumlah_memo_rejected; ?>
                </h3>

                <p>MEMO REJECTED</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url().'rejected_memo' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->


        </div>
        <!-- /.row -->

        
        <!-- Main row -->
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
