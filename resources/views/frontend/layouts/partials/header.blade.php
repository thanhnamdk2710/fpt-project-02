<header class="{{Request::is('/') ? '' : 'header-v4' }}">
    <div class="container-menu-desktop">
        <div class="wrap-menu-desktop {{Request::is('/') ? '' : 'how-shadow1' }}">
            <nav class="limiter-menu-desktop container">
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('images/logo.png')}}" alt="TN Fashion Shop Logo">
                </a>

                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="{{Request::is('/') ? 'active-menu' : ''}}">
                            <a href="{{route('home')}}">Trang chủ</a>
                        </li>

                        <li class="{{Request::is('shop') ? 'active-menu' : ''}}">
                            <a href="{{route('shop')}}">Cửa hàng</a>
                        </li>

                        <li class="{{Request::is('about') ? 'active-menu' : ''}}">
                            <a href="{{route('about')}}">Giới thiệu</a>
                        </li>

                        <li class="{{Request::is('contact') ? 'active-menu' : ''}}">
                            <a href="{{route('contact')}}">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    @if(Auth::check())
                        @if(Cart::session(Auth::user()->id)->getContent()->count() > 0)
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                                data-notify="{{Cart::session(Auth::user()->id)->getContent()->count()}}">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        @else
                            <a href="{{route('cart.index')}}"
                                class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </a>
                        @endif

                        <a class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 {{Auth::check() ? 'js-show-profile' : ''}}">
                            <i class="zmdi zmdi-accounts-alt"></i>
                            <span class="fs-18">{{Auth::user()->profile->name}}</span>
                        </a>
                    @else
                        <a href="{{route('login')}}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <i class="zmdi zmdi-accounts-alt"></i>
                        </a>
                    @endif
                </div>
            </nav>
        </div>
    </div>

    <div class="wrap-header-mobile">
        <div class="logo-mobile">
            <a href="{{route('home')}}" class="logo">
                <img src="{{asset('images/icon.png')}}" alt="TN Fashion Shop Logo">
            </a>
        </div>

        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            @if(Auth::check())
                @if(Cart::session(Auth::user()->id)->getContent()->count() > 0)
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                        data-notify="{{Cart::session(Auth::user()->id)->getContent()->count()}}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                @else
                    <a href="{{route('cart.index')}}"
                        class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </a>
                @endif

                <a class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 {{Auth::check() ? 'js-show-profile' : ''}}">
                    <i class="zmdi zmdi-accounts-alt"></i>
                    <span class="fs-18">{{Auth::user()->profile->name}}</span>
                </a>
            @else
                <a href="{{route('login')}}" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                    <i class="zmdi zmdi-accounts-alt"></i>
                </a>
            @endif
        </div>

        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li>
                <a href="{{route('home')}}">Trang chủ</a>
            </li>

            <li>
                <a href="{{route('shop')}}">Cửa hàng</a>
            </li>

            <li>
                <a href="{{route('about')}}">Giới thiệu</a>
            </li>

            <li>
                <a href="{{route('contact')}}">Liên lạc</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="{{asset('frontend/images/icons/icon-close2.png')}}" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Tìm kiếm...">
            </form>
        </div>
    </div>
</header>
