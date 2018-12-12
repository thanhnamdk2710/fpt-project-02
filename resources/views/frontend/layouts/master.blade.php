<!DOCTYPE html>
<html lang="en">
<head>
	<title>TN Fashion Shop || Mang thời trang đến với mọi người</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/icon.png')}}" type="image/png">

    @include('frontend.layouts.partials.styles')
</head>
<body class="animsition">

	@include('frontend.layouts.partials.header')

    @if(Auth::check())
        @if(Cart::session(Auth::user()->id)->getContent()->count() > 0)
            <div class="wrap-header-cart js-panel-cart">
                <div class="s-full js-hide-cart"></div>

                <div class="header-cart flex-col-l p-l-65 p-r-25">
                    <div class="header-cart-title flex-w flex-sb-m p-b-8">
                        <span class="mtext-103 cl2">
                            Giỏ hàng của bạn
                        </span>

                        <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                            <i class="zmdi zmdi-close"></i>
                        </div>
                    </div>

                    <div class="header-cart-content flex-w js-pscroll">
                        <ul class="header-cart-wrapitem w-full">
                            @foreach(Cart::session(Auth::user()->id)->getContent() as $item)
                                <li class="header-cart-item flex-w flex-t m-b-12">
                                    <div class="header-cart-item-img">
                                        <img src="{{asset('images/products/' . $item->attributes->image)}}" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt p-t-8">
                                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                            {{$item->name}}
                                        </a>

                                        <span class="header-cart-item-info">
                                            {{$item->quantity}} x {{$item->price}} VNĐ
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="w-full">
                            <div class="header-cart-total w-full p-tb-40">
                                Tổng tiền: $ {{Cart::session(Auth::user()->id)->getSubTotal()}}
                            </div>

                            <div class="header-cart-buttons flex-w w-full">
                                <a href="{{route('cart.index')}}"
                                    class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                                    Xem giỏ hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Profile -->
        <div class="wrap-header-cart js-panel-profile">
            <div class="s-full js-hide-profile"></div>

            <div class="header-cart flex-col-l p-l-65 p-r-25">
                <div class="header-cart-title flex-w flex-sb-m p-b-8">
                    <span class="mtext-103 cl2">
                        Thông tin cá nhân
                    </span>

                    <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-profile">
                        <i class="zmdi zmdi-close"></i>
                    </div>
                </div>

                <div class="header-cart-content flex-w js-pscroll">
                    <ul class="header-cart-wrapitem w-full">
                        <div class="wrap-pic-w-50 txt-center">
                            @if(Auth::user()->profile->avatar)
                                <img src="{{asset('images/users/' . Auth::user()->profile->avatar)}}">
                            @else
                                <img src="{{asset('images/avatar.png')}}">
                            @endif
                        </div>

                        <li class="flex-w flex-t m-b-12 m-t-20">
                            <strong class="m-r-10">Tên:</strong> <span>{{Auth::user()->profile->name}}</span>
                        </li>
                        <li class="flex-w flex-t m-b-12">
                            <strong class="m-r-10">Email:</strong> <span>{{Auth::user()->email}}</span>
                        </li>
                        <li class="flex-w flex-t m-b-12">
                            <strong class="m-r-10">Điện thoại:</strong> <span>{{Auth::user()->profile->phone}}</span>
                        </li>
                        <li class="flex-w flex-t m-b-12">
                            <strong class="m-r-10">Địa chỉ:</strong> <span>{{Auth::user()->profile->address}}</span>
                        </li>
                    </ul>

                    <div class="w-full">
                        <div class="header-cart-buttons flex-c w-full">
                            <a href="{{route('logout')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                Đăng xuất
                            </a>
                            <div class="js-show-setting js-hide-profile pointer flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                Cập nhật
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Setting -->
        <div class="wrap-header-cart js-panel-setting">
            <div class="s-full js-hide-setting"></div>

            <div class="header-cart flex-col-l p-l-65 p-r-25">
                <div class="header-cart-title flex-w flex-sb-m">
                    <span class="mtext-103 cl2">
                        Cập nhật thông tin
                    </span>

                    <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-setting">
                        <i class="zmdi zmdi-close"></i>
                    </div>
                </div>

                <div class="header-cart-content flex-w js-pscroll">
                    <form action="{{route('profile')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <ul class="header-cart-wrapitem w-full">
                            <div class="wrap-pic-w-50 txt-center m-b-5">
                                @if(Auth::user()->profile->avatar)
                                    <img src="{{asset('images/users/' . Auth::user()->profile->avatar)}}">
                                @else
                                    <img src="{{asset('images/avatar.png')}}">
                                @endif
                            </div>

                            <input class="stext-111 cl2 plh3 size-111 p-l-62 p-r-30" type="file"
                                name="avatar">

                            <div class="bor8 m-b-10 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-111 p-l-62 p-r-30" type="text"
                                    name="name" value="{{Auth::user()->profile->name}}">
                                <div class="how-pos4 pointer-none">
                                    <i class="zmdi zmdi-assignment-account"></i>
                                </div>
                            </div>

                            <div class="bor8 m-b-10 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-111 p-l-62 p-r-30" type="text"
                                    name="phone" value="{{Auth::user()->profile->phone}}">
                                <div class="how-pos4 pointer-none">
                                    <i class="zmdi zmdi-phone"></i>
                                </div>
                            </div>

                            <div class="bor8 m-b-10 how-pos4-parent">
                                <input class="stext-111 cl2 plh3 size-111 p-l-62 p-r-30" type="text"
                                    name="address" value="{{Auth::user()->profile->address}}">
                                <div class="how-pos4 pointer-none">
                                    <i class="zmdi zmdi-pin"></i>
                                </div>
                            </div>
                        </ul>

                        <div class="w-full">
                            <div class="header-cart-buttons flex-c w-full">
                                <button type="submit" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                                    Cập nhật
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endif


	@yield("content")


    @include('frontend.layouts.partials.footer')


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

    @include('frontend.layouts.partials.scripts')

    @stack('scripts')
</body>
</html>
