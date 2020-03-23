@extends('templates.admin')
@section('content')

    @if($message = Session::get('create'))
        <div class="alert alert-success alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{$message}}
        </div>
    @endif

    @if($message = Session::get('update'))
        <div class="alert alert-success alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{$message}}
        </div>
    @endif

    @if($message = Session::get('delete'))
        <div class="alert alert-success alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{$message}}
        </div>
    @endif

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
                                    <a href="{{route('travel.create')}}" class="btn btn-info">Tambah</a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered base-style">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Licemse Number</th>
                                        <th>Bussines Owner</th>
                                        <th>Bussines Name</th>
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
                                            <td align="center">
                                                <a href="{{route('travel.edit', $data->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('travel.destroy', $data->id)}}" onclick="return confirm('Apakah anda yakin akan mmenghapus data ini?')"
                                                   class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>
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