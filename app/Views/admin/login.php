<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?= base_url('assets/admin')?>/images/favicon_1.ico">

        <title>Login</title>

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
    <body>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                </div> 

                <div class="panel-body">  
                    <center><?php echo (session()->getFlashdata('pesan'));?></center>
                    <form class="form-horizontal m-t-20" action="<?= site_url('auth/proses_login')?>" method="POST">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control input-lg " type="text" required="" placeholder="Username" id="username" name="username">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control input-lg" type="password" required="" placeholder="Password" id="password" name="password">
                            </div>
                        </div>
                        
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form> 
                </div>                                 
            </div>
        </div>
        
    	<script>
            var resizefunc = [];
        </script>
    	<script src="<?= base_url('assets/admin')?>/js/jquery.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/js/bootstrap.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/js/waves.js"></script>
        <script src="<?= base_url('assets/admin')?>/js/wow.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?= base_url('assets/admin')?>/js/jquery.scrollTo.min.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/jquery-detectmobile/detect.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/fastclick/fastclick.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="<?= base_url('assets/admin')?>/assets/jquery-blockui/jquery.blockUI.js"></script>


        <!-- CUSTOM JS -->
        <script src="<?= base_url('assets/admin')?>/js/jquery.app.js"></script>
	
	</body>
</html>