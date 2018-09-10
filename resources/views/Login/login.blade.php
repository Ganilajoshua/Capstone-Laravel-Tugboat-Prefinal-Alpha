<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
        <title>TSMS &rsaquo; Login</title>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/modules/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/demo.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/bootstrap-social.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/style.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/modules/waves/waves.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/font.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/cssAll.css">
    </head>
    <body>
        <div id="app">
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="login-brand">
                                <a href="index.html">
                                    <img id="footerLogo" src="/others/stisla_admin_v1.0.0/dist/img/tbPageLogoBlack.png" alt="Logo">
                                </a>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Log-in</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/consignee/login" class="needs-validation" novalidate="">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" class="form-control" name="email" tabindex="1" required autofocus>
                                            <div class="invalid-feedback">
                                                Please enter a valid Email address.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="d-block">Password
                                                <div class="float-right">
                                                    <a href="forgot.html">
                                                        Forgot Password?
                                                    </a>
                                                </div>
                                            </label>
                                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                            <div class="invalid-feedback">
                                                Please enter your password.
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block waves-effect" tabindex="4">
                                                Login
                                            </button>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                                    <div class="text-center">
                                        <strong class="text-muted">&mdash; OR &mdash;</strong>
                                        <div class="text-center mt-3">
                                            <a class="btn btn-google btn-block text-center text-white waves-effect">
                                                <i class="fab fa-google"></i>&nbsp;&nbsp; Sign in with Google
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-muted text-center">
                                Don't have an account? <a href="/consignee/register">Create One</a>
                            </div>
                            <div class="simple-footer">
                                Copyright &copy; 2018 Team Tugboat
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script src="/others/stisla_admin_v1.0.0/dist/modules/jquery.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/popper.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/js/moment.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/tooltip.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/waves/waves.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/js/sa-functions.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/js/scripts.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/js/demo.js"></script>
    </body>

</html>