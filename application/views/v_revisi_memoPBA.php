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
            <h1 class="m-0 text-dark">Halaman Revisi Memo</h1>
            <input type="text" value="<?php echo $nama_lengkap ?>" id="user_pengaju" hidden>

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
    
    <h3 style="text-align: center;">REVISI MEMO <?php echo $jenis_memo ?></h3>


      <hr style="border-width: 0.5px; width: 100%; border-color: silver; border-style: dashed;">

      <!-- Form Kirim Laporan (Utama) -->
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'revisi_memo/update' ?>">

      <!-- Nomor Memo .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="40%">
                  <label for="nomor_memo">Nomor Memo</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="50%">
                      <input type="text" class="form-control" name="nomor_memo" autocomplete="off" required="" value="<?php echo $data_memo['nomor_memo'] ?>">

                      <input type="text" name="id_memo" value="<?php echo $data_memo['id_memo'] ?>" hidden>
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
                        
                        <?php foreach($data_memo_kepada as $row){ ?>
                        <option value="<?php echo $row['kepada'] ?>">
                          <?php echo $row['kepada'] ?>
                        </option>
                        <?php } ?>

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
                        <?php foreach($data_memo_cc as $row){ ?>
                        <option value="<?php echo $row['cc'] ?>">
                          <?php echo $row['cc'] ?>
                        </option>
                        <?php } ?>

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
                      <input type="text" class="form-control" name="tanggal" value="<?php echo date('d-m-Y', strtotime($data_memo['tanggal'])) ?>" readonly style="background-color: white;">
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
                    <input type="text" class="form-control" name="perihal" autocomplete="off" value="<?php echo $data_memo['perihal'] ?>">
                </td>
            </tr>
        </table>
      </div>
      <!-- / Perihal ...................................................................-->

      <hr>

      <!-- Isi Text 1 -->
      <p>
        <?php echo $data_jenis_memo['jenis_memo_text1'] ?>
        <textarea name="text1" hidden><?php echo $data_jenis_memo['jenis_memo_text1'] ?></textarea>
      </p>

      <hr>

      <!-- Data Pinjaman -->
      <?php 
        if($data_jenis_memo['jenis_memo_perihal'] == 'PELEPASAN BPKB AYDA'){
          require_once('data_pinjaman_revisi/1-pelepasan_bpkb_ayda.php'); 

        }elseif($data_jenis_memo['jenis_memo_perihal'] == 'PELEPASAN BPKB LUNAS'){
          require_once('data_pinjaman_revisi/2-pelepasan_bpkb_lunas.php'); 

        }elseif($data_jenis_memo['jenis_memo_perihal'] == 'PRIORITAS PELEPASAN BPKB'){
          require_once('data_pinjaman_revisi/3-prioritas_pelepasan_bpkb.php'); 
        }
        
      ?>
      <!-- / Data Pinjaman -->

      <hr>

      <!-- Isi Text 2 -->
      <p>
        <?php echo $data_jenis_memo['jenis_memo_text2'] ?>
        <textarea name="text2" hidden><?php echo $data_jenis_memo['jenis_memo_text2'] ?></textarea>
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
      <?php require_once('mengetahui_revisi.php'); ?>

      <!-- Menyetujui -->
      <?php require_once('menyetujui_revisi.php'); ?>

      <!-- Note Mengetahui -->
      Note Mengetahui/Menyetujui (Jika ada perubahan alur/tidak sesuai SOP, silahkan berikan alasannya) :
      <textarea name="note_mengetahui" class="form-control" cols="30" rows="5"></textarea>

      <div class="tombol_kirim" style="text-align: center;">
        <button type="submit" class="btn btn-success" id="kirimMemo">
          <i class="fa fa-send-o"></i> Update Memo
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


      // Tombol kirim memo di klik
      $(document).on('click', '#kirimMemo', function(){

        var mengetahui1 = $('#mengetahui_username1').val();
        var mengetahui2 = $('#mengetahui_username2').val();
        var mengetahui3 = $('#mengetahui_username3').val();
        var mengetahui4 = $('#mengetahui_username4').val();

        var menyetujui1 = $('#menyetujui_username1').val();
        var menyetujui2 = $('#menyetujui_username2').val();
        var menyetujui3 = $('#menyetujui_username3').val();
        var menyetujui4 = $('#menyetujui_username4').val();

        var mengetahui1_dept = $('#mengetahui_departemen1').val();
        var mengetahui2_dept = $('#mengetahui_departemen2').val();
        var mengetahui3_dept = $('#mengetahui_departemen3').val();
        var mengetahui4_dept = $('#mengetahui_departemen4').val();

        var menyetujui1_dept = $('#menyetujui_departemen1').val();
        var menyetujui2_dept = $('#menyetujui_departemen2').val();
        var menyetujui3_dept = $('#menyetujui_departemen3').val();
        var menyetujui4_dept = $('#menyetujui_departemen4').val();

        var user_pengaju = $('#user_pengaju').val();


        // Di awal semua warna border jadi silver (normal)
        $('#mengetahui_departemen1').css({'borderColor' : 'silver'});
        $('#mengetahui_jabatan1').css({'borderColor' : 'silver'});
        $('#mengetahui_username1').css({'borderColor' : 'silver'});

        $('#mengetahui_departemen2').css({'borderColor' : 'silver'});
        $('#mengetahui_jabatan2').css({'borderColor' : 'silver'});
        $('#mengetahui_username2').css({'borderColor' : 'silver'});

        $('#mengetahui_departemen3').css({'borderColor' : 'silver'});
        $('#mengetahui_jabatan3').css({'borderColor' : 'silver'});
        $('#mengetahui_username3').css({'borderColor' : 'silver'});

        $('#mengetahui_departemen4').css({'borderColor' : 'silver'});
        $('#mengetahui_jabatan4').css({'borderColor' : 'silver'});
        $('#mengetahui_username4').css({'borderColor' : 'silver'});

        $('#menyetujui_departemen1').css({'borderColor' : 'silver'});
        $('#menyetujui_jabatan1').css({'borderColor' : 'silver'});
        $('#menyetujui_username1').css({'borderColor' : 'silver'});

        $('#menyetujui_departemen2').css({'borderColor' : 'silver'});
        $('#menyetujui_jabatan2').css({'borderColor' : 'silver'});
        $('#menyetujui_username2').css({'borderColor' : 'silver'});

        $('#menyetujui_departemen3').css({'borderColor' : 'silver'});
        $('#menyetujui_jabatan3').css({'borderColor' : 'silver'});
        $('#menyetujui_username3').css({'borderColor' : 'silver'});

        $('#menyetujui_departemen4').css({'borderColor' : 'silver'});
        $('#menyetujui_jabatan4').css({'borderColor' : 'silver'});
        $('#menyetujui_username4').css({'borderColor' : 'silver'});
        // End Di awal semua warna border jadi silver (normal)

        // Validasi Tidak Boleh Ada user sama saat mengetahui & menyetujui
        if(mengetahui1 == mengetahui2 && mengetahui1_dept == mengetahui2_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen1').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan1').css({'borderColor' : 'red'});
          $('#mengetahui_username1').css({'borderColor' : 'red'});
          $('#mengetahui_departemen2').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan2').css({'borderColor' : 'red'});
          $('#mengetahui_username2').css({'borderColor' : 'red'});
          return false;
        }

        if(mengetahui3 != '' && mengetahui1 == mengetahui3 && mengetahui1_dept == mengetahui3_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen1').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan1').css({'borderColor' : 'red'});
          $('#mengetahui_username1').css({'borderColor' : 'red'});
          $('#mengetahui_departemen3').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan3').css({'borderColor' : 'red'});
          $('#mengetahui_username3').css({'borderColor' : 'red'});
          return false;
        }

        if( mengetahui4 != '' && mengetahui1 == mengetahui4 && mengetahui1_dept == mengetahui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen1').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan1').css({'borderColor' : 'red'});
          $('#mengetahui_username1').css({'borderColor' : 'red'});
          $('#mengetahui_departemen4').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan4').css({'borderColor' : 'red'});
          $('#mengetahui_username4').css({'borderColor' : 'red'});
          return false;
        }

        if(mengetahui3 != '' && mengetahui2 == mengetahui3 && mengetahui2_dept == mengetahui3_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen2').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan2').css({'borderColor' : 'red'});
          $('#mengetahui_username2').css({'borderColor' : 'red'});
          $('#mengetahui_departemen3').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan3').css({'borderColor' : 'red'});
          $('#mengetahui_username3').css({'borderColor' : 'red'});
          return false;
        }
            
        if(mengetahui4 != '' && mengetahui2 == mengetahui4 && mengetahui2_dept == mengetahui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen2').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan2').css({'borderColor' : 'red'});
          $('#mengetahui_username2').css({'borderColor' : 'red'});
          $('#mengetahui_departemen4').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan4').css({'borderColor' : 'red'});
          $('#mengetahui_username4').css({'borderColor' : 'red'});
          return false;
        }

        if(mengetahui3 != '' && mengetahui3 == mengetahui4 && mengetahui3_dept == mengetahui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen3').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan3').css({'borderColor' : 'red'});
          $('#mengetahui_username3').css({'borderColor' : 'red'});
          $('#mengetahui_departemen4').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan4').css({'borderColor' : 'red'});
          $('#mengetahui_username4').css({'borderColor' : 'red'});
          return false;
        }
         
        if(menyetujui1 == menyetujui2 && menyetujui1_dept == menyetujui2_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#menyetujui_departemen1').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan1').css({'borderColor' : 'red'});
          $('#menyetujui_username1').css({'borderColor' : 'red'});
          $('#menyetujui_departemen2').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan2').css({'borderColor' : 'red'});
          $('#menyetujui_username2').css({'borderColor' : 'red'});
          return false;
        } 

        if(menyetujui3 != '' && menyetujui1 == menyetujui3 && menyetujui1_dept == menyetujui3_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#menyetujui_departemen1').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan1').css({'borderColor' : 'red'});
          $('#menyetujui_username1').css({'borderColor' : 'red'});
          $('#menyetujui_departemen3').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan3').css({'borderColor' : 'red'});
          $('#menyetujui_username3').css({'borderColor' : 'red'});
          return false;
        }          
            
        if(menyetujui4 != '' && menyetujui1 == menyetujui4 && menyetujui1_dept == menyetujui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#menyetujui_departemen1').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan1').css({'borderColor' : 'red'});
          $('#menyetujui_username1').css({'borderColor' : 'red'});
          $('#menyetujui_departemen4').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan4').css({'borderColor' : 'red'});
          $('#menyetujui_username4').css({'borderColor' : 'red'});
          return false;
        }
             
        if(menyetujui3 != '' && menyetujui2 == menyetujui3 && menyetujui2_dept == menyetujui3_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#menyetujui_departemen2').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan2').css({'borderColor' : 'red'});
          $('#menyetujui_username2').css({'borderColor' : 'red'});
          $('#menyetujui_departemen3').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan3').css({'borderColor' : 'red'});
          $('#menyetujui_username3').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui4 != '' && menyetujui2 == menyetujui4 && menyetujui2_dept == menyetujui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#menyetujui_departemen2').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan2').css({'borderColor' : 'red'});
          $('#menyetujui_username2').css({'borderColor' : 'red'});
          $('#menyetujui_departemen4').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan4').css({'borderColor' : 'red'});
          $('#menyetujui_username4').css({'borderColor' : 'red'});
          return false;
        }
             
        if(menyetujui3 != '' && menyetujui3 == menyetujui4 && menyetujui3_dept == menyetujui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#menyetujui_departemen3').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan3').css({'borderColor' : 'red'});
          $('#menyetujui_username3').css({'borderColor' : 'red'});
          $('#menyetujui_departemen4').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan4').css({'borderColor' : 'red'});
          $('#menyetujui_username4').css({'borderColor' : 'red'});
          return false;
        }
             
        if(mengetahui1 == menyetujui1 && mengetahui1_dept == menyetujui1_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen1').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan1').css({'borderColor' : 'red'});
          $('#mengetahui_username1').css({'borderColor' : 'red'});
          $('#menyetujui_departemen1').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan1').css({'borderColor' : 'red'});
          $('#menyetujui_username1').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui2 != '' && mengetahui1 == menyetujui2 && mengetahui1_dept == menyetujui2_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen1').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan1').css({'borderColor' : 'red'});
          $('#mengetahui_username1').css({'borderColor' : 'red'});
          $('#menyetujui_departemen2').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan2').css({'borderColor' : 'red'});
          $('#menyetujui_username2').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui3 != '' && mengetahui1 == menyetujui3 && mengetahui1_dept == menyetujui3_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen1').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan1').css({'borderColor' : 'red'});
          $('#mengetahui_username1').css({'borderColor' : 'red'});
          $('#menyetujui_departemen3').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan3').css({'borderColor' : 'red'});
          $('#menyetujui_username3').css({'borderColor' : 'red'});
          return false;
        }
          
        if(menyetujui4 != '' && mengetahui1 == menyetujui4 && mengetahui1_dept == menyetujui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen1').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan1').css({'borderColor' : 'red'});
          $('#mengetahui_username1').css({'borderColor' : 'red'});
          $('#menyetujui_departemen4').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan4').css({'borderColor' : 'red'});
          $('#menyetujui_username4').css({'borderColor' : 'red'});
          return false;
        }       
             
        if(mengetahui2 == menyetujui1 && mengetahui2_dept == menyetujui1_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen2').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan2').css({'borderColor' : 'red'});
          $('#mengetahui_username2').css({'borderColor' : 'red'});
          $('#menyetujui_departemen1').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan1').css({'borderColor' : 'red'});
          $('#menyetujui_username1').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui2 != '' && mengetahui2 == menyetujui2 && mengetahui2_dept == menyetujui2_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen2').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan2').css({'borderColor' : 'red'});
          $('#mengetahui_username2').css({'borderColor' : 'red'});
          $('#menyetujui_departemen2').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan2').css({'borderColor' : 'red'});
          $('#menyetujui_username2').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui3 != '' && mengetahui2 == menyetujui3 && mengetahui2_dept == menyetujui3_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen2').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan2').css({'borderColor' : 'red'});
          $('#mengetahui_username2').css({'borderColor' : 'red'});
          $('#menyetujui_departemen3').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan3').css({'borderColor' : 'red'});
          $('#menyetujui_username3').css({'borderColor' : 'red'});
          return false;
        }
        
        if(menyetujui4 != '' && mengetahui2 == menyetujui4 && mengetahui2_dept == menyetujui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen2').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan2').css({'borderColor' : 'red'});
          $('#mengetahui_username2').css({'borderColor' : 'red'});
          $('#menyetujui_departemen4').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan4').css({'borderColor' : 'red'});
          $('#menyetujui_username4').css({'borderColor' : 'red'});
          return false;
        }     
          
        if(mengetahui3 == menyetujui1 && mengetahui3_dept == menyetujui1_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen3').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan3').css({'borderColor' : 'red'});
          $('#mengetahui_username3').css({'borderColor' : 'red'});
          $('#menyetujui_departemen1').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan1').css({'borderColor' : 'red'});
          $('#menyetujui_username1').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui2 != '' && mengetahui3 == menyetujui2 && mengetahui3_dept == menyetujui2_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen3').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan3').css({'borderColor' : 'red'});
          $('#mengetahui_username3').css({'borderColor' : 'red'});
          $('#menyetujui_departemen2').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan2').css({'borderColor' : 'red'});
          $('#menyetujui_username2').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui3 != '' && mengetahui3 == menyetujui3 && mengetahui3_dept == menyetujui3_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen3').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan3').css({'borderColor' : 'red'});
          $('#mengetahui_username3').css({'borderColor' : 'red'});
          $('#menyetujui_departemen3').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan3').css({'borderColor' : 'red'});
          $('#menyetujui_username3').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui4 != '' && mengetahui3 == menyetujui4 && mengetahui3_dept == menyetujui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen3').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan3').css({'borderColor' : 'red'});
          $('#mengetahui_username3').css({'borderColor' : 'red'});
          $('#menyetujui_departemen4').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan4').css({'borderColor' : 'red'});
          $('#menyetujui_username4').css({'borderColor' : 'red'});
          return false;
        }   
        
        if(mengetahui4 == menyetujui1 && mengetahui4_dept == menyetujui1_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen4').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan4').css({'borderColor' : 'red'});
          $('#mengetahui_username4').css({'borderColor' : 'red'});
          $('#menyetujui_departemen1').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan1').css({'borderColor' : 'red'});
          $('#menyetujui_username1').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui2 != '' && mengetahui4 == menyetujui2 && mengetahui4_dept == menyetujui2_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen4').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan4').css({'borderColor' : 'red'});
          $('#mengetahui_username4').css({'borderColor' : 'red'});
          $('#menyetujui_departemen2').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan2').css({'borderColor' : 'red'});
          $('#menyetujui_username2').css({'borderColor' : 'red'});
          return false;
        }
        
        if(menyetujui3 != '' && mengetahui4 == menyetujui3 && mengetahui4_dept == menyetujui3_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen4').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan4').css({'borderColor' : 'red'});
          $('#mengetahui_username4').css({'borderColor' : 'red'});
          $('#menyetujui_departemen3').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan3').css({'borderColor' : 'red'});
          $('#menyetujui_username3').css({'borderColor' : 'red'});
          return false;
        }

        if(menyetujui4 != '' && mengetahui4 == menyetujui4 && mengetahui4_dept == menyetujui4_dept){
          alert('Tidak Boleh Ada User Yang Sama di Mengetahui / Menyetujui !');
          $('#mengetahui_departemen4').css({'borderColor' : 'red'});
          $('#mengetahui_jabatan4').css({'borderColor' : 'red'});
          $('#mengetahui_username4').css({'borderColor' : 'red'});
          $('#menyetujui_departemen4').css({'borderColor' : 'red'});
          $('#menyetujui_jabatan4').css({'borderColor' : 'red'});
          $('#menyetujui_username4').css({'borderColor' : 'red'});
          return false;
        }
        
      // END Validasi Tidak Boleh Ada user sama saat mengetahui & menyetujui

      
      // Validasi User Pengaju Tidak Boleh Mengetahui & Menyetujui
      if(user_pengaju == mengetahui1 || user_pengaju == mengetahui2 || user_pengaju == mengetahui3 || user_pengaju == mengetahui4 ||
          user_pengaju == menyetujui1 || user_pengaju == menyetujui2 || user_pengaju == menyetujui3 || user_pengaju == menyetujui4
      ){
          alert('User Pengaju Tidak Boleh Mengetahui / Menyetujui');
          return false;
      }
      // END Validasi User Pengaju Tidak Boleh Mengetahui & Menyetujui

    });

  });
  </script>