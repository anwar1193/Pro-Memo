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

        <table width="100%">
          <tr>
            <td width="16%">
              <div class="form-group">
                <label for="nomor_pinjaman" style="font-weight: normal;">No Pinjaman :</label>
                <input type="text" class="form-control" name="nomor_pinjaman[]" required>
              </div>
            </td>

            <td width="16%">
              <div class="form-group">
                <label for="nama_nasabah" style="font-weight: normal;">Nama Nasabah :</label>
                <input type="text" class="form-control" name="nama_nasabah[]" required>
              </div>
            </td>

            <td width="16%">
              <div class="form-group">
                <label for="tanggal_lunas" style="font-weight: normal;">Tanggal Lunas :</label>
                <input type="date" class="form-control" name="tanggal_lunas[]" required>
              </div>
            </td>

            <td width="16%">
              <div class="form-group">
                <label for="status_lunas" style="font-weight: normal;">Status Lunas :</label>
                <select name="status_lunas[]" class="form-control">
                  <option value="Lunas Reguler">Lunas Reguler</option>
                  <option value="Lunas ET">Lunas ET</option>
                  <option value="Set Off">Set Off</option>
                </select>
              </div>
            </td>

            <td width="16%">
              <div class="form-group">
                <label for="status_hold_denda" style="font-weight: normal;">Sts Hold Denda :</label>
                <select name="status_hold_denda[]" class="form-control">
                  <option value="Lunas">Lunas</option>
                  <option value="Belum Lunas">Belum Lunas</option>
                </select>
              </div>
            </td>

            <td width="20%">
              <div class="form-group">
                <label for="sumber_dana" style="font-weight: normal;">Sumber Dana :</label>
                <input type="text" name="sumber_dana[]" class="form-control" readonly placeholder="Diisi oleh reviewer">
              </div>
            </td>

          </tr>
        </table>

        <div class="form-group">
          <label for="keterangan">Keterangan :</label>
          <textarea class="form-control" name="keterangan[]" cols="30" rows="5" required></textarea>
        </div>

      </div>
    <!-- / Data Pinjaman ...................................................................-->

    <script>
    $(document).ready(function(){

      $('#tambah_pinjaman').click(function(){
        $('#data-pinjaman').append('<div class="item_pinjaman"><hr><table width="100%"><tr><td width="16%"><div class="form-group"><label for="nomor_pinjaman" style="font-weight: normal;">No Pinjaman :</label><input type="text" class="form-control" name="nomor_pinjaman[]"></div></td><td width="16%"><div class="form-group"><label for="nama_nasabah" style="font-weight: normal;">Nama Nasabah :</label><input type="text" class="form-control" name="nama_nasabah[]"></div></td><td width="16%"><div class="form-group"><label for="tanggal_lunas" style="font-weight: normal;">Tanggal Lunas :</label><input type="date" class="form-control" name="tanggal_lunas[]"></div></td><td width="16%"><div class="form-group"><label for="status_lunas" style="font-weight: normal;">Status Lunas :</label><select name="status_lunas[]" class="form-control"><option value="Lunas Reguler">Lunas Reguler</option><option value="Lunas ET">Lunas ET</option><option value="Set Off">Set Off</option></select></div></td><td width="16%"><div class="form-group"><label for="status_hold_denda" style="font-weight: normal;">Sts Hold Denda :</label><select name="status_hold_denda[]" class="form-control"><option value="Lunas">Lunas</option><option value="Belum Lunas">Belum Lunas</option></select></div></td><td width="20%"><div class="form-group"><label for="sumber_dana" style="font-weight: normal;">Sumber Dana :</label><input type="text" name="sumber_dana[]" class="form-control" readonly placeholder="Diisi oleh reviewer"></div></td></tr></table><div class="form-group"><label for="keterangan">Keterangan :</label><textarea class="form-control" name="keterangan[]" cols="30" rows="5"></textarea></div></div>');
      });

      $('#hapus_pinjaman').click(function(){
        $('.item_pinjaman:last').remove();
      });

    });
  </script>