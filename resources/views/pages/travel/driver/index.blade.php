@extends('templates.travel')
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
                                    <a href="{{route('driver.create')}}" class="btn btn-info">Tambah</a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered base-style">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Mobil</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a class="avatar bg-danger" data-toggle="modal" data-target="#default{{$loop->iteration}}" type="button">
                                                    <img src="{{asset('uploads/travel/driver/'.$data->path_avatar)}}" width="40" height="40">
                                                </a>
                                            </td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->car->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->telephone}}</td>
                                            <td>
                                                <a href="{{route('driver.show', $data->id)}}" class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye"></i></a>
                                                <a href="{{route('driver.edit', $data->id)}}" class="btn btn-warning btn-sm"><i
                                                            class="fa fa-edit"></i></a>
                                                <a href="{{route('driver.destroy', $data->id)}}" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"
                                                   class="btn btn-danger btn-sm">
                                                    <i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr>

                                        <div class="modal fade text-left" id="default{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel1">Image</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-center">
                                                            <img src="{{asset('uploads/travel/driver/'.$data->path_avatar)}}" style="height: 480px; width: 480px;" >
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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