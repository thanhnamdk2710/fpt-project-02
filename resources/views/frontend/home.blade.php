@extends('frontend.layouts.master')

@section('content')
<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach($sliders as $slider)
                <div class="item-slick1" style="background-image: url({{asset('images/sliders/' . $slider->image)}});">
                    <div class="container h-full">
                        <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                            <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                <span class="ltext-101 cl2 respon2">
                                    {{$slider->note}}
                                </span>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                                <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                    {{$slider->title}}
                                </h2>
                            </div>

                            <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                <a href="{{route('shop')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                    Cửa hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            @foreach($banners as $banner)
                <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                    <div class="block1 wrap-pic-w">
                        <img src="{{asset('images/categories/' . $banner->image)}}">

                        <a href="{{route('shop')}}"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    {{$banner->name}}
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    {!!$banner->note!!}
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Cửa hàng
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Sản phẩm mới
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    Tất cả sản phẩm
                </button>

                @foreach($categories as $category)
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".category-{{$category->id}}">
                        {{$category->name}}
                    </button>
                @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Tìm kiếm
                </div>
            </div>

            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text"
                        name="search-product" placeholder="Tìm kiếm">
                </div>
            </div>
        </div>

        <div class="row isotope-grid">
            @foreach($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item category-{{$product->category_id}}">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{asset('images/products/' . $product->images[0]->url)}}">

                            <a href="#" data-id="{{$product->id}}"
                                class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal">
                                Chi tiết
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="{{route('product', $product->id)}}"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{$product->name}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{$product->price}} VNĐ
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="{{route('shop')}}"
                class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Xem thêm
            </a>
        </div>
    </div>
</section>

@foreach($products as $product)
    <div class="wrap-modal1 js-modal{{$product->id}} p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal" data-id="{{$product->id}}"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal" data-id="{{$product->id}}">
                    <img src="{{asset('frontend/images/icons/icon-close.png')}}">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    @foreach($product->images as $image)
                                        <div class="item-slick3" data-thumb="{{asset('images/products/' . $image->url)}}">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{asset('images/products/' . $image->url)}}" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                    href="{{asset('images/products/' . $image->url)}}">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                {{$product->name}}
                            </h4>

                            <span class="mtext-106 cl2">
                                {{$product->price}} VNĐ
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                {{$product->note}}
                            </p>

                            <div class="p-t-33">
                                <form action="{{route('cart.add')}}" method="post">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="name" value="{{$product->name}}">
                                    <input type="hidden" name="price" value="{{$product->price}}">
                                    <input type="hidden" name="image" value="{{$product->images[0]->url}}">

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Size
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select class="js-select2" name="size">
                                                    <option>Vui lòng chọn Size</option>
                                                    @foreach($product->sizes as $size)
                                                        <option value="{{$size->id}}">{{$size->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-203 flex-c-m respon6">
                                            Màu
                                        </div>

                                        <div class="size-204 respon6-next">
                                            <div class="rs1-select2 bor8 bg0">
                                                <select class="js-select2" name="color">
                                                    <option>Vui lòng chọn màu</option>
                                                    @foreach($product->colors as $color)
                                                        <option value="{{$color->id}}">{{$color->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex-w flex-r-m p-b-10">
                                        <div class="size-204 flex-w flex-m respon6-next">
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                    name="quantity" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>

                                            <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                                Thêm vào giỏ
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-show-modal').on('click',function(e){
                e.preventDefault();
                var id = $(this).attr("data-id");
                $('.js-modal' + id).addClass('show-modal1');
            });

            $('.js-hide-modal').on('click',function(){
                var id = $(this).attr("data-id");
                $('.js-modal' + id).removeClass('show-modal1');
            });
        });
    </script>
@endpush
