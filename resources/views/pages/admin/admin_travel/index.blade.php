@extends('templates.admin')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Data Travel</h3>
        </div>
    </div>
    <div class="content-body">
        <section id="dom">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Travel</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">

                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered dom-jQuery-events">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Licemse Number</th>
                                        <th>Bussines Owner</th>
                                        <th>Bussines Name</th>
                                        <th>Address</th>
                                        <th>Telephone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->license_number}}</td>
                                            <td>{{$data->business_owner}}</td>
                                            <td>{{$data->business_name}}</td>
                                            <td>{{$data->address}}</td>
                                            <td>{{$data->telephone}}</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection