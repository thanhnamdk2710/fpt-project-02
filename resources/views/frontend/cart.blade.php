@extends('frontend.layouts.master')

@section('content')
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Giỏ hàng
        </span>
    </div>
</div>

@if(count($items) > 0)
<div class="bg0 p-t-75">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                <h4 class="mtext-109 cl2 p-b-30">
                    Giỏ hàng hiện tại
                </h4>

                <div class="m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Sản phẩm</th>
                                <th class="column-2"></th>
                                <th class="column-3">Giá</th>
                                <th class="column-4">Số lượng</th>
                                <th class="column-5">Thành tiền</th>
                                <th class="column-5"></th>
                            </tr>

                            @foreach($items as $item)
                                <tr class="table_row">
                                    <td class="column-1">
                                        <form action="{{route('cart.delete', $item->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="how-itemcart1">
                                                <img src="{{asset('images/products/' . $item->attributes->image)}}"
                                                    width="100px">
                                            </button>

                                        </form>
                                    </td>
                                    <td class="column-2">{{$item->name}}</td>
                                    <td class="column-3">{{$item->price}} VNĐ</td>
                                    <form action="{{route('cart.update', $item->id)}}" method="post">
                                        @csrf

                                        <td class="column-4">
                                            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity"
                                                    value="{{$item->quantity}}">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="column-5">{{$item->price * $item->quantity}} VNĐ</td>
                                        <td class="column-5">
                                            <button type="submit" class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04">
                                                Cập nhật giỏ
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-12 col-xl-12 m-b-50">
                <form action="{{route('checkout')}}" method="post" class="bor10 p-lr-40 p-t-30 p-b-40 m-lr-0-xl">
                    @csrf

                    <h4 class="mtext-109 cl2 p-b-30">
                        Kiểm tra đặt hàng
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Tổng tiền:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                {{Cart::session(Auth::user()->id)->getSubTotal()}} VNĐ
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Thông tin khách hàng:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            @if ($errors->any())
                                <div class="alert alert-danger mt10">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    @foreach ($errors->all() as $error)
                                        <i class="glyphicon glyphicon-ban-circle alert-icon"></i>
                                        <strong>Oh snap!</strong> {{ $error }} <br>
                                    @endforeach
                                </div>
                            @endif

                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Tên khách hàng
                                </span>

                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <input type="text" name="name" value="{{Auth::user()->profile->name}}"
                                        class="stext-111 cl2 plh3 size-111 p-l-10 p-r-30">
                                </div>

                                <span class="stext-112 cl8">
                                    Điện thoại
                                </span>

                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <input type="text" name="phone" value="{{Auth::user()->profile->phone}}"
                                        class="stext-111 cl2 plh3 size-111 p-l-10 p-r-30">
                                </div>

                                <span class="stext-112 cl8">
                                    Địa chỉ
                                </span>

                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <input type="text" name="address" value="{{Auth::user()->profile->address}}"
                                        class="stext-111 cl2 plh3 size-111 p-l-10 p-r-30">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Tiến hành kiểm tra
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@if(count($orders) > 0)
<div class="bg0 p-t-75">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                <h4 class="mtext-109 cl2 p-b-30">
                    Sản phẩm đặt hàng
                </h4>

                <div class="m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">#Mã đơn hàng</th>
                                <th class="column-3">Ngày đặt hàng</th>
                                <th class="column-5">Tổng tiền</th>
                                <th class="column-3">Trạng thái</th>
                                <th class="column-3"></th>
                            </tr>

                            @foreach($orders as $order)
                                <tr class="table_order">
                                    <td class="column-1">{{$order->id}}</td>
                                    <td class="column-3">{{$order->created_at}}</td>
                                    <td class="column-5">{{$order->total}} VNĐ</td>

                                    @if($order->status == 1)
                                        <td class="column-3 badge badge-info">Đặt hàng</td>
                                    @elseif($order->status == 2)
                                        <td class="column-3 badge badge-warning">Giao hàng</td>
                                    @elseif($order->status == 3)
                                        <td class="column-3 badge badge-secondary">Đã huỷ</td>
                                    @else
                                        <td class="column-3 badge badge-success">Đã thành toán</td>
                                    @endif

                                    <td class="column-3">
                                        @if($order->status == 1)
                                            <form action="{{route('orders.cancel', $order->id)}}"
                                                    class="pull-left" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger sweet-4">
                                                    <i class="fa fa-cancel mr10"></i>Huỷ đơn hàng
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="bg0 p-t-75">
    <div class="container">
        <div class="alert alert-danger">Giỏ hàng chưa có sản phẩm nào</div>
    </div>
</div>
@endif

@endsection
