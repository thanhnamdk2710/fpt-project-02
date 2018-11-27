@extends('backend.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content-inner">
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Profile</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Change Proflie</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        @if (Session::has('success'))
                            <div class="alert alert-success fade in mt10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <i class="fa fa-check alert-icon"></i>
                                <strong>Well done!</strong> {{ Session::get('success') }}
                            </div>
                        @endif

                        <form class="form-horizontal group-border" enctype="multipart/form-data"
                            action="{{route('admin.profile')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-lg-3">
                                    <img src="{{asset('images/users/' . Auth::user()->profile->avatar)}}" width="100%">
                                    <div class="form-group">
                                        <input type="file" class="filestyle" name="avatar" data-buttonText="Find file"
                                            data-buttonName="btn-danger" data-iconName="fa fa-plus">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    @if ($errors->any())
                                        <div class="alert alert-danger fade in mt10">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                                &times;
                                            </button>
                                            @foreach ($errors->all() as $error)
                                                <i class="glyphicon glyphicon-ban-circle alert-icon "></i>
                                                <strong>Oh snap!</strong> {{ $error }} <br>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Current Password</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="password" class="form-control" name="current_password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">New Password</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Password</label>
                                        <div class="col-lg-10 col-md-9">
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success pull-right mb10 mt10">
                                <i class="fa fa-plus mr5"></i> Save
                            </button>
                            <a href="{{route('dashboard')}}" class="btn btn-default pull-left mb10 mt10">
                                <i class="fa fa-arrow-left mr5"></i> Back
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{asset('backend/plugins/forms/bootstrap-filestyle/bootstrap-filestyle.js')}}"></script>
    <script src="{{asset('backend/plugins/forms/autosize/jquery.autosize.js')}}"></script>
    <script src="{{asset('backend/plugins/forms/maxlength/bootstrap-maxlength.js')}}"></script>
    <script src="{{asset('backend/plugins/forms/checkall/jquery.checkAll.js')}}"></script>
    <script src="{{asset('backend/plugins/charts/sparklines/jquery.sparkline.js')}}"></script>
    <script src="{{asset('backend/plugins/ui/notify/jquery.gritter.js')}}"></script>
    <script src="{{asset('backend/plugins/ui/bootstrap-sweetalert/sweet-alert.js')}}"></script>

    <script src="{{asset('backend/js/jquery.dynamic.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script>
    <script src="{{asset('backend/js/pages/forms-basic.js')}}"></script>
    <script src="{{asset('backend/js/pages/notifications.js')}}"></script>
@endpush
