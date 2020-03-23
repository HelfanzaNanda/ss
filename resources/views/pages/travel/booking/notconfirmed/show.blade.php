@extends('templates.travel')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Invoice</a>
                        </li>
                        <li class="breadcrumb-item active">Invoice View
                        </li>
                    </ol>
                </div>
            </div>
            <h3 class="content-header-title mb-0">Invoice</h3>
        </div>
    </div>

    <div class="content-body">
        <section class="app-invoice-wrapper">
            <div class="row justify-content-md-center">
                <div class="col-xl-9 col-md-8 col-12 printable-content">
                    <!-- using a bootstrap card -->
                    <div class="card">
                        <!-- card body -->
                        <div class="card-body p-2">
                            <!-- card-header -->
                            <div class="card-header px-0">
                                <div class="row">
                                    <div class="col-md-12 col-lg-7 col-xl-4 mb-50">
                                        <span class="invoice-id font-weight-bold">Invoice# </span>
                                        <span>{{$data->id}}</span>
                                    </div>
                                    <div class="col-md-12 col-lg-5 col-xl-8">
                                        <div class="d-flex align-items-center justify-content-end justify-content-xs-start">
                                            <div class="issue-date pr-2">
                                                <span class="font-weight-bold no-wrap">Tanggal Pesan : </span>
                                                <span>{{\Carbon\Carbon::parse($data->created_at)->format('d:h Y M h')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- invoice logo and title -->
                            <div class="invoice-logo-title row py-2">
                                <div class="col-6 d-flex flex-column justify-content-center align-items-start">
                                    <h2 class="text-primary">Invoice</h2>
                                    <span>{{Auth::guard('travel')->user()->business_name}}</span>
                                </div>
                                <div class="col-6 d-flex justify-content-end invoice-logo">
                                    <img src="{{asset('assets/app-assets/images/logo/pixinvent-logo.png')}}"
                                         alt="company-logo" height="46"
                                         width="164">
                                </div>
                            </div>
                            <hr>

                            <div class="row invoice-adress-info py-2">

                                <div class="col-6 mt-1 to-info">
                                    <div class="info-title mb-1"><span>Nama Pemesan</span></div>
                                    <div class="info-title mb-1"><span>Email</span></div>
                                    <div class="company-name mb-1">
                                        <span class="text-muted">Mobil </span>
                                    </div>
                                    <div class="company-address mb-1">
                                        <span class="text-muted">Nama Driver</span>
                                    </div>
                                    <div class="company-address mb-1">
                                        <span class="text-muted">Tujuan</span>
                                    </div>
                                    <div class="company-email mb-1">
                                        <span class="text-muted">Telephone </span>
                                    </div>
                                    <div class="company-phone  mb-1">
                                        <span class="text-muted">Hari/ Jam</span>
                                    </div>
                                </div>

                                <div class="col-6 mt-1 to-info">
                                    <div class="info-title mb-1"><span>{{$data->user->name}}</span></div>
                                    <div class="info-title mb-1"><span>{{$data->user->email}}</span></div>
                                    <div class="company-name mb-1">
                                        <span class="text-muted">{{$data->driver->car->name}}</span>
                                    </div>
                                    <div class="company-address mb-1">
                                        <span class="text-muted">{{$data->driver->name}}</span>
                                    </div>
                                    <div class="company-address mb-1">
                                        <span class="text-muted">{{$data->driver->car->to}}</span>
                                    </div>
                                    <div class="company-email mb-1">
                                        <span class="text-muted">{{$data->user->telephone}}</span>
                                    </div>
                                    <div class="company-phone  mb-1">
                                        <span class="text-muted">
                                            {{\Carbon\Carbon::parse($data->day)->format('d M')}}
                                            / {{\Carbon\Carbon::parse($data->hour)->format('H:i')}}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!--product details table -->
                            <div class="product-details-table py-2 table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                    <tr>
                                        <th>ITEM</th>
                                        <th>PRICE</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td class="font-weight-bold">Rp. {{number_format($data->price)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Kursi</td>
                                        <td class="font-weight-bold">{{$data->total_seat}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <!-- invoice total -->
                            <div class="invoice-total py-2">
                                <div class="row">
                                    <div class="col-4 col-sm-6" style="margin-top: 60px">
                                        <p>Thanks for your business.</p>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <ul class="list-group cost-list">
                                            <li class="list-group-item each-cost border-0 p-1 d-flex justify-content-between">
                                                <span class="cost-title mr-2"><b>Total</b></span>
                                                <span class="cost-value"><b>Rp. {{number_format($data->total_price)}}</b></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection