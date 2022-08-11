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
            <h1 class="m-0 text-dark">Ganti Password</h1>
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
      <form method="post" action="<?php echo base_url().'ganti_password/update_password' ?>">

                <input type="text" name="id_user" value="<?php echo $data_user['id'] ?>" hidden>

                <div class="form-group">
                  <label for="nama">Nama <span style="color: red;">*</span></label>
                  <input type="text" name="nama" id="nama" value="<?php echo $data_user['nama_lengkap'] ?>" class="form-control" readonly>
                </div>

                <div class="form-group">
                  <label for="username">Username <span style="color: red;">*</span></label>
                  <input type="text" name="username" value="<?php echo $data_user['username'] ?>" id="username" class="form-control" readonly autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="password_lama">Password Lama <span style="color: red;">*</span></label>
                  <input type="password" name="password_lama" id="password_lama" class="form-control form-password" required>
                </div>

                <div class="form-group">
                  <label for="password">Password Baru <span style="color: red;">*</span></label>
                  <input type="password" name="password" id="password" class="form-control form-password" required minlength="5" placeholder="minimal 5 karakter">
                </div>

                <input type="checkbox" class="form-checkbox"> Show password <br><br>

                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Update Password</button>
                <button class="btn btn-danger btn-sm" type="reset"><i class="fa fa-times"></i> Reset</button>

              </form>
      <!-- / Form Simpan Format -->
      

  </div>

          </div>

        </div>
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Script Lihat Password -->
  <script type="text/javascript">
    $(document).ready(function(){   
      $('.form-checkbox').click(function(){
        if($(this).is(':checked')){
          $('.form-password').attr('type','text');
        }else{
          $('.form-password').attr('type','password');
        }
      });
    });
  </script>