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
            <h1 class="m-0 text-dark">Update Cabang</h1>
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
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'master_cabang/update_cabang' ?>">

      <!-- Kode Cabang .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="kode_cabang">Kode Cabang</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="kode_cabang" class="form-control" required="" autocomplete="off" value="<?php echo $data_cabang['kode_cabang'] ?>">
                      <input type="text" name="id" value="<?php echo $data_cabang['id'] ?>" hidden>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Kode Cabang ...................................................................-->

      <!-- Nama Cabang .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="nama_cabang">Nama Cabang</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="nama_cabang" class="form-control" required="" autocomplete="off" value="<?php echo $data_cabang['nama_cabang'] ?>">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Nama Cabang ...................................................................-->


      <!-- Wilayah .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="wilayah">Wilayah</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <select name="wilayah" id="wilayah" class="form-control" required="">
                          <option value="<?php echo $data_cabang['wilayah'] ?>"><?php echo $data_cabang['wilayah'] ?></option>
                          <option value="wilayah 1">Wilayah 1</option>
                          <option value="wilayah 2">Wilayah 2</option>
                          <option value="wilayah 5">Wilayah 5</option>
                          <option value="wilayah 6">Wilayah 6</option>
                          <option value="wilayah 7">Wilayah 7</option>
                      </select>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Wilayah ...................................................................-->


      <!-- No Telepon .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="no_telepon">No Telepon</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="no_telepon" class="form-control" required="" autocomplete="off" value="<?php echo $data_cabang['no_telepon'] ?>">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / No Telepon ...................................................................-->


      <!-- Alamat .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="alamat">Alamat</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10"><?php echo $data_cabang['alamat'] ?></textarea>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Alamat ...................................................................-->
      

      <hr>

      <div class="tombol_kirim" style="text-align: center;">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-send-o"></i> Update Cabang
        </button>

        <a href="<?php echo base_url().'master_cabang' ?>" class="btn btn-danger">Kembali</a>
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