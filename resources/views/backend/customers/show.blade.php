@extends('backend.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content-inner">
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Customers</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Show Customer</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="{{asset('images/users/' . $customer->profile->avatar)}}" width="100%">
                            </div>
                            <div class="col-lg-9">
                                <div class="form-horizontal group-border">
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Name</label>
                                        <div class="col-lg-10 col-md-9">
                                            {{$customer->profile->name}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Email</label>
                                        <div class="col-lg-10 col-md-9">
                                            {{$customer->email}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Address</label>
                                        <div class="col-lg-10 col-md-9">
                                            {{$customer->profile->address}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label">Phone</label>
                                        <div class="col-lg-10 col-md-9">
                                            {{$customer->profile->phone}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 col-md-3 control-label" for="">Status</label>
                                        <div class="col-lg-10 col-md-9">
                                            @if($customer->status)
                                                <span class="label label-success ">Active</span>
                                            @else
                                                <span class="label label-danger">Unactive</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('customers.index')}}" class="btn btn-default pull-left mb10 mt10">
                            <i class="fa fa-arrow-left mr5"></i> Back
                        </a>
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
