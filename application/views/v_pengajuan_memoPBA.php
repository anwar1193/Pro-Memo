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
            <h1 class="m-0 text-dark">Halaman Pengajuan Memo</h1>
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
    
    <h3 style="text-align: center;">MEMO <?php echo $jenis_memo ?></h3>


      <hr style="border-width: 0.5px; width: 100%; border-color: silver; border-style: dashed;">

      <!-- Form Kirim Laporan (Utama) -->
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'pengajuan_memo/kirim_laporan' ?>">

      <!-- Nomor Memo .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="40%">
                  <label for="nomor_memo">Nomor Memo</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="50%">
                      <input type="text" class="form-control" name="nomor_memo" autocomplete="off" autofocus required="">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Nomor Memo ...................................................................-->

      <!-- Kepada .....................................................................-->
      <div class="form-group">
          <table width="100%" id="kolom_kepada">
              <tr>
                  <td width="40%">
                  <label for="kepada">Kepada</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="37%">
                      <select name="kepada[]" class="form-control" required="">
                        <option value="<?php echo $data_jenis_memo['jenis_memo_kepada'] ?>">
                          <?php echo $data_jenis_memo['jenis_memo_kepada'] ?>
                        </option>

                        <?php foreach($data_departemen as $row_departemen){ ?>
                        <option value="<?php echo $row_departemen['nama_departemen'] ?>">
                          <?php echo $row_departemen['nama_departemen'] ?>
                        </option>
                        <?php } ?>
                      </select>
                  </td>

                  <td width="13%">
                    <button type="button" class="btn btn-success" id="tambah_kepada"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-danger" id="hapus_kepada"><i class="fa fa-trash"></i></button>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Kepada ...................................................................-->


      <!-- CC .....................................................................-->
      <div class="form-group">
          <table width="100%" id="kolom_cc">
              <tr>
                  <td width="40%">
                  <label for="cc">CC</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="37%">
                      <select name="cc[]" class="form-control" required="">
                        <option value="<?php echo $data_jenis_memo['jenis_memo_cc'] ?>">
                          <?php echo $data_jenis_memo['jenis_memo_cc'] ?>
                        </option>

                        <?php foreach($data_departemen as $row_departemen){ ?>
                        <option value="<?php echo $row_departemen['nama_departemen'] ?>">
                          <?php echo $row_departemen['nama_departemen'] ?>
                        </option>
                        <?php } ?>
                      </select>
                  </td>

                  <td width="13%">
                    <button type="button" class="btn btn-success" id="tambah_cc"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-danger" id="hapus_cc"><i class="fa fa-trash"></i></button>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / CC ...................................................................-->


      <!-- Dari .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="40%">
                  <label for="dari">Dari</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="50%">
                      <input type="text" class="form-control" name="dari" autocomplete="off" value="<?php echo $level.'-'.$cabang; ?>">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Dari ...................................................................-->


      <!-- Tanggal .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="40%">
                  <label for="tanggal">Tanggal</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="50%">
                      <input type="text" class="form-control" name="tanggal" value="<?php echo date('d-m-Y') ?>" readonly style="background-color: white;">
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Tanggal ...................................................................-->


      <!-- Perihal .....................................................................-->
      <div class="form-group">
        <table width="100%">
            <tr>
                <td width="40%">
                <label for="perihal">Perihal</label>
                </td>

                <td width="10%" style="text-align: center;">:</td>

                <td width="50%">
                    <input type="text" class="form-control" name="perihal" autocomplete="off" value="<?php echo $data_jenis_memo['jenis_memo_perihal'] ?>">
                </td>
            </tr>
        </table>
      </div>
      <!-- / Perihal ...................................................................-->

      <hr>

      <!-- Isi Text 1 -->
      <p>
        <?php echo $data_jenis_memo['jenis_memo_text1'] ?>
        <input type="text" name="text1" value="<?php echo $data_jenis_memo['jenis_memo_text1'] ?>" hidden>
      </p>

      <hr>

      <!-- Data Pinjaman -->
      <?php 
        if($data_jenis_memo['jenis_memo_perihal'] == 'PELEPASAN BPKB AYDA'){
          require_once('data_pinjaman/1-pelepasan_bpkb_ayda.php'); 

        }elseif($data_jenis_memo['jenis_memo_perihal'] == 'PELEPASAN BPKB LUNAS'){
          require_once('data_pinjaman/2-pelepasan_bpkb_lunas.php'); 

        }elseif($data_jenis_memo['jenis_memo_perihal'] == 'PRIORITAS PELEPASAN BPKB'){
          require_once('data_pinjaman/3-prioritas_pelepasan_bpkb.php'); 
        }
        
      ?>
      <!-- / Data Pinjaman -->

      <hr>

      <!-- Isi Text 2 -->
      <p>
        <?php echo $data_jenis_memo['jenis_memo_text2'] ?>
        <input type="text" name="text2" value="<?php echo $data_jenis_memo['jenis_memo_text2'] ?>" hidden>
      </p>

      <hr>


      <!-- Form Upload -->
      <span style="font-weight: bold; font-size: 18px;">Upload Dokumen</span>
      
      <table class="table table-bordered wy-table-striped" id="tableLoop_dokLPPD">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>Pilih File</th>
                  <th>Jenis File</th>
                  <th class="text-center">
                      <button class="btn btn-primary btn-sm" id="BarisBaru_dokLPPD" type="button">
                          <i class="fa fa-plus"></i>
                      </button>
                  </th>
              </tr>
          </thead>

          <tbody>
            <tr>
              <td>1</td>
              <td><input type="file" class="form-control" name="file"></td>
              <td><input type="text" class="form-control" name="jenis_file"></td>
              <td class="text-center">
                <button class="btn btn-danger btn-sm" type="button">
                    <i class="fa fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
      </table>
      <!-- / Form Upload -->


      <!-- Dibuat Oleh .....................................................................-->
      <div class="form-group" style="margin-top: 20px;">
        <table class="table table-bordered">
            <tr>
                <td width="40%">
                <label for="dibuat_oleh">Dibuat Oleh</label>
                </td>

                <td width="10%" style="text-align: center;">:</td>

                <td width="50%">
                    <input type="text" class="form-control" name="dibuat_oleh" autocomplete="off" value="<?php echo $level.'-'.$cabang; ?>">
                </td>
            </tr>
        </table>
      </div>
      <!-- / Dibuat Oleh ...................................................................-->


      <!-- Mengetahui -->
      <?php require_once('mengetahui.php'); ?>

      <!-- Menyetujui -->
      <?php require_once('menyetujui.php'); ?>

      <div class="tombol_kirim" style="text-align: center;">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-send-o"></i> Kirim Memo
        </button>

        <a href="<?php echo base_url().'home' ?>" class="btn btn-danger">Batal Memo</a>
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

      // Tombol Tambah Kepada Di Klik
      $('#tambah_kepada').click(function(){
        $('#kolom_kepada').append('<tr class="item_kepada"><td width="40%"></td><td width="10%" style="text-align: center;"></td><td width="37%"><select name="kepada[]" class="form-control" required=""><option value="">- Pilih -</option><?php foreach($data_departemen as $row_departemen){ ?><option value="<?php echo $row_departemen['nama_departemen'] ?>"><?php echo $row_departemen['nama_departemen'] ?></option><?php } ?></select></td><td width="13%"></td></tr>');
      });

      // Tombol Hapus Kepada Di Klik
      $('#hapus_kepada').click(function(){
        $('.item_kepada:last').remove();
      });

      // Tombol Tambah CC Di Klik
      $('#tambah_cc').click(function(){
        $('#kolom_cc').append('<tr class="item_cc"><td width="40%"></td><td width="10%" style="text-align: center;"></td><td width="37%"><select name="cc[]" class="form-control" required=""><option value="">- Pilih -</option><?php foreach($data_departemen as $row_departemen){ ?><option value="<?php echo $row_departemen['nama_departemen'] ?>"><?php echo $row_departemen['nama_departemen'] ?></option><?php } ?></select></td><td width="13%"></td></tr>');
      });

      // Tombol Hapus CC Di Klik
      $('#hapus_cc').click(function(){
        $('.item_cc:last').remove();
      });

    });
  </script>