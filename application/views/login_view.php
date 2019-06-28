<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login | Arus Dana</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="<?= base_url() ?>assets/120.png" type="image/x-icon" />

        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/ionicons/dist/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/theme.min.css">
        <script src="<?= base_url() ?>assets/src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">

                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                        <div class="authentication-form mx-auto">
                            <div class="logo-centered" align="center">
                             <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/logo.pn" alt=""></a>
                            </div>
                            <h3>Masuk ke Aplikasi Arus Dana</h3>
                            <p>Happy to see you again!</p>
                            <form action="<?= base_url('login/validate') ?>" method="POST" id="form_login">
                                <div class="form-group">
                                    <input type="text" name="val_username" class="form-control" placeholder="Username" required>
                                    <i class="ik ik-user"></i>
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="val_password" class="form-control" placeholder="Password" required >
                                    <i class="ik ik-lock"></i>
                                    <span class="help-block"></span>
                                </div>
                                <?php if ($this->session->flashdata('pesan') !== null): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="login_gagal_msg">
                                        <strong>Login Gagal!</strong> <?= $this->session->flashdata('pesan'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ik ik-x"></i>
                                        </button>
                                    </div>
                                <?php endif ?>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" style="background-image: url('<?= base_url() ?>assets/img/cover.png')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?= base_url() ?>assets/src/js/vendor/jquery-3.3.1.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <script src="<?= base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/plugins/jquery-validation/localization/messages_id.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                $('#form_login').validate({
                    errorClass: "is-invalid text-red",
                    errorElement: "em",
                    errorPlacement: function(error, element) {
                        error.insertAfter(element.parent("div").find(".help-block"));
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

                setTimeout(function() {
                    $('#login_gagal_msg').fadeOut('slow');}, 5000
                );
            });
        </script>
        </body>
</html>
