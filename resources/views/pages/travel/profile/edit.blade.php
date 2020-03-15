@extends('templates.travel')
@section('content')
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- users edit start -->
        <section class="users-edit">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <span class="d-none d-sm-block"><i class="fa fa-user"></i>&nbsp;Edit Profile</span>
                        <div class="dropdown-divider"></div>
                        <div class="tab-content">
                            <div>
                                <!-- users edit media object start -->
                                <div class="media mb-2">
                                    <a class="mr-2" href="#">
                                        <img src="{{asset('assets/app-assets/images/portrait/small/avatar-s-26.png')}}"
                                             alt="users avatar"
                                             class="users-avatar-shadow rounded-circle" height="64" width="64">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Avatar</h4>
                                        <div class="col-12 px-0 d-flex">
                                            <a href="#" class="btn btn-sm btn-primary mr-25">Change</a>
                                            <a href="#" class="btn btn-sm btn-secondary">Reset</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- users edit media object ends -->
                                <!-- users edit account form start -->
                                <form novalidate>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">

                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>License Number</label>
                                                    <input type="text" class="form-control" readonly value="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Pemilik Usaha</label>
                                                    <input type="text" class="form-control" placeholder="Name"
                                                           value="Dean Stanley" required
                                                           data-validation-required-message="This name field is required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Nama Usaha</label>
                                                    <input type="text" class="form-control"
                                                           value="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>E-mail</label>
                                                    <input type="email" class="form-control" placeholder="Email"
                                                           value="deanstanley@gmail.com" required
                                                           data-validation-required-message="This email field is required">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input type="number" class="form-control" placeholder="Company name">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit"
                                                    class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                                changes
                                            </button>
                                            <button type="reset" class="btn btn-light">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- users edit account form ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- users edit ends -->
    </div>
@endsection