<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak Memo</title>
	<style>
		.logo{
			position: absolute;
			width: 60px;
			top:-10px;
		}

		.garis{
			border: 0;
			border-style: inset;
			border-top: 1px solid #000;
		}

		table,th,td{
			border-collapse: collapse;
		}
	</style>
</head>
<body>

	<img src="gambar/procar.png" class="logo" alt="">
	<table style="width: 100%">
		<tr>
			<td align="center">
				<span style="line-height: 0.7; font-weight: bold">
					PT PROCAR INTERNATIONAL FINANCE <br>
				</span> <br>
                Jl. Iskandarsyah Raya No. 1A, Melawai
                Kabayoran Baru, Jakarta Selatan – 12160
			</td>
		</tr>
	</table>

	<hr class="garis">

	<p style="text-align: center; font-size: 14px">
		MEMO <?php echo $data_memo['perihal'] ?>
	</p>

	
    <!-- Tabel Isi Detail -->
    <table style="margin-top:20px" width="80%">
              <tr>
                  <th width="40%" style="text-align:left">Nomor Memo</th>
                  <th>:</th>
                  <td><?php echo $data_memo['nomor_memo'] ?></td>
              </tr>

              <tr>
                  <th width="40%" style="text-align:left">Kepada</th>
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
                  <th width="40%" style="text-align:left">CC</th>
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
                  <th width="40%" style="text-align:left">Dari</th>
                  <th>:</th>
                  <td><?php echo $data_memo['bagian'].' - '.$data_memo['cabang'] ?></td>
              </tr>

              <tr>
                  <th width="40%" style="text-align:left">Tanggal Kirim Memo</th>
                  <th>:</th>
                  <td><?php echo date('d-m-Y', strtotime($data_memo['tanggal'])) ?></td>
              </tr>

              <tr>
                  <th width="40%" style="text-align:left">Perihal</th>
                  <th>:</th>
                  <td><?php echo $data_memo['perihal'] ?></td>
              </tr>

          </table>
          <!-- / Tabel Isi Detail -->

          <!-- Isi Text-1 -->
          <br><br>
          <p style="font-size:14px;">
            <?php echo $data_memo['text1']; ?>
          </p>

          <!-- Data Pinjaman Nasabah -->
          <?php if($data_memo['perihal'] == 'PELEPASAN BPKB AYDA'){ ?>

            <table border="1">
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

            <table border="1">
                <thead>
                    <tr>
                        <th colspan="8">DATA PINJAMAN NASABAH</th>
                    </tr>
                    <tr>
                        <th>NO</th>
                        <th>No Pinjaman</th>
                        <th>Nama Nasabah</th>
                        <th width="15%">Tgl Lunas</th>
                        <th>Sts Lunas</th>
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
                        <td style="text-align:center"><?php echo date('d-m-Y', strtotime($row_dapin_pbl['tanggal_lunas'])) ?></td>
                        <td><?php echo $row_dapin_pbl['status_lunas'] ?></td>
                        <td><?php echo $row_dapin_pbl['status_hold_denda'] ?></td>
                        <td><?php echo $row_dapin_pbl['sumber_dana'] ?></td>
                        <td><?php echo $row_dapin_pbl['keterangan'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php }elseif($data_memo['perihal'] == 'PRIORITAS PELEPASAN BPKB'){ ?>

            <table border="1">
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
          <p style="font-size:16px">
            <br>
            <?php echo $data_memo['text2']; ?>
          </p>


          <!-- Mengetahui - Menyetujui -->
          <br><br><br><br>
            <table width="100%">
                <tr>
                    <th style="text-align:center; text-decoration: underline;" width="50%">MENGETAHUI</th>
                    <th style="text-align:center; text-decoration: underline;" width="50%">MENYETUJUI</th>
                </tr>

                <tr>
                    <td style="text-align:center">
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

                    <td style="text-align:center">
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

          <!-- Note Mengetahui/Menyetujui -->
          <?php if($data_memo['note_mengetahui'] != ''){ ?>
          <p style="margin-top:20px">
              <b>Note Mengetahui/Menyetujui :</b><br>
              "<?php echo $data_memo['note_mengetahui'] ?>"
          </p>
          <?php } ?>


</body>
</html>