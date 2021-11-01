<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2021 Pro-Memo PT Procar Int'l Finance.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url().'asset2/' ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url().'asset2/' ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?php echo base_url().'asset2/' ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'asset2/' ?>dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url().'asset2/' ?>dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url().'asset2/' ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url().'asset2/' ?>plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url().'asset2/' ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url().'asset2/' ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url().'asset2/' ?>plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url().'asset2/' ?>dist/js/pages/dashboard2.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url().'asset2/' ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url().'asset2/' ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url().'asset2/' ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url().'asset2/' ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#example1, #example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

<!-- Summernote -->
<script src="<?php echo base_url().'asset2/' ?>plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

</body>
</html>
