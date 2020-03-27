@extends('templates.travel')
@section('content')
    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Add Travel</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" method="post" action="{{route('car.store')}}"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput2">Nomor Plat</label>
                                                <input type="text" class="form-control" value="{{$data->number_plate}}"
                                                       readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput2">Nama Mobil</label>
                                                <input type="text"
                                                       class="form-control {{$errors->has('name')?'is-invalid':''}}"
                                                       placeholder="Nama Mobil" name="name"
                                                       value="{{$data->name}}">
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('name') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label for="projectinput2">Tujuan</label>
                                                <input type="text"
                                                       class="form-control {{$errors->has('to')?'is-invalid':''}}"
                                                       placeholder="Tujuan" name="to" value="{{$data->to}}">
                                                @if ($errors->has('to'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('to') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>

                                            <div id="myRepeatingFields">
                                                @foreach($data->hours as $hour)
                                                    <div class="entry input-group col-xs-3" style="margin-top: 10px;">
                                                        <input class="form-control" name="hour[]" type="time"
                                                               value="{{$hour->hour}}" id="hour"/>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-success btn-add">
                                                                <span class="fa fa-plus" aria-hidden="true"
                                                                      style="font-size: 12px;"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="projectinput2">Harga</label>
                                                <input type="text" id="rupiah"
                                                       class="form-control {{$errors->has('price')?'is-invalid':''}}"
                                                       placeholder="Harga" name="price" value="{{$data->price}}">
                                                @if ($errors->has('price'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('price') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput3">Kursi</label>
                                                <input type="number"
                                                       class="form-control {{$errors->has('seat')?'is-invalid':''}}"
                                                       placeholder="Kursi" name="seat" value="{{$data->seat}}">
                                                @if ($errors->has('seat'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('seat') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput3">Fasilitas</label>
                                                <input type="text"
                                                       class="form-control {{$errors->has('facility')?'is-invalid':''}}"
                                                       placeholder="Fasilitas" name="facility"
                                                       value="{{$data->facility}}">
                                                @if ($errors->has('facility'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('facility') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput3">Foto</label>
                                                <input type="hidden" value="{{$data->picture_travel}}"
                                                       name="old_picture_travel">
                                                <input class="form-control {{$errors->has('picture_travel')?'is-invalid':''}}"
                                                       type="file" name="picture_travel"
                                                       value="{{old('picture_travel')}}"
                                                       onchange="loadfile(event)" id="foto">
                                                <br/>
                                                <img id="output" class="img-fluid" height="100" width="100"
                                                     src="{{asset('/uploads/travel/car/'.$data->picture_travel)}}">
                                                @if ($errors->has('picture_travel'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('picture_travel') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label>Hari</label>
                                                <select class="select2 form-control" multiple="multiple"
                                                        name="day[]">
                                                    @foreach($data->days as $day)
                                                        <option value="Senin" {{$day->day == 'Senin' ? "selected" : ''}}>
                                                            Senin
                                                        </option>
                                                        <option value="Selasa" {{$day->day == 'Selasa' ? "selected" : ''}}>
                                                            Selasa
                                                        </option>
                                                        <option value="Rabu" {{$day->day == 'Rabu' ? "selected" : ''}}>
                                                            Rabu
                                                        </option>
                                                        <option value="Kamis" {{$day->day == 'Kamis' ? "selected" : ''}}>
                                                            Kamis
                                                        </option>
                                                        <option value="Jumat" {{$day->day == 'Jumat' ? "selected" : ''}}>
                                                            Jumat
                                                        </option>
                                                        <option value="Sabtu" {{$day->day == 'Sabtu' ? "selected" : ''}}>
                                                            Sabtu
                                                        </option>
                                                        <option value="Minggu" {{$day->day == 'Minggu' ? "selected" : ''}}>
                                                            Minggu
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="reset" class="btn btn-warning mr-1">
                                        <i class="fa fa-close"></i> Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    var loadfile = function (event) {
        var foto = document.getElementById('foto');
        var output = document.getElementById('output');
        if (foto && foto.value) {
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.display = '';
        }
    };
</script>

<script type="text/javascript">

    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function (e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script>
    $('#hour').timePicker({
        timeFormat:'h:i',
    });
</script>