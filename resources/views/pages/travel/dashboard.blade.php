@extends('templates.travel')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title mb-0">Data Travel</h3>
        </div>
    </div>
    <div class="content-body">
        <!--stats-->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left w-100">
                                    <h3 class="primary">78%</h3>
                                    <span>New Session</span>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-user-plus primary font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-1 mb-0">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/stats-->
    </div>
@endsection