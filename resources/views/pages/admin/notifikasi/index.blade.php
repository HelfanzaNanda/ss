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
                            <h4 class="card-title">Data Travel Registrasi</h4>
                            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">

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
                                            <td>{{$data->telephone}}</td>
                                            <td>
                                                <a href="{{route('notifikasi.update', $data->id)}}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                <a href="{{route('notifikasi.destroy', $data->id)}}" onclick="return confirm('Apakah anda yakin akan mmenghapus data ini?')"
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


<script type="text/javascript">
    function functionDelete(url){
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
            // dismiss can be 'cancel', 'overlay',
            // 'close', and 'timer'
            if (dismiss === 'cancel') {
                swal("Batalkan", "Data Tidak Jadi Dihapus", "error")
            }

        })
    }

</script>