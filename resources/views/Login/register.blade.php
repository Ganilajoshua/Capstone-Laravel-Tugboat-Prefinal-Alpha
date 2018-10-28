<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>TSMS &rsaquo; Register</title>

        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/modules/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/modules/pace/pace-theme-flash.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/demo.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/sweetalert.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/style.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/register.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/font.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/modules/waves/waves.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/animate.min.css">
        <link rel="stylesheet" href="/others/stisla_admin_v1.0.0/dist/css/cssAll.css">
        <link rel="shortcut icon" href="/others/stisla_admin_v1.0.0/dist/img/tbLogo.png">
    </head>

    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-2">
                    <div class="row">
                        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                            <div class="login-brand">
                                <a href="/">
                                    <img id="footerLogo" src="/others/stisla_admin_v1.0.0/dist/img/tbPageLogoBlack.png" alt="Logo">
                                </a>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header bg-primary text-white">
                                    <h4>Register</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <button class="btn btn-block btn-primary step1 active">Company Details <small>Step 1</small></button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-block btn-primary step2" disabled>Account Details <small>Step 2</small></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <strong> Fields with <sup class="text-white">&#10033;</sup> are required.</strong>
                                                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="/consignee/register" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                        <div class="companyDet fadeIn ">
                                            <div class="form-group">
                                                <label for="companyname">Company Name<sup class="text-primary">&#10033;</sup></label>
                                                <input id="companyname" type="text" class="form-control" name="companyname" autofocus required>
                                                <div class="invalid-feedback">
                                                    Please enter your company name.
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address<sup class="text-primary">&#10033;</sup></label>
                                                <input id="address" type="text" class="form-control" name="address" autofocus required>
                                                <div class="invalid-feedback">
                                                    Please enter your company address.
                                                </div>
                                            </div>
                                            <div class="row">
                                                {{-- <form action=""></form> --}}
                                                <div class="col-12 col-sm-12 col-lg-6">
                                                    <div class="form-group">
                                                        <h6 style="font-size:12px;">DTI Permit<sup class="text-primary">&#10033;</sup></h6>
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="dtiPermit" id="dtiPermitLabel">DTI Permit</label>
                                                            <input type="file" name="file" class="custom-file-input" accept='image/*' id="dtiPermit" onchange="ValidateSingleInput(this);" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 col-sm-12 col-lg-6">
                                                        <h6 style="font-size:12px;" class="text-center">Preview</h6>
                                                    <div class="form-group">
                                                        <img src="/others/stisla_admin_v1.0.0/dist/img/example-image.jpeg" class="img-thumbnail" id="dtiPermitPic">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary float-right waves-effect btnNext">Next    <i class="fas fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                        <div class="accountDet fadeIn ">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                            <label for="email">Email<sup class="text-primary">&#10033;</sup></label>
                                                            <input id="email" type="email" class="form-control" name="email" required>
                                                            <div class="invalid-feedback">
                                                                Please enter your company email address.
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="username">Username<sup class="text-primary">&#10033;</sup></label>
                                                        <input id="username" type="text" class="form-control" name="username" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a username.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="telnum">Telephone Number<sup class="text-primary">&#10033;</sup></label>
                                                        <input id="telnum" type="number" class="form-control" name="telnum" required>
                                                            <div class="invalid-feedback">
                                                                Please enter your telephone number.
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="mobilenum">Mobile Number<sup class="text-primary">&#10033;</sup></label>
                                                        <input id="mobilenum" type="number" class="form-control" name="mobilenum" required>
                                                        <div class="invalid-feedback">
                                                            Please enter your mobile number.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label for="password" class="d-block">Password<sup class="text-primary">&#10033;</sup></label>
                                                    <input id="password" type="password" class="form-control" name="password" required>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="password2" class="d-block">Password Confirmation<sup class="text-primary">&#10033;</sup></label>
                                                    <input id="password2" type="password" class="form-control" name="password-confirm" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                                                    <label class="custom-control-label" for="agree">I agree with the <a href="#">terms and conditions</a><sup class="text-primary">&#10033;</sup></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary float-left waves-effect btnBack"><i class="fas fa-arrow-left mr-2"></i>Back</button>
                                                <button type="submit" class="btn btn-primary float-right waves-effect"><i class="far fa-circle mr-2"></i>Register</button>
                                            </div>
                                            {{ csrf_field() }}
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-2 text-muted text-center">
                                Already have an account? <a href="/consignee/login">Login</a>
                            </div>
                            <div class="simple-footer">
                                Copyright &copy; 2018 Team Tugboat
                                <p>
                                    Made with <i class="ion-heart"></i> By Development Team
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/jquery.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/popper.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/tooltip.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/js/sa-functions.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/waves/waves.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/js/scripts.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/js/sweetalert.min.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/js/demo.js"></script>
        <script type="text/javascript" src="/others/stisla_admin_v1.0.0/dist/js/register/register.js"></script>
        <script src="/others/stisla_admin_v1.0.0/dist/modules/pace/pace.min.js"></script>
    </body>

</html>