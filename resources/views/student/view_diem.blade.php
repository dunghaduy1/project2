<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tra cứu điểm</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('student/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('student/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('student/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('student/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('student/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('student/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('student/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('student/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('student/css/main.css')}}">
<!--===============================================================================================-->
	 <link rel="icon" href="https://www.bkacad.com/images/favicon.ico">
</head>
<body>


	<div class="container-contact100">

		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="{{ route('load_diem') }}" method="POST">
				{{ csrf_field() }}
			          
				<span class="contact100-form-title">
					<img src="{{asset('img/logo-admin.png')}}" alt="">Tra cứu điểm BKACAD
				</span>
				@if (Session::has('error'))
					    {{ Session::get('error') }}
					  @endif
				<div class="wrap-input100 validate-input" data-validate = "Nhập email : e@a.x">
					<input class="input100" type="text" name="email" placeholder="E-mail">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Nhập số điện thoại">
					<input class="input100" type="text" name="so_dien_thoai" placeholder="Số điện thoại">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							<i class="fa fa-paper-plane-o m-r-6" aria-hidden="true"></i>
							Xem
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="{{asset('student/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('student/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('student/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('student/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('student/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('student/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('student/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('student/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('student/js/main.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
