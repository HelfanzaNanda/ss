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
                                    <a href="{{route('car.create')}}" class="btn btn-info">Tambah</a>
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
                                        <th>No Plat</th>
                                        <th>Nama Mobil</th>
                                        <th>Ke</th>
                                        <th>Harga</th>
                                        <th>Kursi</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#default{{$loop->iteration}}" type="button">
                                                    <img src="{{asset('uploads/travel/car/'. $data->picture_travel)}}" width="40px" height="auto">
                                                </a>
                                            </td>
                                            <td>{{$data->number_plate}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->to}}</td>
                                            <td>{{"Rp ".number_format($data->price)}}</td>
                                            <td>{{$data->seat}}</td>
                                            <td>
                                                <a href="{{route('car.edit', $data->id)}}" class="btn btn-warning btn-sm"><i
                                                            class="fa fa-edit"></i></a>
                                                <a href="{{route('car.destroy', $data->id)}}"
                                                   onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"
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
                                                            <img src="{{asset('uploads/travel/car/'. $data->picture_travel)}}" style="height: auto; width: 480px;" >
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

<script type="text/javascript">
    function functionDelete(url) {
        swal({
            title: 'Apakah anda yakin untuk menghapus data ini?',
            text: "Jika akan menghapus klik tombol Ya",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#dd3900',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Tidak, Kembali!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false

        }).then(function () {
            swal("Dihapus!", "Data Berhasil di Hapus!", "success");
            window.location = url;
        }, function (dismiss) {
            if (dismiss === 'cancel') {
                swal("Batalkan", "Data Tidak Jadi Dihapus", "error")
            }
        })
    }

</script>