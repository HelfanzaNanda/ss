@extends('templates.admin')
@section('content')
    <section id="basic-form-layouts">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="basic-layout-form">Edit Travel</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">License Number</label>
                                                <input type="text" name="LicenseNumber" value="{{$data->license_number}}" readonly
                                                       class="form-control {{$errors->has('LicenseNumber')?'is-invalid':''}}">
                                                @if ($errors->has('LicenseNumber'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('LicenseNumber') }}</b></p>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput2">Nama Pemilik</label>
                                                <input type="text" id="projectinput2" class="form-control"
                                                       placeholder="Nama Pemilik" name="lname">
                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput2">Nama Usaha</label>
                                                <input type="text" id="projectinput2" class="form-control"
                                                       placeholder="Nama Usaha" name="lname">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput3">E-mail</label>
                                                <input type="text" id="projectinput3" class="form-control"
                                                       placeholder="E-mail" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput4">Contact Number</label>
                                                <input type="number" id="projectinput4" class="form-control"
                                                       placeholder="Phone" name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="projectinput8">Address</label>
                                                <textarea id="projectinput8" rows="5" class="form-control"
                                                          name="address" placeholder="Address"></textarea>
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