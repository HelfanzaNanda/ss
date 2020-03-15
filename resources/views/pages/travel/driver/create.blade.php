@extends('templates.admin')
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
                            <form class="form" method="post" action="{{route('driver.store')}}">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">License Number</label>
                                                <input type="text" class="form-control {{$errors->has('number_plate')?'is-invalid':''}}"
                                                       placeholder="Plat Nomor" name="number_plate" value="{{old('number_plate')}}">
                                                @if ($errors->has('number_plate'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('number_plate') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput2">Nama</label>
                                                <input type="text" class="form-control {{$errors->has('nama')?'is-invalid':''}}"
                                                       placeholder="Nama" name="nama" value="{{old('nama')}}">
                                                @if ($errors->has('nama'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('nama') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput2">Jenis Kelamin</label>
                                                <select class="form-control" name="jenis_kelamin">
                                                    <option value="laki-laki">Laki-Laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput3">E-mail</label>
                                                <input type="text" class="form-control {{$errors->has('email')?'is-invalid':''}}"
                                                       placeholder="E-mail" name="email" value="{{old('email')}}">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('email') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="projectinput3">Password</label>
                                                <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}"
                                                       placeholder="Password" name="password" value="{{old('password')}}">
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('password') }}</b></p>
                                                    </span>
                                                @endif
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