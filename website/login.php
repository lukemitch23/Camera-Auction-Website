<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="loginpagepadding">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />
    <div class="container">
                <div class="row">
                    <div class="col-md-11 mt-60 mx-md-auto">
                        <div class="login-box bg-white pl-lg-5 pl-0">
                            <div class="row no-gutters align-items-center">
                                <div class="col-md-6">
                                    <div class="form-wrap bg-white">
                                        <h4 class="btm-sep pb-3 mb-5">Login</h4>
                                        <form class="form" method="post" action="login.php">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group position-relative">
                                                        <span class="zmdi zmdi-email"></span>
                                                        <input type="email" id="email" class="form-control" placeholder="Email Address">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group position-relative">
                                                        <span class="zmdi zmdi-key"></span>
                                                        <input type="password" id="password" class="form-control" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-12 text-lg-right">
                                                    <a href="forgotpassword.php" class="c-black">Forgot password ?</a>
                                                </div>
                                                <div class="col-12 mt-30">
                                                    <button type="submit" id="submit" class="btn btn-lg btn-custom btn-dark btn-block">Login In
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content text-center">
                                        <div class="border-bottom pb-5 mb-5">
                                            <h3 class="c-black">First time here?</h3>
                                            <a href="register.php" class="btn btn-custom">Sign up</a>
                                        </div>
                                        <h5 class="c-black mb-4 mt-n1">Or Sign In With</h5>
                                        <div class="socials">
                                            <a href="#" class="zmdi zmdi-facebook"></a>
                                            <a href="#" class="zmdi zmdi-twitter"></a>
                                            <a href="#" class="zmdi zmdi-google"></a>
                                            <a href="#" class="zmdi zmdi-instagram"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
}
?>