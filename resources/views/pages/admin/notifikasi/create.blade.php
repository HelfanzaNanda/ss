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
                            <form class="form" method="post" action="{{route('travel.store')}}">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">License Number</label>
                                                <input type="text" class="form-control {{$errors->has('license_number')?'is-invalid':''}}"
                                                       placeholder="License Number" name="license_number" value="{{old('license_number')}}">
                                                @if ($errors->has('license_number'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('license_number') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput2">Nama Pemilik</label>
                                                <input type="text" class="form-control {{$errors->has('business_owner')?'is-invalid':''}}"
                                                       placeholder="Nama Pemilik" name="business_owner" value="{{old('business_owner')}}">
                                                @if ($errors->has('business_owner'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('business_owner') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput2">Nama Usaha</label>
                                                <input type="text" class="form-control {{$errors->has('business_name')?'is-invalid':''}}"
                                                       placeholder="Nama Usaha" name="business_name" value="{{old('business_name')}}">
                                                @if ($errors->has('business_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('business_name') }}</b></p>
                                                    </span>
                                                @endif
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
                                                <label for="projectinput4">Telepon</label>
                                                <input type="number" class="form-control {{$errors->has('telephone')?'is-invalid':''}}"
                                                       placeholder="Telepon" name="telephone" value="{{old('telephone')}}">
                                                @if ($errors->has('telephone'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('telephone') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput8">Alamat</label>
                                                <textarea rows="5" class="form-control {{$errors->has('address')?'is-invalid':''}}"
                                                          name="address" placeholder="Alamat">{{old('address')}}</textarea>
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('address') }}</b></p>
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