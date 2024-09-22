<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            
                                <!-- <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3> -->
                            
                            <h3>Login</h3>
                        </div>
                        <form id="myForm" action="<?= base_url('home/aksi_login') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LeshCAqAAAAAOGLdQWzAJg5gwudDshcUM0J5hcY"></div>
      <br/>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            
                            
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
                        </form>
                        <!-- <p class="text-center mb-0">Don't have an Account? <a href="<?= base_url('home/register') ?>">Sign Up</a></p> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('lib/chart/chart.min.js')?>"></script>
    <script src="<?= base_url('lib/easing/easing.min.js')?>"></script>
    <script src="<?= base_url('lib/waypoints/waypoints.min.js')?>"></script>
    <script src="<?= base_url('lib/owlcarousel/owl.carousel.min.js')?>"></script>
    <script src="<?= base_url('lib/tempusdominus/js/moment.min.js')?>"></script>
    <script src="<?= base_url('lib/tempusdominus/js/moment-timezone.min.js')?>"></script>
    <script src="<?= base_url('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')?>"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('js/main.js')?>"></script>
    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            var response = grecaptcha.getResponse();
            if (response.length === 0) {
                // reCAPTCHA is not verified
                alert("Please complete the reCAPTCHA.");
                event.preventDefault();
            }
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>

</body>

</html>