@extends('frontend.layouts.master')

@section('content')
	<section class="bg0 p-t-60 p-b-55">
		<div class="container">
			<div class="flex-w flex-c">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="{{route('register')}}" method="post">
                        @csrf

						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Please Register Here
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
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name"
                                placeholder="Your Name">
							<div class="how-pos4 pointer-none">
                                <i class="zmdi zmdi-assignment-account"></i>
                            </div>
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                placeholder="Your Email Address">
                            <div class="how-pos4 pointer-none">
                                <i class="zmdi zmdi-email"></i>
                            </div>
                        </div>

						<div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password"
                                placeholder="Your Password">
                            <div class="how-pos4 pointer-none">
                                <i class="zmdi zmdi-lock"></i>
                            </div>
                        </div>

						<div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password_confirmation"
                                placeholder="Password Confirm">
                            <div class="how-pos4 pointer-none">
                                <i class="zmdi zmdi-lock"></i>
                            </div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" type="submit">
							Register
                        </button>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection
