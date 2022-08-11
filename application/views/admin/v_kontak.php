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
            <h1 class="m-0 text-dark">Halaman Kontak</h1>
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
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'contact/update' ?>">

      <!-- Alamat .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="alamat">Alamat</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                    <textarea class="textarea" name="alamat" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        <?php echo $data_kontak['alamat'] ?>
                    </textarea>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Alamat ...................................................................-->


      <!-- Email .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="judul_halaman">Email</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="email" class="form-control" name="email" value="<?php echo $data_kontak['email'] ?>" autocomplete="off" autofocus required="">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Email ...................................................................-->


      <!-- Nomor Telepon .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="nomor_telepon">Nomor Telepon</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" class="form-control" name="nomor_telepon" value="<?php echo $data_kontak['nomor_telepon'] ?>" autocomplete="off" autofocus required="">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Nomor Telepon ...................................................................-->


      <!-- Link Maps .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="link_maps">Link Maps</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" class="form-control" name="link_maps" value="<?php echo $data_kontak['link_maps'] ?>" autocomplete="off" autofocus required="">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Link Maps ...................................................................-->



      <div class="tombol_kirim" style="text-align: center;">
        <button type="submit" class="btn btn-success" id="simpan_format">
          <i class="fa fa-send-o"></i> Update Perubahan
        </button>
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