<!-- Mengetahui .....................................................................-->
<div class="form-group">
<label for="">Mengetahui</label>

<!-- Mengetahui jika yang ajukan KANTOR PUSAT -->
<?php if($cabang == 'HEAD OFFICE'){ ?>

<div style="margin-bottom:10px">
    Jumlah Mengetahui :
    <select name="jumlah_mengetahui" id="jumlah_mengetahui">
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
        <!-- Mengetahui 1 -->
        <tr id="mengetahui1">
        <td>1</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" value="<?php echo $data_jenis_memo['jenis_memo_mengetahuiDepartemen'] ?>" class="form-control" required id="mengetahui_departemen1">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui1">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" value="<?php echo $data_jenis_memo['jenis_memo_mengetahuiJabatan'] ?>" id="mengetahui_jabatan1">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" value="<?php echo $data_jenis_memo['jenis_memo_mengetahuiUsername'] ?>" id="mengetahui_username1">

            <input type="text" name="urutan_mengetahui[]" value="1" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui 1............................................................................................ -->


        <!-- Mengetahui 2 -->
        <tr id="mengetahui2">
        <td>2</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" class="form-control" id="mengetahui_departemen2">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui2">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" id="mengetahui_jabatan2">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" id="mengetahui_username2">
            <input type="text" name="urutan_mengetahui[]" value="2" hidden>
        </td>

        

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui 2 ......................................................................................... -->


        <!-- Mengetahui 3 -->
        <tr id="mengetahui3">
        <td>3</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" class="form-control" id="mengetahui_departemen3">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui3">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" id="mengetahui_jabatan3">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" id="mengetahui_username3">
            <input type="text" name="urutan_mengetahui[]" value="3" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui 3 ......................................................................................... -->


        <!-- Mengetahui 4 -->
        <tr id="mengetahui4">
        <td>4</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" class="form-control" id="mengetahui_departemen4">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui4">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" id="mengetahui_jabatan4">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" id="mengetahui_username4">
            <input type="text" name="urutan_mengetahui[]" value="4" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui 4 ......................................................................................... -->

    </tbody>

</table>
<?php }else{ ?>
<!-- / Mengetahui jika yang ajukan KANTOR PUSAT -->


<!-- Mengetahui jika yang ajukan KANTOR CABANG -->
<div style="margin-bottom:10px">
    Jumlah Mengetahui :
    <select name="jumlah_mengetahui" id="jumlah_mengetahui">
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

        <!-- Mengetahui 1 -->
        <tr id="mengetahui1">
        <td>1</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" value="<?php echo $data_kacab['departemen'] ?>" class="form-control" required id="mengetahui_departemen1">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui1">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" value="<?php echo $data_kacab['level'] ?>" id="mengetahui_jabatan1">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" value="<?php echo $data_kacab['nama_lengkap'] ?>" id="mengetahui_username1">

            <input type="text" name="urutan_mengetahui[]" value="1" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui 2............................................................................................ -->

        <!-- Mengetahui 2 -->
        <tr id="mengetahui2">
        <td>2</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" value="<?php echo $data_jenis_memo['jenis_memo_mengetahuiDepartemen'] ?>" class="form-control" required id="mengetahui_departemen2">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui2">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" value="<?php echo $data_jenis_memo['jenis_memo_mengetahuiJabatan'] ?>" id="mengetahui_jabatan2">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" value="<?php echo $data_jenis_memo['jenis_memo_mengetahuiUsername'] ?>" id="mengetahui_username2">

            <input type="text" name="urutan_mengetahui[]" value="2" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui 2............................................................................................ -->


        <!-- Mengetahui 3 -->
        <tr id="mengetahui3">
        <td>3</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" class="form-control" id="mengetahui_departemen3">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui3">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" id="mengetahui_jabatan3">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" id="mengetahui_username3">
            <input type="text" name="urutan_mengetahui[]" value="3" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui 3 ......................................................................................... -->


        <!-- Mengetahui 4 -->
        <tr id="mengetahui4">
        <td>4</td>

        <td>
            <div class="form-group input-group">
            <input type="text" name="departemen_mengetahui[]" class="form-control" id="mengetahui_departemen4">
            <span class="input-group-btn">
                <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#modal-mengetahui4">
                <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </td>

        <td>
            <input type="text" class="form-control" name="jabatan_mengetahui[]" id="mengetahui_jabatan4">
        </td>

        <td>
            <input type="text" class="form-control" name="username_mengetahui[]" id="mengetahui_username4">
            <input type="text" name="urutan_mengetahui[]" value="4" hidden>
        </td>

        <!-- <td style="text-align:center">
            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </td> -->

        </tr>
        <!-- / Mengetahui 4 ......................................................................................... -->

    </tbody>

</table>
<?php } ?>
<!-- Mengetahui jika yang ajukan KANTOR CABANG -->

</div>
<!-- / Mengetahui ...................................................................-->



<!-- Modal Mengetahui 1 -->
<div class="modal fade" id="modal-mengetahui1">
<div class="modal-dialog modal-lg">
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
                <th>Nama Lengkap</th>
                <th>Pilih</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no=1;
                foreach($data_user as $row_user){ 
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row_user['departemen'] ?></td>
                <td><?php echo $row_user['level'] ?></td>
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
<div class="modal-dialog modal-lg">
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
                <th>Nama Lengkap</th>
                <th>Pilih</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no=1;
                foreach($data_user as $row_user){ 
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row_user['departemen'] ?></td>
                <td><?php echo $row_user['level'] ?></td>
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
<div class="modal-dialog modal-lg">
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
                <th>Nama Lengkap</th>
                <th>Pilih</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no=1;
                foreach($data_user as $row_user){ 
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row_user['departemen'] ?></td>
                <td><?php echo $row_user['level'] ?></td>
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
<div class="modal-dialog modal-lg">
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
                <th>Nama Lengkap</th>
                <th>Pilih</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                $no=1;
                foreach($data_user as $row_user){ 
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row_user['departemen'] ?></td>
                <td><?php echo $row_user['level'] ?></td>
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


<!-- Pengaturan default yang tampil jika kantor pusat / kantor cabang -->
<?php if($cabang == 'HEAD OFFICE'){ ?>

    <script>
        $(document).ready(function(){
            $('#mengetahui2').hide();
            $('#mengetahui3').hide();
            $('#mengetahui4').hide();
        });
    </script>

<?php }else{ ?>

    <script>
        $(document).ready(function(){
            $('#mengetahui3').hide();
            $('#mengetahui4').hide();
        });
    </script>

<?php } ?>

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

        $('#mengetahui_departemen1').val(departemen1);
        $('#mengetahui_jabatan1').val(jabatan1);
        $('#mengetahui_username1').val(nama_lengkap1);

        $('#modal-mengetahui1').modal('hide');
    });

    $(document).on('click','#pilih-mengetahui2', function(){
        let departemen2 = $(this).data('departemen');
        let jabatan2 = $(this).data('level');
        let nama_lengkap2 = $(this).data('nama_lengkap');

        $('#mengetahui_departemen2').val(departemen2);
        $('#mengetahui_jabatan2').val(jabatan2);
        $('#mengetahui_username2').val(nama_lengkap2);

        $('#modal-mengetahui2').modal('hide');
    });

    $(document).on('click','#pilih-mengetahui3', function(){
        let departemen3 = $(this).data('departemen');
        let jabatan3 = $(this).data('level');
        let nama_lengkap3 = $(this).data('nama_lengkap');

        $('#mengetahui_departemen3').val(departemen3);
        $('#mengetahui_jabatan3').val(jabatan3);
        $('#mengetahui_username3').val(nama_lengkap3);

        $('#modal-mengetahui3').modal('hide');
    });

    $(document).on('click','#pilih-mengetahui4', function(){
        let departemen4 = $(this).data('departemen');
        let jabatan4 = $(this).data('level');
        let nama_lengkap4 = $(this).data('nama_lengkap');

        $('#mengetahui_departemen4').val(departemen4);
        $('#mengetahui_jabatan4').val(jabatan4);
        $('#mengetahui_username4').val(nama_lengkap4);

        $('#modal-mengetahui4').modal('hide');
    });

    // Penutup Script Modal Mengetahui

});
</script>