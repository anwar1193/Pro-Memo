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
            <h1 class="m-0 text-dark">Update User</h1>
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
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'master_user/update_user' ?>">

      <!-- Level .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="level">Level</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <select name="level" id="level" class="form-control" required="">
                          <option value="<?php echo $data_user['level'] ?>"><?php echo $data_user['level'] ?></option>
                          <?php foreach($data_level as $row) : ?>
                            <option value="<?php echo $row['level'] ?>"><?php echo $row['level'] ?></option>
                          <?php endforeach; ?>
                      </select>

                      <input type="text" name="id_user" value="<?php echo $data_user['id'] ?>" hidden>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Level ...................................................................-->

      <!-- NIK .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="nik">NIK</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="nik" class="form-control" required="" autocomplete="off" value="<?php echo $data_user['nik'] ?>">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / NIK ...................................................................-->

      <!-- Nama Lengkap .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="nama_lengkap" class="form-control" required="" autocomplete="off" value="<?php echo $data_user['nama_lengkap'] ?>">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Nama Lengkap ...................................................................-->


      <!-- Cabang .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="cabang">Cabang</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <select name="cabang" id="cabang" class="form-control" required="">
                          <option value="<?php echo $data_user['cabang'] ?>"><?php echo $data_user['cabang'] ?></option>
                          <?php foreach($data_cabang as $row) : ?>
                            <option value="<?php echo $row['nama_cabang'] ?>"><?php echo $row['nama_cabang'] ?></option>
                          <?php endforeach; ?>
                      </select>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Cabang ...................................................................-->


      <!-- Departemen .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="departemen">Departemen</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <select name="departemen" id="departemen" class="form-control" required="">
                          <option value="<?php echo $data_user['departemen'] ?>"><?php echo $data_user['departemen'] ?></option>
                          <?php foreach($data_departemen as $row) : ?>
                            <option value="<?php echo $row['nama_departemen'] ?>"><?php echo $row['nama_departemen'] ?></option>
                          <?php endforeach; ?>
                      </select>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Departemen ...................................................................-->


      <!-- Username .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="username">Username</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" name="username" class="form-control" required="" autocomplete="off" value="<?php echo $data_user['username'] ?>">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Username ...................................................................-->


      <!-- password .....................................................................-->
      <!-- <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="password">Password</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="password" name="password" id="password" class="form-control" required="" autocomplete="off" value="<?php echo $data_user['password'] ?>">
                      <input type="checkbox" id="showPassword" style="cursor: pointer;">
                      <label for="showPassword" style="cursor: pointer;">Show Password</label>
                  </td>
              </tr>
          </table>
      </div> -->
      <!-- / password ...................................................................-->

      <hr>

      <div class="tombol_kirim" style="text-align: center;">

        <button type="submit" class="btn btn-success btn-sm">
          <i class="fa fa-send-o"></i> Update User
        </button>

        <a href="<?php echo base_url().'master_user/reset_password/'.$data_user['id'] ?>" class="btn btn-warning btn-sm" onclick="return confirm('Password Akan Di Ubah : Profi@123')">
            Reset Password
        </a>

        <a href="<?php echo base_url().'master_user' ?>" class="btn btn-danger btn-sm">Kembali</a>
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

  <script>
      $(document).ready(function(){
        $('#showPassword').on('click', function(){
            if($(this).is(':checked')){
                $('#password').attr('type', 'text');
            }else{
                $('#password').attr('type', 'password');
            }
        })
      });
  </script>