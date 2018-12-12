@extends('backend.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content-inner">
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Orders</h2>
                <span class="txt">Order Detail</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{route('orders.index')}}" class="btn btn-info">
                                <i class="fa fa-arrow-left mr5"></i>Back
                            </a>
                        </h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <div class="row mt10">
                            <div class="col-lg-6 col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Infomation Customer</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-horizontal group-border stripped">
                                            <div class="form-group">
                                                <label class="col-lg-4 col-md-3 control-label">
                                                    Customer
                                                </label>
                                                <div class="col-lg-8 col-md-9">
                                                    <input type="text" class="form-control" disabled
                                                        value="{{$order->user->profile->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-md-3 control-label">
                                                    Address
                                                </label>
                                                <div class="col-lg-8 col-md-9">
                                                    <input type="text" class="form-control" disabled
                                                        value="{{$order->user->profile->address}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-md-3 control-label">
                                                    Phone
                                                </label>
                                                <div class="col-lg-8 col-md-9">
                                                    <input type="text" class="form-control" disabled
                                                        value="{{$order->user->profile->phone}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Infomation Order</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-horizontal group-border stripped">
                                            <div class="form-group">
                                                <label class="col-lg-4 col-md-3 control-label">
                                                    #Order ID
                                                </label>
                                                <div class="col-lg-8 col-md-9">
                                                    <input type="text" class="form-control" disabled
                                                        value="{{$order->id}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-md-3 control-label">
                                                    Total
                                                </label>
                                                <div class="col-lg-8 col-md-9">
                                                    <input type="text" class="form-control" disabled
                                                        value="{{$order->total}} VNĐ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-md-3 control-label">
                                                    Order Date
                                                </label>
                                                <div class="col-lg-8 col-md-9">
                                                    <input type="text" class="form-control" disabled
                                                        value="{{$order->created_at}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-4 col-md-3 control-label">
                                                    Status
                                                </label>
                                                <div class="col-lg-8 col-md-9">
                                                    @if($order->status == 1)
                                                        <span class="label label-danger">Order</span>
                                                    @elseif($order->status == 2)
                                                        <span class="label label-warning">Shipping</span>
                                                    @elseif($order->status == 3)
                                                        <span class="label label-default">Cancel</span>
                                                    @else
                                                        <span class="label label-success">Done</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <table align="center" class="table table-striped table-bordered"
                                    cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="per5">#ID</th>
                                            <th class="per5">Image</th>
                                            <th class="per20">Product</th>
                                            <th class="per20">Price</th>
                                            <th class="per15">Quantity</th>
                                            <th class="per20">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->order_details as $key => $item)
                                            <tr>
                                                <td>{{$item->product_id}}</td>
                                                <td>
                                                    <img width="100px"
                                                        src="{{asset('images/products/' . $item->product->images[0]->url)}}" alt="">
                                                </td>
                                                <td>{{$item->product->name}}</td>
                                                <td class="text-right">{{$item->product->price}} VNĐ</td>
                                                <td>{{$item->quantity}}</td>
                                                <td class="text-right">{{$item->product->price * $item->quantity}} VNĐ</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
