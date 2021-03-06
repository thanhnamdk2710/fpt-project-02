@extends('frontend.layouts.master')

@section('content')
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{asset('frontend/images/bg-01.jpg')}}');">
		<h2 class="ltext-105 cl0 txt-center">
			Liên hệ
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="{{route('feedback')}}" method="post">
                        @csrf

						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Gửi tin nhắn cho chúng tôi
                        </h4>

                        @if ($errors->any())
                            <div class="alert alert-danger mt10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                @foreach ($errors->all() as $error)
                                    <i class="glyphicon glyphicon-ban-circle alert-icon "></i>
                                    <strong>Oh snap!</strong> {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif

                        @if (Session::has('success'))
                            <div class="alert alert-success mt10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <i class="fa fa-check alert-icon"></i>
                                <strong>Well done!</strong> {{ Session::get('success') }}
                            </div>
                        @endif

						<div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                placeholder="Địa chỉ Email của bạn">
                            <div class="how-pos4 pointer-none">
                                <i class="zmdi zmdi-email"></i>
                            </div>
						</div>

						<div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25"
                            name="content" placeholder="Làm sao chúng tôi có thể giúp đỡ bạn?"></textarea>
						</div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer"
                            type="submit">
							Gửi
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Địa chỉ
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								137 Nguyễn Thị Thập, Hòa Minh, Liên Chiểu, Đà Nẵng
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Nói chuyện với chúng tôi
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+334 366 133
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Hỗ trọ bán hàng
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								tnfashion@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.806267423725!2d108.16818611423213!3d16.075539988877004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218e6e0975b07%3A0xcaff29dfb73f0ac!2zVHLGsOG7nW5nIMSR4bqhaSBo4buNYyBGUFQgxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1542712512936"
            width="100%" height="390" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
@endsection
