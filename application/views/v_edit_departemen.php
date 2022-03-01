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
            <h1 class="m-0 text-dark">Update Departemen</h1>
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

    <div class="card-body">
            
    <div class="col-sm-8 offset-2" style="border:1px dashed gray; padding: 10px;">

      <!-- Form Simpan Format -->
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'master_departemen/update_departemen' ?>">

      <!-- Kode departemen .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="kode_departemen">Kode Departemen</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="kode_departemen" class="form-control" required="" autocomplete="off" value="<?php echo $data_departemen['kode_departemen'] ?>">
                      <input type="text" name="id" value="<?php echo $data_departemen['id'] ?>" hidden>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Kode departemen ...................................................................-->

      <!-- Nama departemen .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="nama_departemen">Nama Departemen</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="nama_departemen" class="form-control" required="" autocomplete="off" value="<?php echo $data_departemen['nama_departemen'] ?>">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Nama departemen ...................................................................-->
      

      <hr>

      <div class="tombol_kirim" style="text-align: center;">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-send-o"></i> Update Departemen
        </button>

        <a href="<?php echo base_url().'master_departemen' ?>" class="btn btn-danger">Kembali</a>
      </div>


    </form>
    <!-- Penutup Form -->

  </div>

          </div>

        </div>
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->