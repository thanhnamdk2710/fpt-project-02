@extends('backend.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content-inner">
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Dashboard</h2>
                <span class="txt">Welcome to TN Fashion Management</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info tile panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">Today Sales</h4>
                    </div>
                    <div class="panel-body pt0">
                        <div class="progressbar-stats-1">
                            <div class="stats">
                                <i class="l-ecommerce-cart-content"></i>
                                <div id="visitor_number" class="stats-number" data-from="0" data-to="76">0</div>
                            </div>
                            <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                                <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="63"></div>
                            </div>
                            <div class="comparison">
                                <p class="mb0"><i class="fa fa-arrow-circle-o-up s20 mr5 pull-left"></i> 10% up from last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-success tile panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">Today Visitors</h4>
                    </div>
                    <div class="panel-body pt0">
                        <div class="progressbar-stats-1">
                            <div class="stats">
                                <i class="l-basic-geolocalize-05"></i>
                                <div class="stats-number" data-from="0" data-to="2547">0</div>
                            </div>
                            <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                                <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="86"></div>
                            </div>
                            <div class="comparison">
                                <p class="mb0"><i class="fa fa-arrow-circle-o-up s20 mr5 pull-left"></i> 2% up from last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-danger tile panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">Support Questions</h4>
                    </div>
                    <div class="panel-body pt0">
                        <div class="progressbar-stats-1">
                            <div class="stats">
                                <i class="l-basic-life-buoy"></i>
                                <div class="stats-number" data-from="0" data-to="78">0</div>
                            </div>
                            <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                                <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="35"></div>
                            </div>
                            <div class="comparison">
                                <p class="mb0"><i class="fa fa-arrow-circle-o-down s20 mr5 pull-left"></i> 2% down from last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default tile panelClose panelRefresh">
                    <div class="panel-heading">
                        <h4 class="panel-title">Profit this month</h4>
                    </div>
                    <div class="panel-body pt0">
                        <div class="progressbar-stats-1 dark">
                            <div class="stats">
                                <i class="l-banknote"></i>
                                <div class="stats-number money" data-from="0" data-to="24568">0</div>
                            </div>
                            <div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
                                <div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="55"></div>
                            </div>
                            <div class="comparison">
                                <p class="mb0"><i class="fa fa-arrow-circle-o-down s20 mr5 pull-left"></i> 1% down from last month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{asset('backend/js/libs/date.js')}}"></script>
    <script src="{{asset('backend/plugins/ui/waypoint/waypoints.js')}}"></script>
    <script src="{{asset('backend/plugins/ui/weather/skyicons.js')}}"></script>
    <script src="{{asset('backend/plugins/ui/notify/jquery.gritter.js')}}"></script>
    <script src="{{asset('backend/plugins/misc/vectormaps/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('backend/plugins/misc/vectormaps/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('backend/plugins/misc/countTo/jquery.countTo.js')}}"></script>
    <script src="{{asset('backend/js/jquery.dynamic.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script>
    <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
@endpush
