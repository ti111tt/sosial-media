<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Forgot password</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?= base_url('vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?= base_url('css/main.css')?>" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="<?= base_url('css/pages/auth-light.css')?>" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="">AdminCAST</a>
        </div>
        <form id="forgot-form" action="<?= base_url('home/aksi_forget') ?>" method="post">
            <h3 class="m-t-10 m-b-10">Forgot password</h3>
            <p class="m-b-20">Enter your email address below and we'll send you password reset instructions.</p>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off">
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="<?= base_url('vendors/jquery/dist/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?= base_url('vendors/popper.js/dist/umd/popper.min.js')?>" type="text/javascript"></script>
    <script src="<?= base_url('vendors/bootstrap/dist/js/bootstrap.min.js')?>" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="<?= base_url('vendors/jquery-validation/dist/jquery.validate.min.js')?>" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?= base_url('js/app.js')?>" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#forgot-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>