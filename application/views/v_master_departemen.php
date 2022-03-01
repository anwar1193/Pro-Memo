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
            <h1 class="m-0 text-dark">Data Departemen</h1>
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
                <a href="<?php echo base_url().'master_departemen/tambah_departemen' ?>" class="btn btn-success">
                    <i class="fa fa-plus-circle"></i> Tambah Departemen
                </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Kode Departemen</th>
                    <th>Nama Departemen</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>

                  <tbody>

                  <?php  
                    $no=1;
                    foreach($data_departemen as $row){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['kode_departemen']; ?></td>
                    <td><?php echo $row['nama_departemen']; ?></td>
                    <td class="text-center">
                        <a href="<?php echo base_url().'master_departemen/edit_departemen/'.$row['id'] ?>" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="<?php echo base_url().'master_departemen/hapus_departemen/'.$row['id'] ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">
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