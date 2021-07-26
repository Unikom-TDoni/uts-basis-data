<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <title>Admin</title>

        <!-- Base Css Files -->
        <link href="<?= base_url('assets/admin')?>/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="<?= base_url('assets/admin')?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin')?>/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin')?>/css/material-design-iconic-font.min.css" rel="stylesheet">

        <!-- animate css -->
        <link href="<?= base_url('assets/admin')?>/css/animate.css" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="<?= base_url('assets/admin')?>/css/waves-effect.css" rel="stylesheet">

        <!-- DataTables -->
        <link href="<?= base_url('assets/admin')?>/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

        <!-- sweet alerts -->
        <link href="<?= base_url('assets/admin')?>/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">

        <!--venobox lightbox-->
        <link rel="stylesheet" href="<?= base_url('assets/admin')?>/assets/magnific-popup/magnific-popup.css"/>
        
        <!-- Dropzone css -->
        <link href="<?= base_url('assets/admin')?>/assets/dropzone/dropzone.css" rel="stylesheet" type="text/css" />

        <!-- Plugins css-->
        <link href="<?= base_url('assets/admin')?>/assets/tagsinput/jquery.tagsinput.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin')?>/assets/toggles/toggles.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin')?>/assets/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin')?>/assets/timepicker/bootstrap-datepicker.min.css" rel="stylesheet" />
        <link href="<?= base_url('assets/admin')?>/assets/colorpicker/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/admin')?>/assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/admin')?>/assets/select2/select2.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="<?= base_url('assets/admin')?>/css/helper.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/admin')?>/css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?= base_url('assets/admin')?>/js/modernizr.min.js"></script>
        
    </head>

    <body class="fixed-left">    
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="<?= site_url('admin')?>" class="logo"> <span>RD TRANS</span></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?= base_url('assets/admin')?>/images/user.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#ubah-pw"><i class="fa fa-lock"></i> Ubah Password</a></li>
                                        <li><a href="<?= site_url('auth/logout')?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->
        
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="<?= base_url('assets/admin')?>/images/user.png" alt="" class="thumb-md img-circle">
                        </a>
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle"><?= session()->get('nama'); ?></a>                                
                            </div>

                            <p class="text-muted m-0"><?= session()->get('nama_level'); ?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?= site_url('admin'); ?>" class="waves-effect <?= ($page=='dashboard')?'active':''; ?>"><i class="md md-dashboard"></i> Dashboard</a>
                            </li>
                            
                            <?php if(session()->get('level') == 0 || session()->get('level') == 2): ?>
                                <li>
                                    <a href="<?= site_url('admin/cabang'); ?>" class="waves-effect  <?= ($page=='cabang')?'active':''; ?>"><i class="md md-home"></i> Cabang</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('admin/rute'); ?>" class="waves-effect  <?= ($page=='rute')?'active':''; ?>"><i class="md md-view-list"></i> Rute</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('admin/jadwal'); ?>" class="waves-effect  <?= ($page=='jadwal')?'active':''; ?>"><i class="md md-event"></i> Jadwal</a>
                                </li>
                            <?php endif; ?>

                            <?php if(session()->get('level') == 0 || session()->get('level') == 1): ?>
                                <li>
                                    <a href="<?= site_url('admin/mobil'); ?>" class="waves-effect  <?= ($page=='mobil')?'active':''; ?>"><i class="fa fa-car"></i> Mobil</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('admin/sopir'); ?>" class="waves-effect  <?= ($page=='sopir')?'active':''; ?>"><i class="fa fa-user-secret"></i> Sopir</a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(session()->get('level') == 0 || session()->get('level') == 3): ?>
                                <li>
                                    <a href="<?= site_url('admin/pelanggan'); ?>" class="waves-effect  <?= ($page=='pelanggan')?'active':''; ?>"><i class="fa fa-user"></i> Pelanggan</a>
                                </li>
                                <li class="has_sub">
                                    <a href="#" class="waves-effect <?= ($page=='list_transaksi' || $page=='add_transaksi')?'active':''; ?>"><i class="fa fa-cart-plus"></i><span> Transaksi </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                    <ul class="list-unstyled">
                                        <li class="<?= ($page=='list_transaksi')?'active':''; ?>"><a href="<?= site_url('admin/transaksi/list'); ?>">List Transaksi</a></li>
                                        <li class="<?= ($page=='add_transaksi')?'active':''; ?>"><a href="<?= site_url('admin/transaksi/add'); ?>">Tambah Transaksi</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <?php if(session()->get('level') == 0): ?>
                                <li>
                                    <a href="<?= site_url('admin/users'); ?>" class="waves-effect  <?= ($page=='users')?'active':''; ?>"><i class="fa fa-users"></i> Users</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->
            
            <!-- MODAL UBAH PASSWORD -->
            <div id="ubah-pw" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog"> 
                    <div class="modal-content"> 
                        <div class="modal-header"> 
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                            <h4 class="modal-title">Ubah Password</h4> 
                        </div> 
                        
                        <form action="<?= site_url('admin/password')?>" method="post" enctype="multipart/form-data" id="modalform">
                            <div class="modal-body">
                                <div class="row"> 
                                    <div class="col-md-12"> 
                                        <div class="form-group"> 
                                            <label for="field-7" class="control-label">Password Lama</label> 
                                            <input type="password" class="form-control" id="old_password" name="old_password" value="" required>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="row"> 
                                    <div class="col-md-12"> 
                                        <div class="form-group"> 
                                            <label for="field-7" class="control-label">Password</label> 
                                            <input type="password" class="form-control" id="new_password" name="new_password" value="" required>
                                        </div> 
                                    </div> 
                                </div> 
                                <div class="row"> 
                                    <div class="col-md-12"> 
                                        <div class="form-group"> 
                                            <label for="field-7" class="control-label">Konfirmasi Password</label> 
                                            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" value="" required>
                                        </div> 
                                    </div> 
                                </div> 
                            </div>
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup <i class="fa fa-close"></i></button> 
                                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="ubahPassword()">Simpan <i class="fa fa-save"></i></button> 
                            </div> 
                        </form>
                    </div> 
                </div>
            </div><!-- /.modal -->