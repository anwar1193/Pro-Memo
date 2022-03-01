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
            <h1 class="m-0 text-dark">Data Memo (Ditujukan Ke Saya)</h1>
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

      <!-- TAB -->
      <div class="card card-warning card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Memo Final</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Memo On Proccess</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            
            <!-- Tab Memo Final -->
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">

                <form action="<?php echo base_url().'memo_final/index_cari' ?>" method="post">
                  <i class="fa fa-search"></i> Cari Memo :
                  <input type="text" name="nopin" placeholder="Masukkan Nopin" autocomplete="off" required>

                  <select name="jenis_memo" required="">
                    <option value="">-Pilih Jenis Memo-</option>
                    <?php foreach($jenis_memo as $row){ ?>
                    <option value="<?php echo $row['jenis_memo_perihal'] ?>"><?php echo $row['jenis_memo_perihal'] ?></option>
                    <?php } ?>
                  </select>

                  <button class="btn btn-success btn-sm" type="submit">Cari</button>
                </form>

                <br>

                <table id="example1" class="table table-bordered table-striped">
           
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nomor Memo</th>
                    <th>Tanggal Memo</th>
                    <th>Cabang</th>
                    <th>Bagian</th>
                    <th>Perihal</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>

                  <tbody>

                  <?php  
                    $no=1;
                    foreach($data_memo as $row){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nomor_memo']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                    <td><?php echo $row['cabang']; ?></td>
                    <td><?php echo $row['bagian']; ?></td>
                    <td>
                      <?php echo $row['perihal']; ?>
                      <?= $row['perihal'] == 'PELEPASAN BPKB AYDA' ? '/ WO' : NULL; ?>
                    </td>
                    <td class="text-center">
                        <a href="<?php echo base_url().'memo_final/detail/'.$row['id_memo'] ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-eye"></i> Detail Memo
                        </a>
                    </td>
                  </tr>
                  <?php } ?>

                  </tbody>
                  
                </table>
            </div>
            <!-- End Tab Memo Final -->

            <!-- Tab Memo On Proccess -->
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                
                <table id="example1" class="table table-bordered table-striped">
                  
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nomor Memo</th>
                    <th>Tanggal Memo</th>
                    <th>Cabang</th>
                    <th>Bagian</th>
                    <th>Perihal</th>
                    <th>Sts.Mengetahui</th>
                    <th>Sts.Menyetujui</th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>

                  <tbody>

                  <?php  
                    $no=1;
                    foreach($data_memo_proses as $row){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['nomor_memo']; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                    <td><?php echo $row['cabang']; ?></td>
                    <td><?php echo $row['bagian']; ?></td>
                    <td>
                      <?php echo $row['perihal']; ?>
                      <?= $row['perihal'] == 'PELEPASAN BPKB AYDA' ? '/ WO' : NULL; ?>
                    </td>

                    <td class="text-center">
                        <?php if($row['status_mengetahui'] == 0){ ?>
                            <span style="background-color: green; color: white; font-weight: bold; padding: 2px; font-size: 12px; border-radius: 5px; text-transform: capitalize;">
                                Done
                            </span>
                        <?php }elseif($row['status_mengetahui'] == -1){ ?>
                            <span style="background-color: orange; color: white; font-weight: bold; padding: 2px; font-size: 12px; border-radius: 5px; text-transform: capitalize;">
                                Revisi
                            </span>
                        <?php }elseif($row['status_mengetahui'] == -2){ ?>
                            <span style="background-color: red; color: white; font-weight: bold; padding: 2px; font-size: 12px; border-radius: 5px; text-transform: capitalize;">
                                Rejected
                            </span>
                        <?php }else{ ?>
                            <span style="background-color: blue; color: white; font-weight: bold; padding: 2px; font-size: 12px; border-radius: 5px; text-transform: capitalize;">
                                On Proccess
                            </span>
                        <?php } ?>
                    </td>

                    <td class="text-center">
                        <?php if($row['status_mengetahui'] == 0 && $row['status_menyetujui'] == 0){ ?>
                            <span style="background-color: green; color: white; font-weight: bold; padding: 2px; font-size: 12px; border-radius: 5px; text-transform: capitalize;">
                                Done
                            </span>
                        <?php }elseif($row['status_mengetahui'] == 0 && $row['status_menyetujui'] == -1){ ?>
                            <span style="background-color: orange; color: white; font-weight: bold; padding: 2px; font-size: 12px; border-radius: 5px; text-transform: capitalize;">
                                Revisi
                            </span>
                        <?php }elseif($row['status_mengetahui'] == 0 && $row['status_menyetujui'] == -2){ ?>
                            <span style="background-color: red; color: white; font-weight: bold; padding: 2px; font-size: 12px; border-radius: 5px; text-transform: capitalize;">
                                Rejected
                            </span>
                        <?php }elseif($row['status_mengetahui'] == -2 && $row['status_menyetujui'] == 0){ ?>
                            <span style="background-color: gray; color: white; font-weight: bold; padding: 2px; font-size: 12px; border-radius: 5px; text-transform: capitalize;">
                                Cancelled
                            </span>
                        <?php }else{ ?>
                            <span style="background-color: blue; color: white; font-weight: bold; padding: 2px; font-size: 12px; border-radius: 5px; text-transform: capitalize;">
                                On Proccess
                            </span>
                        <?php } ?>
                    </td>

                    <td class="text-center">
                        <a href="<?php echo base_url().'memo_final/detail/'.$row['id_memo'] ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-eye"></i> Detail Memo
                        </a>
                    </td>
                  </tr>
                  <?php } ?>

                  </tbody>
                  
                </table>

            </div>
            <!-- End Tab Memo On Proccess -->

          </div>
        </div>
        <!-- /.card -->
      <!-- / TAB -->
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->