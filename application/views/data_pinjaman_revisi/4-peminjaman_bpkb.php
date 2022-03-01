<!-- Data Pinjaman .....................................................................-->
<div class="data-pinjaman" style="margin-top: 40px;" id="data-pinjaman">
      <span class="judul-pinjaman">Data Pinjaman</span>

      <div style="position: absolute; right: 10px; top: -15px;">
        <button type="button" class="btn btn-success btn-sm" id="tambah_pinjaman">
          <i class="fa fa-plus"></i> Tambah
        </button>

        <button type="button" class="btn btn-danger btn-sm" id="hapus_pinjaman">
          <i class="fa fa-trash"></i> Hapus
        </button>
      </div>  

      <?php foreach($data_dapin_pmb as $row){ ?>
      <table width="100%">
        <tr>
          <td width="20%">
            <div class="form-group">
              <label for="nomor_pinjaman" style="font-weight: normal;">Nomor Pinjaman :</label>
              <input type="text" class="form-control" name="nomor_pinjaman[]" required autocomplete="off" value="<?php echo $row['nomor_pinjaman'] ?>">
            </div>
          </td>

          <td width="20%">
            <div class="form-group">
              <label for="nama_nasabah" style="font-weight: normal;">Nama Nasabah :</label>
              <input type="text" class="form-control" name="nama_nasabah[]" required autocomplete="off" value="<?php echo $row['nama_nasabah'] ?>">
            </div>
          </td>

          <td width="20%">
            <div class="form-group">
              <label for="nomor_polisi" style="font-weight: normal;">Nomor Polisi :</label>
              <input type="text" class="form-control" name="nomor_polisi[]" required autocomplete="off" value="<?php echo $row['nomor_polisi'] ?>">
            </div>
          </td>

          <td width="20%">
            <div class="form-group">
              <label for="nomor_bpkb" style="font-weight: normal;">Nomor BPKB :</label>
              <input type="text" class="form-control" name="nomor_bpkb[]" required autocomplete="off" value="<?php echo $row['nomor_bpkb'] ?>">
            </div>
          </td>

          <td width="20%">
            <div class="form-group">
              <label for="sumber_dana" style="font-weight: normal;">Sumber Dana :</label>
              <input type="text" class="form-control" name="sumber_dana[]" autocomplete="off" readonly value="<?= $row['sumber_dana']=='' ? '(Diisi Reviewer)' : $row['sumber_dana']; ?>">
            </div>
          </td>

        </tr>
      </table>

      <div class="form-group">
        <label for="keperluan">Keperluan :</label>
        <textarea class="form-control" name="keperluan[]" cols="30" rows="5" required><?php echo $row['keperluan'] ?></textarea>
      </div>

      <?php } ?>

    </div>
  <!-- / Data Pinjaman ...................................................................-->

  <script>
    $(document).ready(function(){

      $('#tambah_pinjaman').click(function(){
        $('#data-pinjaman').append(

          `
          <div class="item_pinjaman">
          <hr>
          <table width="100%">
            <tr>
              <td width="20%">
                <div class="form-group">
                  <label for="nomor_pinjaman" style="font-weight: normal;">Nomor Pinjaman :</label>
                  <input type="text" class="form-control" name="nomor_pinjaman[]" required autocomplete="off">
                </div>
              </td>

              <td width="20%">
                <div class="form-group">
                  <label for="nama_nasabah" style="font-weight: normal;">Nama Nasabah :</label>
                  <input type="text" class="form-control" name="nama_nasabah[]" required autocomplete="off">
                </div>
              </td>

              <td width="20%">
                <div class="form-group">
                  <label for="nomor_polisi" style="font-weight: normal;">Nomor Polisi :</label>
                  <input type="text" class="form-control" name="nomor_polisi[]" required autocomplete="off">
                </div>
              </td>

              <td width="20%">
                <div class="form-group">
                  <label for="nomor_bpkb" style="font-weight: normal;">Nomor BPKB :</label>
                  <input type="text" class="form-control" name="nomor_bpkb[]" required autocomplete="off">
                </div>
              </td>

              <td width="20%">
                <div class="form-group">
                  <label for="sumber_dana" style="font-weight: normal;">Sumber Dana :</label>
                  <input type="text" class="form-control" name="sumber_dana[]" autocomplete="off" readonly placeholder="Diisi oleh reviewer">
                </div>
              </td>

            </tr>
          </table>

          <div class="form-group">
            <label for="keperluan">Keperluan :</label>
            <textarea class="form-control" name="keperluan[]" cols="30" rows="5" required></textarea>
          </div>
        </div>
          `
        );
      });

      $('#hapus_pinjaman').click(function(){
        $('.item_pinjaman:last').remove();
      });

    });
  </script>