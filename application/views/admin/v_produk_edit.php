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
            <h1 class="m-0 text-dark">Update Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Arah-Parking</li>
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
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'produk/update' ?>">

      <!-- nama_produk .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="nama_produk">Nama Produk</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="nama_produk" class="form-control" required="" autocomplete="off" value="<?php echo $data_produk['nama_produk'] ?>">
                      <input type="text" name="id" value="<?php echo $data_produk['id'] ?>" hidden>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / nama_produk ...................................................................-->

      <!-- deskripsi .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="deskripsi">Deskripsi</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="deskripsi" class="form-control" required="" autocomplete="off" value="<?php echo $data_produk['deskripsi'] ?>">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / deskripsi ...................................................................-->

      <!-- icon .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="icon">icon</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <select name="icon" class="form-control">
                          <option value="<?php echo $data_produk['icon'] ?>"><?php echo $data_produk['icon'] ?></option>
                          <option value="bx bxl-dribbble">bx bxl-dribbble</option>
                          <option value="bx bx-file">bx bx-file</option>
                          <option value="bx bx-tachometer">bx bx-tachometer</option>
                          <option value="bx bx-world">bx bx-world</option>
                          <option value="bx bx-slideshow">bx bx-slideshow</option>
                          <option value="bx bx-arch">bx bx-arch</option>
                      </select>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / icon ...................................................................-->
      

      <hr>

      <div class="tombol_kirim" style="text-align: center;">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-send-o"></i> Update Produk
        </button>

        <a href="<?php echo base_url().'produk' ?>" class="btn btn-danger">Kembali</a>
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