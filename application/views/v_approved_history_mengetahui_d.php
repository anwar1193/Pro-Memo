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
            <h1 class="m-0 text-dark">Detail Memo</h1>
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
    
          <h3 style="text-align: center;">MEMO <?php echo $data_memo['perihal'] ?></h3>

          <!-- <hr style="border-width: 0.5px; width: 100%; border-color: silver; border-style: dashed;"> -->


          <!-- Tabel Isi Detail -->
          <table class="table" style="margin-top:20px">
              <tr>
                  <th width="40%">Nomor Memo</th>
                  <th>:</th>
                  <td><?php echo $data_memo['nomor_memo'] ?></td>
              </tr>

              <tr>
                  <th width="40%">Kepada</th>
                  <th>:</th>
                  <td>
                    <?php  
                        foreach($data_kepada as $row_kepada){
                            echo $row_kepada['kepada'];
                        }
                    ?>
                  </td>
              </tr>

              <tr>
                  <th width="40%">CC</th>
                  <th>:</th>
                  <td>
                    <?php  
                        foreach($data_cc as $row_cc){
                            echo $row_cc['cc'];
                        }
                    ?>
                  </td>
              </tr>

              <tr>
                  <th width="40%">Dari</th>
                  <th>:</th>
                  <td><?php echo $data_memo['bagian'].' - '.$data_memo['cabang'] ?></td>
              </tr>

              <tr>
                  <th width="40%">Tanggal Kirim Memo</th>
                  <th>:</th>
                  <td><?php echo date('d-m-Y', strtotime($data_memo['tanggal'])) ?></td>
              </tr>

              <tr>
                  <th width="40%">Perihal</th>
                  <th>:</th>
                  <td><?php echo $data_memo['perihal'] ?></td>
              </tr>

          </table>
          <!-- / Tabel Isi Detail -->

          <!-- Isi Text-1 -->
          <p style="font-size:18px">
            <?php echo $data_memo['text1']; ?>
          </p>

          <!-- Data Pinjaman Nasabah -->
          <?php if($data_memo['perihal'] == 'PELEPASAN BPKB AYDA'){ ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">DATA PINJAMAN NASABAH</th>
                    </tr>
                    <tr>
                        <th>NO</th>
                        <th>No Pinjaman</th>
                        <th>Nama Nasabah</th>
                        <th>Status Pinjaman</th>
                        <th>Sumber Dana</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $no=1;
                        foreach($data_dapin_pba as $row_dapin_pba){ 
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row_dapin_pba['nomor_pinjaman'] ?></td>
                        <td><?php echo $row_dapin_pba['nama_nasabah'] ?></td>
                        <td><?php echo $row_dapin_pba['status_pinjaman'] ?></td>
                        <td><?php echo $row_dapin_pba['sumber_dana'] ?></td>
                        <td><?php echo $row_dapin_pba['keterangan'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php }elseif($data_memo['perihal'] == 'PELEPASAN BPKB LUNAS'){ ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="8">DATA PINJAMAN NASABAH</th>
                    </tr>
                    <tr>
                        <th>NO</th>
                        <th>No Pinjaman</th>
                        <th>Nama Nasabah</th>
                        <th>Tgl Lunas</th>
                        <th>Sts Lunaas</th>
                        <th>Sts Hold Denda</th>
                        <th>Sumber Dana</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $no=1;
                        foreach($data_dapin_pbl as $row_dapin_pbl){ 
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row_dapin_pbl['nomor_pinjaman'] ?></td>
                        <td><?php echo $row_dapin_pbl['nama_nasabah'] ?></td>
                        <td><?php echo $row_dapin_pbl['tanggal_lunas'] ?></td>
                        <td><?php echo $row_dapin_pbl['status_lunas'] ?></td>
                        <td><?php echo $row_dapin_pbl['status_hold_denda'] ?></td>
                        <td><?php echo $row_dapin_pbl['sumber_dana'] ?></td>
                        <td><?php echo $row_dapin_pbl['keterangan'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php }elseif($data_memo['perihal'] == 'PRIORITAS PELEPASAN BPKB'){ ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="8">DATA PINJAMAN NASABAH</th>
                    </tr>
                    <tr>
                        <th>NO</th>
                        <th>No Pinjaman</th>
                        <th>Nama Nasabah</th>
                        <th>OS Pokok</th>
                        <th>Parameter</th>
                        <th>Sumber Dana</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $no=1;
                        foreach($data_dapin_ppb as $row_dapin_ppb){ 
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row_dapin_ppb['nomor_pinjaman'] ?></td>
                        <td><?php echo $row_dapin_ppb['nama_nasabah'] ?></td>
                        <td><?php echo $row_dapin_ppb['os_pokok'] ?></td>
                        <td><?php echo $row_dapin_ppb['parameter'] ?></td>
                        <td><?php echo $row_dapin_ppb['sumber_dana'] ?></td>
                        <td><?php echo $row_dapin_ppb['keterangan'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php } ?>
            <!-- / Data Pinjaman Nasabah -->

          <!-- Isi Text-2 -->
          <p style="font-size:18px">
            <?php echo $data_memo['text2']; ?>
          </p>


          <!-- Mengetahui - Menyetujui -->
          <div class="row" style="margin-top:80px">
              <div class="col-md-8 offset-md-2">
                  <table class="table table-bordered">
                      <tr>
                          <th class="text-center" width="50%">MENGETAHUI</th>
                          <th class="text-center" width="50%">MENYETUJUI</th>
                      </tr>

                      <tr>
                          <td class="text-center">
                            <?php  
                                foreach($data_mengetahui as $row_mengetahui){
                                    if($row_mengetahui['status'] == 'done'){
                                        echo $row_mengetahui['username_mengetahui'].'&nbsp; <span style="background-color:green; color:white; padding:2px; border-radius:50%"><i class="fa fa-check"></i></span> 

                                        <a href="#" data-toggle="modal" data-target="#modal-note" id="pilih_note"
                                            data-note="'.$row_mengetahui['note_mengetahui'].'"
                                            data-username="'.$row_mengetahui['username_mengetahui'].'"
                                            data-jabatan="'.$row_mengetahui['jabatan_mengetahui'].'"
                                        >
                                        <span style="font-size:22px; color:black"><i class="fa fa-comments"></i></span>
                                        </a> 

                                        <br> ('.$row_mengetahui['jabatan_mengetahui'].' - '.$row_mengetahui['departemen_mengetahui'].')';

                                    }else{
                                        echo $row_mengetahui['username_mengetahui'].'&nbsp; <span style="background-color:blue; color:white; padding:2px; border-radius:50%"><i class="fa fa-clock"></i></span> <br> ('.$row_mengetahui['jabatan_mengetahui'].' - '.$row_mengetahui['departemen_mengetahui'].')';
                                    }

                                    echo '<br><br>';
                                }
                            ?>
                          </td>

                          <td class="text-center">
                            <?php  
                                foreach($data_menyetujui as $row_menyetujui){
                                    if($row_menyetujui['status'] == 'done'){
                                        echo $row_menyetujui['username_menyetujui'].'&nbsp; <span style="background-color:green; color:white; padding:2px; border-radius:50%"><i class="fa fa-check"></i></span> 
                                        
                                        <a href="#" data-toggle="modal" data-target="#modal-note2" id="pilih_note2"
                                            data-note="'.$row_menyetujui['note_menyetujui'].'"
                                            data-username="'.$row_menyetujui['username_menyetujui'].'"
                                            data-jabatan="'.$row_menyetujui['jabatan_menyetujui'].'"
                                        >
                                        <span style="font-size:22px; color:black"><i class="fa fa-comments"></i></span>
                                        </a> 

                                        <br> ('.$row_menyetujui['jabatan_menyetujui'].')';
                                    }else{
                                        echo $row_menyetujui['username_menyetujui'].'&nbsp; <span style="background-color:blue; color:white; padding:2px; border-radius:50%"><i class="fa fa-clock"></i></span> <br> ('.$row_menyetujui['jabatan_menyetujui'].')';
                                    }
                                    
                                    
                                    echo '<br><br>';
                                }
                            ?>
                          </td>
                      </tr>
                  </table>
              </div>
          </div>

          <!-- Note Mengetahui/Menyetujui -->
          <?php if($data_memo['note_mengetahui'] != ''){ ?>
          <p style="margin-top:20px">
              <b>Note Mengetahui/Menyetujui :</b><br>
              "<?php echo $data_memo['note_mengetahui'] ?>"
          </p>
          <?php } ?>

          <!-- Note/Keterangan Simbol -->
          <p>
              <b>Keterangan Simbol :</b>
              <ul>
                  <li>
                      <span style="background-color:blue; color:white; padding:2px; border-radius:50%"><i class="fa fa-clock"></i></span>
                      = Menunggu Approve
                  </li>

                  <li>
                      <span style="background-color:green; color:white; padding:2px; border-radius:50%"><i class="fa fa-check"></i></span>
                      = Approved
                  </li>

                  <li>
                    <span style="font-size:22px; color:black;"><i class="fa fa-comments"></i></span> = Note Approve (Di Klik)
                  </li>
                  
              </ul>
          </p>


          <!-- Tombol-tombol -->
          <div class="text-center" style="margin-top:50px">
            <a href="<?php echo base_url().'approved_history_mengetahui' ?>" class="btn btn-danger">
                <i class="fa fa-backward"></i> Kembali
            </a>
          </div>

  </div>

          </div>

        </div>
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Modal Approve -->
  <div class="modal fade" id="modal-approve">
    <form action="<?php echo base_url().'inbox_mengetahui/approve' ?>" method="post">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Approve Pengajuan?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" name="nomor_memo" value="<?php echo $data_memo['nomor_memo'] ?>" hidden>
            <input type="text" name="status_mengetahui" value="<?php echo $data_memo['status_mengetahui'] ?>" hidden>
            <input type="text" name="username" value="<?php echo $nama_lengkap; ?>" hidden>
            <input type="text" name="departemen" value="<?php echo $departemen; ?>" hidden>

            <div class="form-group">
                <label for="note_approve">Note Approve :</label>
                <textarea name="note_approve" rows="5" class="form-control" required=""></textarea>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-sm">Approve</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </form>
    </div>
  <!-- / Modal Approve -->

  <!-- Modal Note Mengetahui -->
  <div class="modal fade" id="modal-note">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="orang">Note</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="note_approve">Note Approve :</label>
                <span id="note_view"></span>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
  <!-- / Modal Note Mengetahui -->

  <!-- Modal Note Menyetujui -->
  <div class="modal fade" id="modal-note2">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="orang2">Note</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="note_approve">Note Approve :</label>
                <span id="note_view2"></span>
            </div>

        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
  <!-- / Modal Note Menyetujui -->

  <script>
      $(document).ready(function(){

        $(document).on('click', '#pilih_note', function(){

            var note = $(this).data('note');
            var orang = $(this).data('username');
            var jabatan = $(this).data('jabatan');

            $('#note_view').text('"' + note + '"');
            $('#orang').text(orang + ' (' + jabatan + ')');

        });

        $(document).on('click', '#pilih_note2', function(){

            var note = $(this).data('note');
            var orang = $(this).data('username');
            var jabatan = $(this).data('jabatan');

            $('#note_view2').text('"' + note + '"');
            $('#orang2').text(orang + ' (' + jabatan + ')');

        });

    })
  </script>