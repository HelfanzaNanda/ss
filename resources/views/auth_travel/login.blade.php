<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Travel</title>
    <link rel="apple-touch-icon" href="{{asset('assets/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon"
          href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/pages/login-register.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/css/style.css')}}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 blank-page blank-page" data-open="click"
      data-menu="vertical-menu" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                @if($message = Session::get('error'))
                                    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{$message}}
                                    </div>
                                @endif

                                    @if($message = Session::get('success'))
                                        <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            {{$message}}
                                        </div>
                                    @endif
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <img src="{{asset('assets/app-assets/images/logo/stack-logo-dark.png')}}"
                                             alt="branding logo">
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2"><span>Login Travel</span></p>
                                <div class="card-body pt-0">
                                    <form class="form-horizontal" action="{{route('travel.login.submit')}}" method="post">
                                        @csrf

                                        <fieldset class="form-group position-relative has-icon-left mb-1">

                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required placeholder="Masukkan Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="form-control-position">
                                                <i class="fa fa-user"></i>
                                            </div>
                                        </fieldset>

                                        <fieldset class="form-group position-relative has-icon-left">

                                            <input type="password" name="password" required autocomplete="current-password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukkan Password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="form-control-position">
                                                <i class="fa fa-key"></i>
                                            </div>
                                        </fieldset>

                                        <div class="form-group row">
                                            <div class="col-sm-6 col-12 text-center text-sm-left"></div>
                                            <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a
                                                        href="{{route('travel.password.request')}}" class="card-link">Forgot Password?</a></div>
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary btn-block"><i
                                                    class="fa fa-unlock"></i> Login
                                        </button>
                                    </form>
                                </div>
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Belum Punya Akun?</span></p>
                                <div class="card-body">
                                    <a href="{{route('travel.register')}}" class="btn btn-outline-danger btn-block"><i
                                                class="fa fa-registered"></i> Register</a>
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


<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/form-login-register.min.js')}}"></script>


</body>

</html>


