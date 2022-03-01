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
            <h1 class="m-0 text-dark">Edit Format Memo</h1>
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
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'master_format_memo/update_format' ?>">

      <input type="text" name="jenis_memo_id" value="<?php echo $data_jenis_memo['jenis_memo_id'] ?>" hidden>

      <!-- Owner Memo .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="owner">Owner</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                    <?php if($level == 'admin'){ ?>

                      <select name="owner" class="form-control" required="">
                          <option value="<?php echo $data_jenis_memo['jenis_memo_owner'] ?>">
                          <?php echo $data_jenis_memo['jenis_memo_owner'] ?>
                          </option>

                          <?php foreach($data_departemen as $row){ ?>
                          <option value="<?php echo $row['nama_departemen'] ?>"><?php echo $row['nama_departemen'] ?></option>
                          <?php } ?>
                      </select>

                    <?php }else{ ?>

                      <input type="text" class="form-control" name="owner" autocomplete="off" value="<?php echo $departemen; ?>" readonly>
                      
                    <?php } ?>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Owner Memo ...................................................................-->

      <!-- Nomor Memo .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="jenis_memo">Jenis Memo</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                      <input type="text" class="form-control" name="jenis_memo" autocomplete="off" required="" value="<?php echo $data_jenis_memo['jenis_memo_perihal'] ?>" readonly>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Nomor Memo ...................................................................-->

      <!-- Text-1 .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="text1">Isi Text 1</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                    <textarea class="textarea" name="text1" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        <?php echo $data_jenis_memo['jenis_memo_text1'] ?>
                    </textarea>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Text-1 ...................................................................-->

      <!-- Text-2 .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="text2">Isi Text 2</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                    <textarea class="textarea" name="text2" required="" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        <?php echo $data_jenis_memo['jenis_memo_text2'] ?>
                    </textarea>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Text-2 ...................................................................-->

      <!-- Kepada .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="kepada">Kepada</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                    <select name="kepada" class="form-control" required="">
                        <option value="<?php echo $data_jenis_memo['jenis_memo_kepada'] ?>">
                        <?php echo $data_jenis_memo['jenis_memo_kepada'] ?>
                        </option>

                        <?php foreach($data_departemen as $row){ ?>
                        <option value="<?php echo $row['nama_departemen'] ?>"><?php echo $row['nama_departemen'] ?></option>
                        <?php } ?>
                    </select>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Kepada ...................................................................-->

      <!-- CC .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="20%">
                  <label for="cc">CC</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="70%">
                    <select name="cc" class="form-control" required="">
                        <option value="<?php echo $data_jenis_memo['jenis_memo_cc'] ?>">
                        <?php echo $data_jenis_memo['jenis_memo_cc'] ?>
                        </option>

                        <?php foreach($data_departemen as $row){ ?>
                        <option value="<?php echo $row['nama_departemen'] ?>"><?php echo $row['nama_departemen'] ?></option>
                        <?php } ?>
                    </select>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / CC ...................................................................-->

      <hr>

      <!-- Mengetahui -->
      <?php require_once('mengetahui_master_revisi.php'); ?>

      <!-- Menyetujui -->
      <?php require_once('menyetujui_master_revisi.php'); ?>


      <div class="tombol_kirim" style="text-align: center;">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-send-o"></i> Update Format
        </button>

        <a href="<?php echo base_url().'master_format_memo' ?>" class="btn btn-danger">Kembali</a>
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

  <!-- Modal Mengetahui -->
  <div class="modal fade" id="modal-mengetahui">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Large Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <table id="example1" class="table table-bordered table-striped">
                  
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama Lengkap</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                $no=1;
                foreach($data_user as $data) : 
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_lengkap'] ?></td>
                <td><?php echo $data['departemen'] ?></td>
                <td><?php echo $data['level'] ?></td>
                <td>
                  <button class="btn btn-info btn-xs" id="pilih_kepada" type="button"
                    data-nama_lengkap="<?php echo $data['nama_lengkap'] ?>"
                    data-departemen="<?php echo $data['departemen'] ?>"
                    data-jabatan="<?php echo $data['level'] ?>"
                  >
                  <i class="fa fa-check"></i> Pilih</button></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
            
        </table>

        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
  <!-- / Modal Mengetahui -->


  <!--Modal Menyetujui -->
  <div class="modal fade" id="modal-menyetujui">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Pilih Menyetujui</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            
        <table id="example2" class="table table-bordered table-striped">
                  
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama Lengkap</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php 
                $no=1;
                foreach($data_user as $data) : 
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_lengkap'] ?></td>
                <td><?php echo $data['departemen'] ?></td>
                <td><?php echo $data['level'] ?></td>
                <td>
                  <button class="btn btn-info btn-xs" id="pilih_menyetujui" type="button"
                    data-nama_lengkap="<?php echo $data['nama_lengkap'] ?>"
                    data-departemen="<?php echo $data['departemen'] ?>"
                    data-jabatan="<?php echo $data['level'] ?>"
                  >
                  <i class="fa fa-check"></i> Pilih</button></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
            
        </table>

        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
  <!-- /Modal Menyetujui -->

  <!-- Script Jquery Data Mahasiswa -->
  <script>
    $(document).ready(function(){
      $(document).on('click','#pilih_kepada', function(){
        var nama_lengkap = $(this).data('nama_lengkap');
        var departemen = $(this).data('departemen');
        var jabatan = $(this).data('jabatan');

        $('#mengetahui_nama').val(nama_lengkap);
        $('#mengetahui_departemen').val(departemen);
        $('#mengetahui_jabatan').val(jabatan);

        $('#modal-mengetahui').modal('hide');
      });

      $(document).on('click','#pilih_menyetujui', function(){
        var nama_lengkap = $(this).data('nama_lengkap');
        var departemen = $(this).data('departemen');
        var jabatan = $(this).data('jabatan');

        $('#menyetujui_nama').val(nama_lengkap);
        $('#menyetujui_departemen').val(departemen);
        $('#menyetujui_jabatan').val(jabatan);

        $('#modal-menyetujui').modal('hide');
      });

    });
  </script>
  <!-- / Script Jquery Data Mahasiswa -->