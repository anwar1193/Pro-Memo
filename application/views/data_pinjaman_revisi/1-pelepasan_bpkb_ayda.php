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

      <?php foreach($data_dapin_pba as $row){ ?>
      <table width="100%">
        
        <tr>
          <td width="25%">
            <div class="form-group">
              <label for="nomor_pinjaman" style="font-weight: normal;">Nomor Pinjaman :</label>
              <input type="text" class="form-control" name="nomor_pinjaman[]" value="<?php echo $row['nomor_pinjaman'] ?>">
            </div>
          </td>

          <td width="25%">
            <div class="form-group">
              <label for="nama_nasabah" style="font-weight: normal;">Nama Nasabah :</label>
              <input type="text" class="form-control" name="nama_nasabah[]" value="<?php echo $row['nama_nasabah'] ?>">
            </div>
          </td>

          <td width="25%">
            <div class="form-group">
              <label for="nomor_pinjaman" style="font-weight: normal;">Status Pinjaman :</label>
              <select name="status_pinjaman[]" class="form-control">
                <option value="<?php echo $row['status_pinjaman'] ?>"><?php echo $row['status_pinjaman'] ?></option>
                <option value="AYDA">AYDA</option>
                <option value="WO">WO</option>
              </select>
            </div>
          </td>

          <td width="25%">
            <div class="form-group">
              <label for="sumber_dana" style="font-weight: normal;">Sumber Dana :</label>
              <input type="text" name="sumber_dana[]" class="form-control" value="<?php echo $row['sumber_dana'] ?>">
            </div>
          </td>

        </tr>
      </table>

      <div class="form-group">
        <label for="keterangan">Keterangan :</label>
        <textarea class="form-control" name="keterangan[]" cols="30" rows="5"><?php echo $row['keterangan'] ?></textarea>
      </div>
      <?php } ?>

    </div>
  <!-- / Data Pinjaman ...................................................................-->

  <script>
    $(document).ready(function(){

      $('#tambah_pinjaman').click(function(){
        $('#data-pinjaman').append('<div class="item_pinjaman"><hr><table width="100%"><tr><td width="25%"><div class="form-group"><label for="nomor_pinjaman" style="font-weight: normal;">Nomor Pinjaman :</label><input type="text" class="form-control" name="nomor_pinjaman[]"></div></td><td width="25%"><div class="form-group"><label for="nama_nasabah" style="font-weight: normal;">Nama Nasabah :</label><input type="text" class="form-control" name="nama_nasabah[]"></div></td><td width="25%"><div class="form-group"><label for="nomor_pinjaman" style="font-weight: normal;">Status Pinjaman :</label><select name="status_pinjaman[]" class="form-control"><option value="AYDA">AYDA</option><option value="WO">WO</option></select></div></td><td width="25%"><div class="form-group"><label for="sumber_dana" style="font-weight: normal;">Sumber Dana :</label><input type="text" name="sumber_dana[]" class="form-control"></div></td></tr></table><div class="form-group"><label for="keterangan">Keterangan :</label><textarea class="form-control" name="keterangan[]" cols="30" rows="5"></textarea></div></div>');
      });

      $('#hapus_pinjaman').click(function(){
        $('.item_pinjaman:last').remove();
      });

    });
  </script>