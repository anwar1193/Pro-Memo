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
            <h1 class="m-0 text-dark">Data Relasi User - Memo</h1>
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
                <a href="<?php echo base_url().'master_user_memo/tambah_user_memo' ?>" class="btn btn-success">
                    <i class="fa fa-plus-circle"></i> Tambah Relasi User - Memo
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>User</th>
                    <th>Akses Memo</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>

                  <tbody>

                  <?php 
                    $no = 0;
                    foreach($data_user as $row){
                        $no++;
                        $user = $row['user']
                  ?>
                  <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $user; ?></td>

                      <td>
                        <?php  
                            $data_user_memo = $this->db->query("SELECT * FROM tbl_user_memo WHERE user='$user'")->result_array();
                            foreach($data_user_memo as $row_memo){
                        ?>
                            <?php echo $row_memo['jenis_memo'] ?> <br>
                        <?php } ?>
                      </td>

                      <td class="text-center">
                        <a href="<?php echo base_url().'master_user_memo/edit/'.$row['user'] ?>" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="<?php echo base_url().'master_user_memo/hapus/'.$row['user'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">
                            <i class="fa fa-trash"></i>
                        </a>
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