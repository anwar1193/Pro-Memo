<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicons -->
	<link href="<?php echo base_url().'assets' ?>/img/logo.png" rel="icon">

  <title>Arah-Parking Panel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url().'asset2/' ?>plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url().'asset2/' ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'asset2/' ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Style Sendiri -->
  <link rel="stylesheet" href="<?php echo base_url().'asset/' ?>css/styleku.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'asset2/' ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url().'asset2/' ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url().'asset2/' ?>plugins/summernote/summernote-bs4.css">

  <style>
    .perhatian{
      animation: animasi_notif 0.3s ease infinite alternate;
    }

    @keyframes animasi_notif{
      0%{
        opacity: 0;
      }

      100%{
        opacity: 1;
      }
    }
  </style>

  <!-- jQuery -->
  <script src="<?php echo base_url().'asset2/' ?>plugins/jquery/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-orange">

  

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
    
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->