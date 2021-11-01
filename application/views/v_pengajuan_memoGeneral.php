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
    
    <h3 style="text-align: center;"><?php echo $jenis_memo ?></h3>


      <hr style="border-width: 0.5px; width: 100%; border-color: silver; border-style: dashed;">

      <!-- Form Kirim Laporan (Utama) -->
      <form method="post" enctype="multipart/form-data" action="<?php echo base_url().'buat_laporan/kirim_laporan' ?>">

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
          <table width="100%">
              <tr>
                  <td width="40%">
                  <label for="kepada">Kepada</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="37%">
                      <input type="text" class="form-control" name="kepada" value="<?php echo $data_jenis_memo['jenis_memo_kepada'] ?>">
                  </td>

                  <td width="13%">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                  </td>
              </tr>
          </table>
      </div>
      <!-- / Kepada ...................................................................-->


      <!-- CC .....................................................................-->
      <div class="form-group">
          <table width="100%">
              <tr>
                  <td width="40%">
                  <label for="cc">CC</label>
                  </td>

                  <td width="10%" style="text-align: center;">:</td>

                  <td width="37%">
                      <input type="text" class="form-control" name="cc" value="<?php echo $data_jenis_memo['jenis_memo_cc'] ?>">
                  </td>

                  <td width="13%">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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

      <!-- Isi Memo -->
      <div class="form-group">
            <label for="isi_memo">Isi Memo :</label>
            <textarea class="textarea" name="isi_memo" placeholder="Place some text here"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                <br><br><br><br><br><br><br><br><br>
            </textarea>
      </div>
      <!-- / Isi Memo -->


      <!-- Form Upload -->
      <span style="font-weight: bold; font-size: 18px;">Upload Dokumen</span>
      
      <table class="table table-bordered wy-table-striped" id="tableLoop_dokLPPD">
          <thead>
              <tr>
                  <th>NO</th>
                  <th>Pilih File</th>
                  <th>Jenis File</th>
                  <th class="text-center">
                      <button class="btn btn-primary btn-xs" id="BarisBaru_dokLPPD">
                          <i class="fa fa-plus"></i>
                          <span>Tambah</span>
                      </button>
                  </th>
              </tr>
          </thead>

          <tbody></tbody>
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


      <!-- Mengetahui .....................................................................-->
      <div class="form-group">
        <label for="">Mengetahui</label>
        <table class="table table-bordered">

            <thead>
              <tr>
                <td width="5%">NO</td>
                <td width="25%">Departemen</td>
                <td width="25%">Jabatan</td>
                <td width="25%">Username</td>
                <th class="text-center" width="20%">
                  <button class="btn btn-primary" id="BarisBaru_dokLPPD">
                      <i class="fa fa-plus"></i>
                  </button>
              </th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>

                <td>
                  <select name="departemen_mengetahui" class="form-control">
                    <option value="<?php echo $data_jenis_memo['jenis_memo_mengetahuiDepartemen'] ?>">
                      <?php echo $data_jenis_memo['jenis_memo_mengetahuiDepartemen'] ?>
                    </option>
                  </select>
                </td>

                <td>
                  <select name="jabatan_mengetahui" class="form-control">
                    <option value="<?php echo $data_jenis_memo['jenis_memo_mengetahuiJabatan'] ?>">
                      <?php echo $data_jenis_memo['jenis_memo_mengetahuiJabatan'] ?>
                    </option>
                  </select>
                </td>

                <td>
                  <select name="username_mengetahui" class="form-control">
                    <option value="<?php echo $data_jenis_memo['jenis_memo_mengetahuiUsername'] ?>">
                      <?php echo $data_jenis_memo['jenis_memo_mengetahuiUsername'] ?>
                    </option>
                  </select>
                </td>

                <td style="text-align:center">
                  <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>

              </tr>
            </tbody>

        </table>
      </div>
      <!-- / Mengetahui ...................................................................-->


      <!-- Menyetujui .....................................................................-->
      <div class="form-group">
        <label for="">Menyetujui</label>
        <table class="table table-bordered">

            <thead>
              <tr>
                <td width="5%">NO</td>
                <td width="25%">Departemen</td>
                <td width="25%">Jabatan</td>
                <td width="25%">Username</td>
                <th class="text-center" width="20%">
                  <button class="btn btn-primary" id="BarisBaru_dokLPPD">
                      <i class="fa fa-plus"></i>
                  </button>
              </th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>

                <td>
                  <select name="departemen_menyetujui" class="form-control">
                    <option value="<?php echo $data_jenis_memo['jenis_memo_menyetujuiDepartemen'] ?>">
                      <?php echo $data_jenis_memo['jenis_memo_menyetujuiDepartemen'] ?>
                    </option>
                  </select>
                </td>

                <td>
                  <select name="jabatan_menyetujui" class="form-control">
                    <option value="<?php echo $data_jenis_memo['jenis_memo_menyetujuiJabatan'] ?>">
                      <?php echo $data_jenis_memo['jenis_memo_menyetujuiJabatan'] ?>
                    </option>
                  </select>
                </td>

                <td>
                  <select name="username_menyetujui" class="form-control">
                    <option value="<?php echo $data_jenis_memo['jenis_memo_menyetujuiUsername'] ?>">
                      <?php echo $data_jenis_memo['jenis_memo_menyetujuiUsername'] ?>
                    </option>
                  </select>
                </td>

                <td style="text-align:center">
                  <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            </tbody>

        </table>
      </div>
      <!-- / Menyetujui ...................................................................-->

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
