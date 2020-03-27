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
                            <img src="{{asset('uploads/travel/driver/'.$data->avatar)}}"
                                 alt="users view avatar"
                                 class="users-avatar-shadow rounded-circle" height="64" width="64">
                        </a>
                        <div class="media-body pt-25">
                            <h4 class="media-heading">
                                <span class="users-view-name">{{$data->name}}</span>
                            </h4>
                            <span>ID:</span>
                            <span class="users-view-id">{{$data->nik}}</span>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                    <a href="{{route('driver.edit', $data->id)}}" class="btn btn-md btn-primary pull-right">Edit
                        Profile</a>
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
                                        <td>SIM</td>
                                        <td>{{$data->number_sim}}</td>
                                    </tr>

                                    <tr>
                                        <td>Mobil</td>
                                        <td class="users-view-name">{{$data->car->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Verified</td>
                                        <td class="users-view-verified">
                                            <span class="badge {{$data->active ? 'badge-success' : 'badge-danger'}}">
                                                {{$data->active ? 'Aktif' : 'Tidak Aktif'}}
                                            </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 col-md-4">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td>Hari :</td>
                                        <td>
                                            @foreach($days as $day),
                                                @if($day->id_car == $data->id_car)
                                                    {{$day->day}}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Jam :</td>
                                        <td>
                                            @foreach($hours as $hour),
                                                @if($hour->id_car == $data->id_car)
                                                    {{\Carbon\Carbon::parse($hour->hour)->format('d m'). ' WIB'}}
                                                @endif
                                            @endforeach
                                        </td>
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
                            <h5 class="mb-1"><i class="fa fa-info"></i> Driver Info</h5>
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td class="users-view-username">{{$data->gender == 'm' ? 'Laki-Laki' : 'Perempuan'}}</td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td class="users-view-email">{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{$data->address}}</td>
                                </tr>

                                <tr>
                                    <td>Telephome</td>
                                    <td>{{$data->telephone}}</td>
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