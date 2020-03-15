<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
@include('templates.partials.travel._head')
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<!-- BEGIN: Header-->
@include('templates.partials.travel._navbar')
<!-- END: Header-->


<!-- BEGIN: Sidebar-->
@include('templates.partials.travel._sidebar')
<!-- END: Sidebar-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<!-- END: Content-->

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; 2020 <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">PIXINVENT 			</a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with <i class="feather icon-heart pink"></i></span></p>
</footer>
<!-- END: Footer-->


@include('templates.partials.travel._script')

</body>

</html>