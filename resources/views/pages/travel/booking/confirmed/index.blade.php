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
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <table class="table table-striped table-bordered base-style">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemesan</th>
                                        <th>Mobil</th>
                                        <th>Tujuan</th>
                                        <th>Telephone</th>
                                        <th>Tanggal / Jam</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data->user->name}}</td>
                                            <td>{{$data->driver->car->name}}</td>
                                            <td>{{$data->driver->car->to}}</td>
                                            <td>{{$data->user->telephone}}</td>
                                            <td>{{\Carbon\Carbon::parse($data->day)->format('d M')}}
                                                / {{\Carbon\Carbon::parse($data->hour)->format('H:i')}}
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