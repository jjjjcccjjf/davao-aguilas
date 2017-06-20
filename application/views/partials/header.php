<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Puratos</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-reset.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />

    <!--right slidebar-->
    <link href="<?php echo base_url('assets/css/slidebars.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <?php if ($dynamic_table == true): ?>
    <!--dynamic table-->
    <link href="<?php echo base_url('assets/assets/advanced-datatable/media/css/demo_page.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/assets/advanced-datatable/media/css/demo_table.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/assets/data-tables/DT_bootstrap.css'); ?>" />
    <?php endif ?>

    <?php if ($time_picker == true): ?>
    <!-- time picker -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-datepicker/css/datepicker.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-timepicker/compiled/timepicker.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-datetimepicker/css/datetimepicker.css'); ?>" />
    <!-- # END time picker -->
    <?php endif ?>

    <!-- file upload -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-fileupload/bootstrap-fileupload.css'); ?>">
    <!-- END file upload -->

    <!-- multiple select -->
    <?php if ($multiple_select == true): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-fileupload/bootstrap-fileupload.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-datepicker/css/datepicker.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-timepicker/compiled/timepicker.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-colorpicker/css/colorpicker.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-daterangepicker/daterangepicker-bs3.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/bootstrap-datetimepicker/css/datetimepicker.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/assets/jquery-multi-select/css/multi-select.css'); ?>" />
    <?php endif ?>
    <!-- multiple select end -->

    <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <i class="fa fa-bars"></i>
              </div>
            <!--logo start-->
            <!-- <a href="index.html" class="logo">Flat<span>lab</span></a> -->
            <a href="" class="logo"><img style="max-width:70px; margin-right:10px" src="<?php echo base_url('assets/img/custom/img_ph_logo_noname.png') ?>" /></a>

            <!--logo end-->

            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <!-- <img alt="" src="assets/img/avatar1_small.jpg"> -->
                            <span class="username"><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <!-- <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li> -->
                            <!-- <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> -->
                            <!-- <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li> -->
                            <li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- <li class="sb-toggle-right">
                        <i class="fa  fa-align-right"></i>
                    </li> -->
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->