<?php  
    date_default_timezone_set("Asia/Jakarta");
    $nama_lengkap = $this->libraryku->tampil_user()->nama_lengkap;
    $level = $this->libraryku->tampil_user()->level;
    $cabang = $this->libraryku->tampil_user()->cabang;
    $departemen = $this->libraryku->tampil_user()->departemen;
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Format Memo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pro-Memo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
      <div class="card">
              <div class="card-header">
                <a href="<?php echo base_url().'master_format_memo/tambah_format' ?>" class="btn btn-success">
                    <i class="fa fa-plus-circle"></i> Tambah Format Memo
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Jenis Memo</th>
                    <th>Kepada</th>
                    <th>CC</th>
                    <th>Mengetahui</th>
                    <th>Menyetujui</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>

                  <?php  
                    $no=1;
                    foreach($data_format_memo as $row){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['jenis_memo_perihal']; ?></td>
                    <td><?php echo $row['jenis_memo_kepada']; ?></td>
                    <td><?php echo $row['jenis_memo_cc']; ?></td>
                    <td><?php echo $row['jenis_memo_mengetahuiDepartemen'].'<br>('.$row['jenis_memo_mengetahuiUsername'].')'; ?></td>
                    <td><?php echo $row['jenis_memo_menyetujuiDepartemen'].'<br>('.$row['jenis_memo_menyetujuiUsername'].')'; ?></td>
                    <td>
                        <a href="<?php echo base_url().'master_format_memo/edit/'.$row['jenis_memo_id'] ?>" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </a>

                        <?php if($row['jenis_memo_perihal'] != 'MEMO GENERAL'){ ?>
                          <a href="<?php echo base_url().'master_format_memo/hapus/'.$row['jenis_memo_id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">
                              <i class="fa fa-trash"></i>
                          </a>
                        <?php }else{ ?>

                          <button type="button" class="btn btn-default" disabled>
                            <i class="fa fa-trash"></i>
                          </button>
                        <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>

                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->