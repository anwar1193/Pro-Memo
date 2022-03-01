<!-- Mengetahui .....................................................................-->
<div class="form-group">
<label for="">Mengetahui</label>

<!-- Mengetahui jika yang ajukan KANTOR PUSAT -->
<div style="margin-bottom:10px">
    Jumlah Mengetahui :
    <select name="jumlah_mengetahui" id="jumlah_mengetahui">
        <option value="<?php echo $jumlah_mengetahui ?>">
            <?php echo $jumlah_mengetahui ?> Orang
        </option>
        <option value="1">1 Orang</option>
        <option value="2">2 Orang</option>
        <option value="3">3 Orang</option>
        <option value="4">4 Orang</option>
    </select>
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
        <!-- Mengetahui n -->
        <?php 
            foreach($data_mengetahui as $row){
        ?>
        <tr id="mengetahui<?php echo $row['urutan_mengetahui'] ?>">
        <td><?php echo $row['urutan_mengetahui'] ?></td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" value="<?php echo $row['departemen_mengetahui'] ?>" class="form-control" required id="mengetahui_departemen<?php echo $row['urutan_mengetahui'] ?>" readonly style="background-color:white">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui<?php echo $row['urutan_mengetahui'] ?>">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" value="<?php echo $row['jabatan_mengetahui'] ?>" id="mengetahui_jabatan<?php echo $row['urutan_mengetahui'] ?>" readonly style="background-color:white">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" value="<?php echo $row['username_mengetahui'] ?>" id="mengetahui_username<?php echo $row['urutan_mengetahui'] ?>" readonly style="background-color:white">

            <input type="text" name="urutan_mengetahui[]" value="<?php echo $row['urutan_mengetahui'] ?>" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <?php } ?>
        <!-- / Mengetahui n............................................................................................ -->


        <!-- Mengetahui n+1 -->
        <tr id="mengetahui<?php echo $jumlah_mengetahui+1 ?>">
        <td><?php echo $jumlah_mengetahui+1 ?></td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" class="form-control" id="mengetahui_departemen<?php echo $jumlah_mengetahui+1 ?>" readonly style="background-color:white">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui<?php echo $jumlah_mengetahui+1 ?>">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" id="mengetahui_jabatan<?php echo $jumlah_mengetahui+1 ?>" readonly style="background-color:white">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" id="mengetahui_username<?php echo $jumlah_mengetahui+1 ?>" readonly style="background-color:white">
            <input type="text" name="urutan_mengetahui[]" value="<?php echo $jumlah_mengetahui+1 ?>" hidden>
        </td>

        

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui n+1 ......................................................................................... -->


        <!-- Mengetahui n+2 -->
        <tr id="mengetahui<?php echo $jumlah_mengetahui+2 ?>">
        <td><?php echo $jumlah_mengetahui+2 ?></td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" class="form-control" id="mengetahui_departemen<?php echo $jumlah_mengetahui+2 ?>" readonly style="background-color:white">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui<?php echo $jumlah_mengetahui+2 ?>">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" id="mengetahui_jabatan<?php echo $jumlah_mengetahui+2 ?>" readonly style="background-color:white">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" id="mengetahui_username<?php echo $jumlah_mengetahui+2 ?>" readonly style="background-color:white">
            <input type="text" name="urutan_mengetahui[]" value="<?php echo $jumlah_mengetahui+2 ?>" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui n+2 ......................................................................................... -->


        <!-- Mengetahui n+3 -->
        <tr id="mengetahui<?php echo $jumlah_mengetahui+3 ?>">
        <td><?php echo $jumlah_mengetahui+3 ?></td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" class="form-control" id="mengetahui_departemen<?php echo $jumlah_mengetahui+3 ?>" readonly style="background-color:white">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui<?php echo $jumlah_mengetahui+3 ?>">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" id="mengetahui_jabatan<?php echo $jumlah_mengetahui+3 ?>" readonly style="background-color:white">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" id="mengetahui_username<?php echo $jumlah_mengetahui+3 ?>" readonly style="background-color:white">
            <input type="text" name="urutan_mengetahui[]" value="<?php echo $jumlah_mengetahui+3 ?>" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui n+3 ......................................................................................... -->

    </tbody>

</table>
<!-- / Mengetahui jika yang ajukan KANTOR PUSAT -->

</div>
<!-- / Mengetahui ...................................................................-->



<!-- Modal Mengetahui 1 -->
<div class="modal fade" id="modal-mengetahui1">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Pilih Mengetahui</h4>
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
                    <button class="btn btn-info btn-xs" id="pilih-mengetahui1" type="button"
                    data-departemen="<?php echo $row_user['departemen'] ?>"
                    data-level="<?php echo $row_user['level'] ?>"
                    data-nama_lengkap="<?php echo $row_user['nama_lengkap'] ?>"
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
<!-- /.modal Mengetahui 1 -->

<!-- Modal Mengetahui 2 -->
<div class="modal fade" id="modal-mengetahui2">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Pilih Mengetahui</h4>
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
                <td class="text-center"><?php echo $level_angka; ?></td>
                <td><?php echo $row_user['nama_lengkap'] ?></td>
                <td>
                    <button class="btn btn-info btn-xs" id="pilih-mengetahui2" type="button"
                    data-departemen="<?php echo $row_user['departemen'] ?>"
                    data-level="<?php echo $row_user['level'] ?>"
                    data-nama_lengkap="<?php echo $row_user['nama_lengkap'] ?>"
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
<!-- /.modal Mengetahui 2 -->


<!-- Modal Mengetahui 3 -->
<div class="modal fade" id="modal-mengetahui3">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Pilih Mengetahui</h4>
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
                <td class="text-center"><?php echo $level_angka; ?></td>
                <td><?php echo $row_user['nama_lengkap'] ?></td>
                <td>
                    <button class="btn btn-info btn-xs" id="pilih-mengetahui3" type="button"
                    data-departemen="<?php echo $row_user['departemen'] ?>"
                    data-level="<?php echo $row_user['level'] ?>"
                    data-nama_lengkap="<?php echo $row_user['nama_lengkap'] ?>"
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
<!-- /.modal Mengetahui 3 -->


<!-- Modal Mengetahui 4 -->
<div class="modal fade" id="modal-mengetahui4">
<div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Pilih Mengetahui</h4>
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
                <td><?php echo $level_angka ?></td>
                <td><?php echo $row_user['nama_lengkap'] ?></td>
                <td>
                    <button class="btn btn-info btn-xs" id="pilih-mengetahui4" type="button"
                    data-departemen="<?php echo $row_user['departemen'] ?>"
                    data-level="<?php echo $row_user['level'] ?>"
                    data-nama_lengkap="<?php echo $row_user['nama_lengkap'] ?>"
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
<!-- /.modal Mengetahui 4 -->


<!-- Pengaturan default yang tampil -->
<script>
    $(document).ready(function(){
        $('#mengetahui<?php echo $jumlah_mengetahui+1 ?>').hide();
        $('#mengetahui<?php echo $jumlah_mengetahui+2 ?>').hide();
        $('#mengetahui<?php echo $jumlah_mengetahui+3 ?>').hide();
    });
</script>

<script>
$(document).ready(function(){

    // Script Pilihan Jumlah Mengetahui
    $(document).on('change', '#jumlah_mengetahui', function(){
        let jumlah_mengetahui = $(this).val();

        if(jumlah_mengetahui == 1){
            $('#mengetahui2').hide();
            $('#mengetahui3').hide();
            $('#mengetahui4').hide();
        }else if(jumlah_mengetahui == 2){
            $('#mengetahui2').show();
            $('#mengetahui3').hide();
            $('#mengetahui4').hide();
        }else if(jumlah_mengetahui == 3){
            $('#mengetahui2').show();
            $('#mengetahui3').show();
            $('#mengetahui4').hide();
        }else if(jumlah_mengetahui == 4){
            $('#mengetahui2').show();
            $('#mengetahui3').show();
            $('#mengetahui4').show();
        }
    });
    // Penutup Script Pilihan Jumlah Mengetahui

    // Script Modal Mengetahui
    $(document).on('click','#pilih-mengetahui1', function(){
        let departemen1 = $(this).data('departemen');
        let jabatan1 = $(this).data('level');
        let nama_lengkap1 = $(this).data('nama_lengkap');

        $('#mengetahui_departemen1').val(departemen1).css({'borderColor' : 'silver'});
        $('#mengetahui_jabatan1').val(jabatan1).css({'borderColor' : 'silver'});
        $('#mengetahui_username1').val(nama_lengkap1).css({'borderColor' : 'silver'});

        $('#modal-mengetahui1').modal('hide');
    });

    $(document).on('click','#pilih-mengetahui2', function(){
        let departemen2 = $(this).data('departemen');
        let jabatan2 = $(this).data('level');
        let nama_lengkap2 = $(this).data('nama_lengkap');

        $('#mengetahui_departemen2').val(departemen2).css({'borderColor' : 'silver'});
        $('#mengetahui_jabatan2').val(jabatan2).css({'borderColor' : 'silver'});
        $('#mengetahui_username2').val(nama_lengkap2).css({'borderColor' : 'silver'});

        $('#modal-mengetahui2').modal('hide');
    });

    $(document).on('click','#pilih-mengetahui3', function(){
        let departemen3 = $(this).data('departemen');
        let jabatan3 = $(this).data('level');
        let nama_lengkap3 = $(this).data('nama_lengkap');

        $('#mengetahui_departemen3').val(departemen3).css({'borderColor' : 'silver'});
        $('#mengetahui_jabatan3').val(jabatan3).css({'borderColor' : 'silver'});
        $('#mengetahui_username3').val(nama_lengkap3).css({'borderColor' : 'silver'});

        $('#modal-mengetahui3').modal('hide');
    });

    $(document).on('click','#pilih-mengetahui4', function(){
        let departemen4 = $(this).data('departemen');
        let jabatan4 = $(this).data('level');
        let nama_lengkap4 = $(this).data('nama_lengkap');

        $('#mengetahui_departemen4').val(departemen4).css({'borderColor' : 'silver'});
        $('#mengetahui_jabatan4').val(jabatan4).css({'borderColor' : 'silver'});
        $('#mengetahui_username4').val(nama_lengkap4).css({'borderColor' : 'silver'});

        $('#modal-mengetahui4').modal('hide');
    });

    // Penutup Script Modal Mengetahui

});
</script>