<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <link rel="apple-touch-icon" href="{{asset('assets/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 1-column   blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="row flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                            <div class="card-header border-0 pb-0">
                                <div class="card-title text-center">
                                    <h4>Reset Password Travel</h4>
                                    <img src="{{asset('assets/app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo">
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>We will send
                            you a link to reset password.</span></h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form-horizontal" action="{{route('travel.password.reset.submit')}}" method="post">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">

                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}"
                                                   placeholder="Masukkan Email Anda" required name="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-position">
                                                <i class="fa fa-user"> </i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                                   value="{{ old('password') }}"
                                                   placeholder="Masukkan Password Baru" required name="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-position">
                                                <i class="fa fa-user"> </i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control" placeholder="Your password Baru Lagi"
                                                   required name="password_confirmation">
                                            <div class="form-control-position">
                                                <i class="fa fa-user"> </i>
                                            </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-outline-primary btn-block"><i
                                                    class="fa fa-unlock"></i> Forgot Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->


<script src="{{asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/form-login-register.min.js')}}"></script>
<!-- END: Page JS-->

</body>
</html>
<title>Recover Password - Stack Responsive Bootstrap 4 Admin Template</title>

