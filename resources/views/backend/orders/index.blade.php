@extends('backend.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content-inner">
        <div id="page-header" class="clearfix">
            <div class="page-header">
                <h2>Orders</h2>
                <span class="txt">List orders</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            List Orders
                        </h4>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success fade in mt10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <i class="fa fa-check alert-icon"></i>
                                <strong>Well done!</strong> {{ Session::get('success') }}
                            </div>
                        @endif

                        <table align="center" id="basic-datatables" class="table table-striped table-bordered"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="per5">#ID</th>
                                    <th class="per20">Name</th>
                                    <th class="per10">Status</th>
                                    <th class="per15">Order Date</th>
                                    <th class="per20">Total</th>
                                    <th class="per30">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$order->user->profile->name}}</td>
                                        <td>
                                            @if($order->status == 1)
                                                <span class="label label-danger">Order</span>
                                            @elseif($order->status == 2)
                                                <span class="label label-warning">Shipping</span>
                                            @elseif($order->status == 3)
                                                <span class="label label-default">Cancel</span>
                                            @else
                                                <span class="label label-success">Done</span>
                                            @endif
                                        </td>
                                        <td>{{$order->created_at}}</td>
                                        <td class="text-right">{{$order->total}} VNĐ</td>
                                        <td>
                                            <a href="{{route('orders.show', $order->id)}}"
                                                class="btn btn-default pull-left mr5">
                                                <i class="fa fa-eye mr10"></i>Show
                                            </a>
                                            <form action="{{route('orders.update', $order->id)}}"
                                                class="pull-left mr5" method="post">
                                                @csrf
                                                @method('PUT')

                                                @if($order->status == 1)
                                                    <button type="submit"
                                                        class="btn btn-warning sweet-4">
                                                        <i class="fa fa-trash mr10"></i>Ship
                                                    </button>
                                                @elseif($order->status == 2)
                                                    <button type="submit" class="btn btn-success sweet-4">
                                                        <i class="fa fa-trash mr10"></i>Pay
                                                    </button>
                                                @endif
                                            </form>
                                            <form action="{{route('orders.destroy', $order->id)}}"
                                                    class="pull-left" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger sweet-4">
                                                    <i class="fa fa-trash mr10"></i>Delete
                                                </button>
                                            </form>
                                        </td>
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
@endsection

@push('scripts')
    <script src="{{asset('backend/plugins/tables/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('backend/plugins/tables/datatables/dataTables.tableTools.js')}}"></script>
    <script src="{{asset('backend/plugins/tables/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('backend/plugins/tables/datatables/dataTables.responsive.js')}}"></script>
    <script src="{{asset('backend/js/jquery.dynamic.js')}}"></script>
    <script src="{{asset('backend/js/main.js')}}"></script>
    <script src="{{asset('backend/js/pages/tables-data.js')}}"></script>
    <script src="{{asset('backend/js/pages/forms-advanced.js')}}"></script>
@endpush
