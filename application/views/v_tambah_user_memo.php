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
            <h1 class="m-0 text-dark">Tambah Relasi User - Memo</h1>
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
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'master_user_memo/simpan' ?>">

      <!-- User Pengaju .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="user">User Pengaju</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                    
                    <select name="user" class="form-control" required="">
                        <option value="">- Pilih -</option>

                        <?php foreach($data_departemen as $row){ ?>
                        <option value="<?php echo $row['nama_departemen'] ?>"><?php echo $row['nama_departemen'] ?></option>
                        <?php } ?>
                    </select>

                  </td>
              </tr>
          </table>
      </div>
      <!-- / User Pengaju ...................................................................-->


      <!-- Jenis Memo .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="owner">Jenis Memo</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                    
                  <?php foreach($data_jenis_memo as $row_jenis_memo){ ?>
                    <label>
                        <input type="checkbox" name="jenis_memo[]" class="minimal" value="<?php echo $row_jenis_memo['jenis_memo_perihal'] ?>">
                        <?php echo $row_jenis_memo['jenis_memo_perihal'] ?> - (<?php echo $row_jenis_memo['jenis_memo_owner'] ?>)
                    </label> <br>
                  <?php } ?>

                  </td>
              </tr>
          </table>
      </div>
      <!-- / Jenis Memo ...................................................................-->

      


      <div class="tombol_kirim" style="text-align: center;">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-send-o"></i> Simpan
        </button>

        <a href="<?php echo base_url().'master_user_memo' ?>" class="btn btn-danger">Kembali</a>
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

  