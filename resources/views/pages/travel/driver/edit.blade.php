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
                            <form class="form" method="post" action="{{route('driver.update', $data->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="projectinput2">NIK</label>
                                                <input type="number" class="form-control" value="{{$data->nik}}"
                                                       readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput2">No SIM</label>
                                                <input type="number" class="form-control" value="{{$data->number_sim}}"
                                                       readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput2">Mobil</label>
                                                <select name="id_car" class="form-control">
                                                    @foreach($cars as $car)
                                                        <option value="{{$car->id}}" @if($car->id == $data->id_car) {{"selected"}} @endif>
                                                            {{$car->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput2">Nama</label>
                                                <input type="text"
                                                       class="form-control {{$errors->has('name')?'is-invalid':''}}"
                                                       placeholder="Nama" name="name" value="{{$data->name}}">
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('name') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label for="projectinput2">Jenis Kelamin</label>
                                                <select class="form-control" name="gender">
                                                    <option value="m" @if($data->gender == 'm'){{"selected"}} @endif>
                                                        Laki-Laki
                                                    </option>
                                                    <option value="f" @if($data->gender == 'f'){{"selected"}} @endif>
                                                        Perempuan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput3">E-mail</label>
                                                <input type="text" class="form-control" value="{{$data->email}}"
                                                       readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput3">Telephone</label>
                                                <input type="number"
                                                       class="form-control {{$errors->has('telephone')?'is-invalid':''}}"
                                                       placeholder="Telephone" name="telephone"
                                                       value="{{$data->telephone}}">
                                                @if ($errors->has('telephone'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('telephone') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control {{$errors->has('address')?'is-invalid':''}}"
                                                        name="address" rows="3" placeholder="Alamat">{{$data->address}}</textarea>
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('address') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput3">Foto</label>
                                                <input type="hidden" value="{{$data->avatar}}" name="old_avatar">
                                                <input class="form-control {{$errors->has('avatar')?'is-invalid':''}}"
                                                       type="file" name="avatar" onchange="loadfile(event)" id="foto">
                                                @if ($errors->has('avatar'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('avatar') }}</b></p>
                                                    </span>
                                                @endif
                                                <br/>
                                                <img id="output" class="img-fluid" height="100" width="100"
                                                     src="{{asset('uploads/travel/driver/'.$data->avatar)}}">
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
        if (foto && foto.value){
            output.src = URL.createObjectURL(event.target.files[0]);
            output.style.display = '';
        }
    };
</script>