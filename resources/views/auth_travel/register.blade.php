<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Register with Background Color - Stack Responsive Bootstrap 4 Admin Template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/components.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css/pages/login-register.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/css/style.css')}}">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="row flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-lg-10 col-md-8 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                            <div class="card-header border-0 pb-0">
                                <div class="card-title text-center">
                                    <img src="{{asset('assets/app-assets/images/logo/stack-logo-dark.png')}}" alt="branding logo">
                                </div>
                            </div>
                            <div class="card-content">
                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>OR Using
                            Email</span></p>
                                <div class="card-body pt-0">
                                    @csrf
                                    <form class="form-horizontal" action="{{route('travel.register.submit')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @if($message = Session::get('error'))
                                            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                {{$message}}
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset class="form-group floating-label-form-group">
                                                    <label for="user-name">License Number</label>
                                                    <input type="text" class="form-control {{$errors->has('license_number')?'is-invalid':''}}"
                                                           placeholder="Masukkan Nomor License Anda" name="license_number">
                                                    @if ($errors->has('license_number'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('license_number') }}</b></p>
                                                    </span>
                                                    @endif
                                                </fieldset>

                                                <fieldset class="form-group floating-label-form-group">
                                                    <label for="user-name">Nama Pemilik</label>
                                                    <input type="text" class="form-control {{$errors->has('business_owner')?'is-invalid':''}}"
                                                           placeholder="Masukkan Nomor License Anda" name="business_owner">
                                                    @if ($errors->has('business_owner'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('business_owner')}}</b></p>
                                                    </span>
                                                    @endif
                                                </fieldset>

                                                <fieldset class="form-group floating-label-form-group">
                                                    <label for="user-name">Nama Usaha</label>
                                                    <input type="text" class="form-control {{$errors->has('business_name')?'is-invalid':''}}"
                                                           placeholder="Masukkan Nomor License Anda" name="business_name">
                                                    @if ($errors->has('business_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('business_name')}}</b></p>
                                                    </span>
                                                    @endif
                                                </fieldset>

                                                <fieldset class="form-group floating-label-form-group">
                                                    <label for="user-name">Alamat</label>
                                                    <textarea rows="5" class="form-control {{$errors->has('address')?'is-invalid':''}}"
                                                              name="address" placeholder="Masukkan Alamat"></textarea>
                                                    @if ($errors->has('address'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('address')}}</b></p>
                                                    </span>
                                                    @endif
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">

                                                <fieldset class="form-group floating-label-form-group">
                                                    <label for="user-email">Your Email Address</label>
                                                    <input type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}"
                                                           placeholder="Your Email Address" name="email">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('email')}}</b></p>
                                                    </span>
                                                    @endif
                                                </fieldset>
                                                <fieldset class="form-group floating-label-form-group mb-1">
                                                    <label for="user-password">Enter Password</label>
                                                    <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}"
                                                           placeholder="Enter Password" name="password">
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('password')}}</b></p>
                                                    </span>
                                                    @endif
                                                </fieldset>
                                                <fieldset class="form-group floating-label-form-group mb-1">
                                                    <label for="user-password">Repeat Enter Password</label>
                                                    <input type="password" class="form-control" name="password_confirmation"
                                                           placeholder="Enter Password">
                                                </fieldset>

                                                <fieldset class="form-group floating-label-form-group">
                                                    <label for="user-name">Nama Usaha</label>

                                                    <div class="form-group">
                                                        <label for="sel1">Jenis Travel:</label>
                                                        <select class="form-control" name="jenis">
                                                            <option value="wisata">Wisata</option>
                                                            <option value="perhari">Perhari</option>
                                                        </select>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="form-group floating-label-form-group mb-1">
                                                    <label for="user-password">No Hp</label>
                                                    <input type="number" class="form-control {{$errors->has('telephone')?'is-invalid':''}}"
                                                           placeholder="Enter Number Phone" name="telephone">
                                                    @if ($errors->has('telephone'))
                                                        <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('telephone')}}</b></p>
                                                    </span>
                                                    @endif
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                            </div>
                                            <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right">
                                                <a href="#" class="card-link">Forgot Password?</a>
                                                <a href="{{route('travel.login')}}" class="card-link">Login</a>
                                            </div>
                                        </div>
                                        <div style="display: flex; justify-content: center; margin: 10px 300px 10px 300px">
                                            <button type="submit" class="btn btn-outline-primary btn-block">
                                                <i class="fa fa-user"></i> Register</button>
                                        </div>
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


<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/icheck/icheck.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/core/app.min.js')}}"></script>
<script src="{{asset('assets/app-assets/js/scripts/forms/form-login-register.min.js')}}"></script>

</body>

</html>