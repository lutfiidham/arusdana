<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Arus Dana</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?= base_url() ?>assets/120.png" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/pace/pace-theme-flash.css" type="text/css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/c3/c3.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jquery-minicolors/jquery.minicolors.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datedropper/datedropper.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/dist/summernote-bs4.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/mohithg-switchery/dist/switchery.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/theme.min.css">
        <script src="<?= base_url() ?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="<?= base_url() ?>assets/src/js/vendor/jquery-3.3.1.min.js"></script>
    </head>

    <body>
        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <div class="dropdown">
                                
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="form-txt-inverse" style="font-weight: bold; "><?php echo $this->session->nama; ?>&nbsp;&nbsp;</span><img class="avatar" src="<?= base_url() ?>assets/img/avatar.png" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#"><i class="ik ik-user dropdown-icon"></i> Profil</a>
                                    <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="ik ik-power dropdown-icon"></i> Keluar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="<?= base_url() ?>">
                            <div class="logo-img" style="">
                               <img src="<?= base_url() ?>assets/img/logoII.png" class="header-brand-img" alt="lavalite" style="height: 40px !important; width:auto;background: transparant; padding: 2px; border-radius: 7px"> 
                          </div>
                          <span class="text">&nbsp;ArusDana</span>
                            <!-- <span class="text">SamaktaMitra</span> -->
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <?php $this->load->view('sidebar_view'); ?>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
                            <!-- content -->
                            <?php 
                                $this->load->view($page);
                             ?>
                     </div>
                </div>

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2019  All Rights Reserved.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark" target="_blank">Risky</a></span>
                    </div>
                </footer>
                
            </div>
        </div>
        
        <script src="<?= base_url() ?>assets/plugins/moment/moment-with-locales.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/screenfull/dist/screenfull.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script> 
        <script src="<?= base_url() ?>assets/plugins/datatables.net/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables.net/js/jszip.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables.net/js/pdfmake.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables.net/js/vfs_fonts.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datatables.net/js/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/plugins/jquery-validation/localization/messages_id.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/plugins/autonumeric/auto_numeric.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/plugins/d3/dist/d3.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/c3/c3.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/jquery-minicolors/jquery.minicolors.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/datedropper/datedropper.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/select2/dist/js/select2.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/summernote/dist/summernote-bs4.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/jquery.repeater/jquery.repeater.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/mohithg-switchery/dist/switchery.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
        <script src="<?= base_url() ?>assets/dist/js/theme.js"></script>
        <script src="<?= base_url() ?>assets/js/myscript.js"></script>
        <script type="text/javascript">
            moment.locale('id');
        </script>
    </body>
</html>
