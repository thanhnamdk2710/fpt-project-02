@extends('backend.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content-inner">
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Feedback</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Read Feedback</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form class="form-horizontal group-border" enctype="multipart/form-data"
                            action="{{route('feedback.update', $feedback->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group {{$errors->first('name') ? 'has-error' : ''}}">
                                <label class="col-lg-2 col-md-3 control-label">Email</label>
                                <div class="col-lg-10 col-md-9">
                                    {{$feedback->email}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">Content</label>
                                <div class="col-lg-10 col-md-9">
                                    {{$feedback->content}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">Status</label>
                                <div class="col-lg-10 col-md-9">
                                    @if($feedback->status)
                                        <span class="label label-danger">Unread</span>
                                    @else
                                        <span class="label label-success">Read</span>
                                    @endif
                                </div>
                            </div>
                            @if($feedback->status)
                                <button type="submit" class="btn btn-success pull-right mb10 mt10">
                                    <i class="fa fa-plus mr5"></i> Read
                                </button>
                            @endif
                            <a href="{{route('feedback.index')}}" class="btn btn-default pull-left mb10 mt10">
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
