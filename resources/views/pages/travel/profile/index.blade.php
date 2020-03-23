@extends('templates.travel')
@section('content')
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- users view start -->
        <section class="users-view">
            <!-- users view media object start -->
            <div class="row">
                <div class="col-12 col-sm-7">
                    <div class="media mb-2">
                        <a class="mr-1">
                            <img src="{{asset('assets/app-assets/images/portrait/small/avatar-s-26.png')}}"
                                 alt="users view avatar"
                                 class="users-avatar-shadow rounded-circle" height="64" width="64">
                        </a>
                        <div class="media-body pt-25">
                            <h4 class="media-heading">
                                <span class="users-view-name">{{Auth::guard('travel')->user()->business_name}}</span>
                            </h4>
                            <span>ID:</span>
                            <span class="users-view-id">305</span>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                    <a href="{{route('t-profile.create')}}" class="btn btn-md btn-primary pull-right">Edit Profile</a>
                </div>
            </div>
            <!-- users view media object ends -->
            <!-- users view card data start -->
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 col-md-4">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td>Registered:</td>
                                        <td>{{\Carbon\Carbon::parse(Auth::guard('travel')->user()->created_at)->format('d M Y')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Latest Activity:</td>
                                        <td class="users-view-latest-activity">30/04/2019</td>
                                    </tr>
                                    <tr>
                                        <td>Verified:</td>
                                        <td class="users-view-verified">{{Auth::guard('travel')->user()->status == '2' ? "Aktif" : "Tidak Aktif"}}</td>
                                    </tr>
                                    <tr>
                                        <td>Type</td>
                                        <td class="users-view-role">{{Auth::guard('travel')->user()->type}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- users view card data ends -->
            <!-- users view card details start -->
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="col-12">
                            <h5 class="mb-1"><i class="fa fa-info"></i> Travel Info</h5>
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>No Izin</td>
                                    <td class="users-view-name">{{Auth::guard('travel')->user()->license_number}}</td>
                                </tr>
                                <tr>
                                    <td>Pemilik Usaha</td>
                                    <td class="users-view-username">{{Auth::guard('travel')->user()->business_owner}}</td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td class="users-view-email">{{Auth::guard('travel')->user()->email}}</td>
                                </tr>
                                <tr>
                                    <td>Nama Usaha</td>
                                    <td>{{Auth::guard('travel')->user()->business_name}}</td>
                                </tr>

                                <tr>
                                    <td>Telephome</td>
                                    <td>{{Auth::guard('travel')->user()->telephone}}</td>
                                </tr>

                                <tr>
                                    <td>Alamat</td>
                                    <td>{{Auth::guard('travel')->user()->address}}</td>
                                </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- users view card details ends -->

        </section>
        <!-- users view ends -->
    </div>
@endsection