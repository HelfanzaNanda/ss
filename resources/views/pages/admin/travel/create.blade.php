@extends('templates.admin')
@section('content')
    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-8 offset-2">
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
                                        <div class="col-md-6 offset-3">
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