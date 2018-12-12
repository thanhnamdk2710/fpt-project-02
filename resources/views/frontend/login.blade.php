@extends('frontend.layouts.master')

@section('content')
	<section class="bg0 p-t-60 p-b-55">
		<div class="container">
			<div class="flex-w flex-c">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="{{route('login')}}" method="post">
                        @csrf

						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Đăng nhập tại đây
                        </h4>

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

                        @if (Session::has('success'))
                            <div class="alert alert-success mt10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <i class="fa fa-check alert-icon"></i>
                                <strong>Well done!</strong> {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger mt10">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                <i class="glyphicon glyphicon-ban-circle alert-icon"></i>
                                <strong>Oh snap!</strong> {{ Session::get('error') }}
                            </div>
                        @endif

						<div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                placeholder="Địa chỉ Email của bạn">
							<div class="how-pos4 pointer-none">
                                <i class="zmdi zmdi-email"></i>
                            </div>
                        </div>

						<div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password"
                                placeholder="Mật khẩu của bạn">
                                <div class="how-pos4 pointer-none">
                                    <i class="zmdi zmdi-lock"></i>
                                </div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
							Đăng nhập
                        </button>

                        <a href="{{route('register')}}" class="m-t-20 txt-center dis-block">
                            Tạo tài khoản của bạn!!!
                        </a>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection
