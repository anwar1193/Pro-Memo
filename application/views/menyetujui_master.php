<!-- Menyetujui .....................................................................-->
<div class="form-group">
<label for="">Menyetujui</label>

<div style="margin-bottom:10px">
    Jumlah Menyetujui :
    <select name="jumlah_menyetujui" id="jumlah_menyetujui">
        <option value="1">1 Orang</option>
        <option value="2">2 Orang</option>
        <option value="3">3 Orang</option>
        <option value="4">4 Orang</option>
    </select> -

    <b>Keterangan : </b> Urutan <b>Level Jabatan</b> Dari Rendah Ke Tinggi
    
</div>

<table class="table table-bordered">

    <thead>
        <tr>
        <td width="5%">NO</td>
        <td width="25%">Departemen</td>
        <td width="25%">Jabatan</td>
        <td width="25%">Username</td>
        <!-- <th class="text-center" width="20%">
            <button class="btn btn-primary" id="BarisBaru_dokLPPD">
                <i class="fa fa-plus"></i>
            </button>
        </th> -->
        </tr>
    </thead>

    <tbody>
        <!-- Menyetujui 1 -->
        <tr id="menyetujui1">
        <td>1</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_menyetujui[]" value="" class="form-control" required id="menyetujui_departemen1" readonly style="background-color:white">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat ganti-menyetujui" type="button" data-toggle="modal" data-target="#modal-menyetujui1">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_menyetujui[]" value="" id="menyetujui_jabatan1" readonly style="background-color:white">

            <span id="level_menyetujui1_v" class="text-success"></span>
        </td>

        <td>
            <input type="text" class="form-control" name="username_menyetujui[]" value="" id="menyetujui_username1" readonly style="background-color:white">
            <input type="text" name="urutan_menyetujui[]" value="1" hidden>

            <input type="text" id="level_menyetujui1" value="" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Menyetujui 1............................................................................................ -->


        <!-- Menyetujui 2 -->
        <tr id="menyetujui2">
        <td>2</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_menyetujui[]" class="form-control" id="menyetujui_departemen2" readonly style="background-color:white">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat ganti-menyetujui" type="button" data-toggle="modal" data-target="#modal-menyetujui2">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_menyetujui[]" id="menyetujui_jabatan2" readonly style="background-color:white">
            <span id="level_menyetujui2_v" class="text-success"></span>
        </td>

        <td>
            <input type="text" class="form-control" name="username_menyetujui[]" id="menyetujui_username2" readonly style="background-color:white">
            <input type="text" name="urutan_menyetujui[]" value="2" hidden>
            <input type="text" id="level_menyetujui2" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Menyetujui 2 ......................................................................................... -->


        <!-- Menyetujui 3 -->
        <tr id="menyetujui3">
        <td>3</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_menyetujui[]" class="form-control" id="menyetujui_departemen3" readonly style="background-color:white">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat ganti-menyetujui" type="button" data-toggle="modal" data-target="#modal-menyetujui3">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_menyetujui[]" id="menyetujui_jabatan3" readonly style="background-color:white">
            <span id="level_menyetujui3_v" class="text-success"></span>
        </td>

        <td>
            <input type="text" class="form-control" name="username_menyetujui[]" id="menyetujui_username3" readonly style="background-color:white">
            <input type="text" name="urutan_menyetujui[]" value="3" hidden>
            <input type="text" id="level_menyetujui3" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Menyetujui 3 ......................................................................................... -->


        <!-- Menyetujui 4 -->
        <tr id="menyetujui4">
        <td>4</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_menyetujui[]" class="form-control" id="menyetujui_departemen4" readonly style="background-color:white">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat ganti-menyetujui" type="button" data-toggle="modal" data-target="#modal-menyetujui4">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_menyetujui[]" id="menyetujui_jabatan4" readonly style="background-color:white">
            <span id="level_menyetujui4_v" class="text-success"></span>
        </td>

        <td>
            <input type="text" class="form-control" name="username_menyetujui[]" id="menyetujui_username4" readonly style="background-color:white">
            <input type="text" name="urutan_menyetujui[]" value="4" hidden>

            <input type="text" id="level_menyetujui4" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Menyetujui 4 ......................................................................................... -->

    </tbody>

</table>
</div>
<!-- / Menyetujui ...................................................................-->



<!-- Modal Menyetujui 1 -->
<div class="modal fade" id="modal-menyetujui1">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Pilih Menyetujui</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Cabang</th>
                <th>Level</th>
                <th>Nama Lengkap</th>
                <th>Pilih</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no=1;
                foreach($data_user as $row_user){ 
                    $level_nama = $row_user['level'] ;
                    $data_level_nilai = $this->M_master->tampil_where('tbl_level', array('level' => $level_nama))->row_array();
                    $level_angka = $data_level_nilai['level_nilai'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row_user['departemen'] ?></td>
                <td><?php echo $row_user['level'] ?></td>
                <td><?php echo $row_user['cabang'] ?></td>
                <td class="text-center"><?php echo $level_angka ?></td>
                <td><?php echo $row_user['nama_lengkap'] ?></td>
                <td>
                    <button class="btn btn-info btn-xs" id="pilih-menyetujui1" type="button"
                    data-departemen="<?php echo $row_user['departemen'] ?>"
                    data-level="<?php echo $row_user['level'] ?>"
                    data-nama_lengkap="<?php echo $row_user['nama_lengkap'] ?>"
                    data-level_nilai="<?php echo $row_user['level_nilai'] ?>"
                >
                        <i class="fa fa-check"></i> Pilih
                    </button>
                </td>
            </tr>
            <?php } ?>
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
<!-- /.modal Menyetujui 1 -->

<!-- Modal Menyetujui 2 -->
<div class="modal fade" id="modal-menyetujui2">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Pilih Menyetujui</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Cabang</th>
                <th>Level</th>
                <th>Nama Lengkap</th>
                <th>Pilih</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no=1;
                foreach($data_user as $row_user){ 
                    $level_nama = $row_user['level'] ;
                    $data_level_nilai = $this->M_master->tampil_where('tbl_level', array('level' => $level_nama))->row_array();
                    $level_angka = $data_level_nilai['level_nilai'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row_user['departemen'] ?></td>
                <td><?php echo $row_user['level'] ?></td>
                <td><?php echo $row_user['cabang'] ?></td>
                <td class="text-center"><?php echo $level_angka ?></td>
                <td><?php echo $row_user['nama_lengkap'] ?></td>
                <td>
                    <button class="btn btn-info btn-xs" id="pilih-menyetujui2" type="button"
                    data-departemen="<?php echo $row_user['departemen'] ?>"
                    data-level="<?php echo $row_user['level'] ?>"
                    data-nama_lengkap="<?php echo $row_user['nama_lengkap'] ?>"
                    data-level_nilai="<?php echo $row_user['level_nilai'] ?>"
                >
                        <i class="fa fa-check"></i> Pilih
                    </button>
                </td>
            </tr>
            <?php } ?>
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
<!-- /.modal Menyetujui 2 -->


<!-- Modal Menyetujui 3 -->
<div class="modal fade" id="modal-menyetujui3">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Pilih Menyetujui</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Cabang</th>
                <th>Level</th>
                <th>Nama Lengkap</th>
                <th>Pilih</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no=1;
                foreach($data_user as $row_user){ 
                    $level_nama = $row_user['level'] ;
                    $data_level_nilai = $this->M_master->tampil_where('tbl_level', array('level' => $level_nama))->row_array();
                    $level_angka = $data_level_nilai['level_nilai'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row_user['departemen'] ?></td>
                <td><?php echo $row_user['level'] ?></td>
                <td><?php echo $row_user['cabang'] ?></td>
                <td class="text-center"><?php echo $level_angka ?></td>
                <td><?php echo $row_user['nama_lengkap'] ?></td>
                <td>
                    <button class="btn btn-info btn-xs" id="pilih-menyetujui3" type="button"
                    data-departemen="<?php echo $row_user['departemen'] ?>"
                    data-level="<?php echo $row_user['level'] ?>"
                    data-nama_lengkap="<?php echo $row_user['nama_lengkap'] ?>"
                    data-level_nilai="<?php echo $row_user['level_nilai'] ?>"
                >
                        <i class="fa fa-check"></i> Pilih
                    </button>
                </td>
            </tr>
            <?php } ?>
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
<!-- /.modal Menyetujui 3 -->


<!-- Modal Menyetujui 4 -->
<div class="modal fade" id="modal-menyetujui4">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Pilih Menyetujui</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th>Cabang</th>
                <th>Level</th>
                <th>Nama Lengkap</th>
                <th>Pilih</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no=1;
                foreach($data_user as $row_user){ 
                    $level_nama = $row_user['level'] ;
                    $data_level_nilai = $this->M_master->tampil_where('tbl_level', array('level' => $level_nama))->row_array();
                    $level_angka = $data_level_nilai['level_nilai'];
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row_user['departemen'] ?></td>
                <td><?php echo $row_user['level'] ?></td>
                <td><?php echo $row_user['cabang'] ?></td>
                <td class="text-center"><?php echo $level_angka ?></td>
                <td><?php echo $row_user['nama_lengkap'] ?></td>
                <td>
                    <button class="btn btn-info btn-xs" id="pilih-menyetujui4" type="button"
                    data-departemen="<?php echo $row_user['departemen'] ?>"
                    data-level="<?php echo $row_user['level'] ?>"
                    data-nama_lengkap="<?php echo $row_user['nama_lengkap'] ?>"
                    data-level_nilai="<?php echo $row_user['level_nilai'] ?>"
                >
                        <i class="fa fa-check"></i> Pilih
                    </button>
                </td>
            </tr>
            <?php } ?>
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
<!-- /.modal Menyetujui 4 -->


<script>
$(document).ready(function(){

    $('#menyetujui2').hide();
    $('#menyetujui3').hide();
    $('#menyetujui4').hide();

    // Script Pilihan Jumlah Menyetujui
    $(document).on('change', '#jumlah_menyetujui', function(){
        let jumlah_menyetujui = $(this).val();

        if(jumlah_menyetujui == 1){
            $('#menyetujui2').hide();
            $('#menyetujui3').hide();
            $('#menyetujui4').hide();
        }else if(jumlah_menyetujui == 2){
            $('#menyetujui2').show();
            $('#menyetujui3').hide();
            $('#menyetujui4').hide();
        }else if(jumlah_menyetujui == 3){
            $('#menyetujui2').show();
            $('#menyetujui3').show();
            $('#menyetujui4').hide();
        }else if(jumlah_menyetujui == 4){
            $('#menyetujui2').show();
            $('#menyetujui3').show();
            $('#menyetujui4').show();
        }
    });
    // Penutup Script Pilihan Jumlah Menyetujui

    // Script Modal Menyetujui
    $(document).on('click','#pilih-menyetujui1', function(){
        let departemen1 = $(this).data('departemen');
        let jabatan1 = $(this).data('level');
        let nama_lengkap1 = $(this).data('nama_lengkap');
        let level_nilai1 = $(this).data('level_nilai');

        $('#menyetujui_departemen1').val(departemen1).css({'borderColor' : 'silver'});
        $('#menyetujui_jabatan1').val(jabatan1).css({'borderColor' : 'silver'});
        $('#menyetujui_username1').val(nama_lengkap1).css({'borderColor' : 'silver'});
        $('#level_menyetujui1').val(level_nilai1).css({'borderColor' : 'silver'});

        $('#level_menyetujui1_v').text('Level Jabatan : ' + level_nilai1);

        $('#modal-menyetujui1').modal('hide');
    });

    $(document).on('click','#pilih-menyetujui2', function(){
        let departemen2 = $(this).data('departemen');
        let jabatan2 = $(this).data('level');
        let nama_lengkap2 = $(this).data('nama_lengkap');
        let level_nilai2 = $(this).data('level_nilai');

        $('#menyetujui_departemen2').val(departemen2).css({'borderColor' : 'silver'});
        $('#menyetujui_jabatan2').val(jabatan2).css({'borderColor' : 'silver'});
        $('#menyetujui_username2').val(nama_lengkap2).css({'borderColor' : 'silver'});
        $('#level_menyetujui2').val(level_nilai2).css({'borderColor' : 'silver'});

        $('#level_menyetujui2_v').text('Level Jabatan : ' + level_nilai2);

        $('#modal-menyetujui2').modal('hide');
    });

    $(document).on('click','#pilih-menyetujui3', function(){
        let departemen3 = $(this).data('departemen');
        let jabatan3 = $(this).data('level');
        let nama_lengkap3 = $(this).data('nama_lengkap');
        let level_nilai3 = $(this).data('level_nilai');

        $('#menyetujui_departemen3').val(departemen3).css({'borderColor' : 'silver'});
        $('#menyetujui_jabatan3').val(jabatan3).css({'borderColor' : 'silver'});
        $('#menyetujui_username3').val(nama_lengkap3).css({'borderColor' : 'silver'});
        $('#level_menyetujui3').val(level_nilai3).css({'borderColor' : 'silver'});

        $('#level_menyetujui3_v').text('Level Jabatan : ' + level_nilai3);

        $('#modal-menyetujui3').modal('hide');
    });

    $(document).on('click','#pilih-menyetujui4', function(){
        let departemen4 = $(this).data('departemen');
        let jabatan4 = $(this).data('level');
        let nama_lengkap4 = $(this).data('nama_lengkap');
        let level_nilai4 = $(this).data('level_nilai');

        $('#menyetujui_departemen4').val(departemen4).css({'borderColor' : 'silver'});
        $('#menyetujui_jabatan4').val(jabatan4).css({'borderColor' : 'silver'});
        $('#menyetujui_username4').val(nama_lengkap4).css({'borderColor' : 'silver'});
        $('#level_menyetujui4').val(level_nilai4).css({'borderColor' : 'silver'});

        $('#level_menyetujui4_v').text('Level Jabatan : ' + level_nilai4);

        $('#modal-menyetujui4').modal('hide');
    });

    // Penutup Script Modal Menyetujui

});
</script>