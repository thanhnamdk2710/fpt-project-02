@extends('frontend.layouts.master')

@section('content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92"
    style="background-image: url('{{asset('frontend/images/bg-01.jpg')}}');">
    <h2 class="ltext-105 cl0 txt-center">
        Giới thiệu
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Giới thiệu về chúng tôi
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        TN Fashion là một trong những thương hiệu thời trang phát triển vượt trội nhất
                        trong làng thời trang Việt trong những năm qua, chỉ một khoảng thời gian
                        ngắn hãng thời trang đã mở rộng ra toàn thành phố Đà Nẵng, đánh dấu bước phát
                        triển thần tốc và thổi một luồng gió mới vào thị trường thời trang Việt Nam.
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        Thời đại công nghệ thông tin hiện nay, có quá nhiều website thời trang để
                        quý khách hàng tham khảo, nhưng để tìm được nơi thật sự uy tín, an toàn thì
                        không phải dễ dàng. Thấu hiểu được điều đó, TN Fashion ra đời với một sứ mệnh
                        quan trọng mang đến cho người tiêu dùng nơi mua sắm Online đáng tin cậy
                        nhất, giá  cả phải chăng, phù hợp với yêu cầu của tất cả quý khách hàng.
                    </p>

                    <p class="stext-113 cl6 p-b-26">
                        Bạn có câu hỏi gì không? Hãy cho chúng tôi biết tại cửa hàng ở
                        số 137 Nguyễn thị Thập, Tp Đà Nẵng hoặc gọi cho chúng tôi theo số
                        (+334) 366 133
                    </p>
                </div>
            </div>

            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="{{asset('frontend/images/about-01.jpg')}}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">
                        Nhiệm vụ của chúng tôi
                    </h3>

                    <p class="stext-113 cl6 p-b-26">
                        Với phong cách phục vụ chuyên nghiệp, tận tình, chu đáo trong khâu chăm
                        sóc khách hàng, đồng thời luôn cập nhật xu hướng thời trang liên tục,
                        chia sẻ bí quyết, kinh nghiệm làm đẹp, mặc đẹp cho người tiêu dùng,
                        TN Fashion chính là nơi mua sắm tiện lợi, dễ dàng và an toàn nhất.
                    </p>

                    <div class="bor16 p-l-29 p-b-9 m-t-22">
                        <p class="stext-114 cl6 p-r-40 p-b-11">
                            Sản phẩm của TN Fashion đáp ứng được hầu hết các nhu cầu thiết thực
                            trong cuộc sống như: đến công sở, dạ tiệc, hội họp, du lịch, dạo
                            phố, cà phê, hẹn hò... giúp người tiêu dùng duy trì vẻ đẹp, luôn
                            tự tin là chính mình, toả sáng mọi lúc mọi nơi.
                        </p>

                        <span class="stext-111 cl8">
                            - Nguyễn Thành Nam
                        </span>
                    </div>
                </div>
            </div>

            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{asset('frontend/images/about-02.jpg')}}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
