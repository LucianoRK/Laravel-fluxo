<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Login - {{config('app.name')}}</title>
	<!-- ================== GOOGLE FONTS ==================-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">

	<!-- ======================= GLOBAL VENDOR STYLES ========================-->
	<link rel="stylesheet" href="{{asset('assets/css/vendor/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/metismenu/dist/metisMenu.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/switchery-npm/index.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">

	<!-- ======================= LINE AWESOME ICONS ===========================-->
	<link rel="stylesheet" href="{{asset('assets/css/icons/line-awesome.min.css')}}">

	<!-- ======================= DRIP ICONS ===================================-->
	<link rel="stylesheet" href="{{asset('assets/css/icons/dripicons.min.css')}}">

	<!-- ======================= MATERIAL DESIGN ICONIC FONTS =================-->
	<link rel="stylesheet" href="{{asset('assets/css/icons/material-design-iconic-font.min.css')}}">

	<!-- ======================= GLOBAL COMMON STYLES ============================-->
	<link rel="stylesheet" href="{{asset('assets/css/common/main.bundle.css')}}">

	<!-- ======================= LAYOUT TYPE ===========================-->
	<link rel="stylesheet" href="{{asset('public/assets/css/layouts/vertical/core/main.css')}}">

	<!-- ======================= MENU TYPE ===========================================-->
	<link rel="stylesheet" href="{{asset('public/assets/css/layouts/vertical/menu-type/default.css')}}">

	<!-- ======================= THEME COLOR STYLES ===========================-->
	<link rel="stylesheet" href="{{asset('assets/css/layouts/vertical/themes/theme-a.css')}}">

	<!-- ======================= reCAPTCHA  ===========================-->
    {!! htmlScriptTagJsApi([ 'action' => 'homepage' ]) !!}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
	<div class="container">
		<div class="sign-in-form">
			<div class="card">
				<div class="card-body">
                    <form action="{{ route('logar') }}" method="POST">
                        {{ csrf_field() }}
                    
						<a href="" class="brand text-center d-block m-b-20">
							<img src="{{asset('assets/img/qt-logo@2x.png')}}" alt="QuantumPro Logo" />
                        </a>

						<div class="form-group {{ $errors->has('login') ? 'has-error' : '' }}">
							<label for="inputText" class="sr-only"> Login </label>
                            <input type="text" id="inputText" class="form-control" name='login' value="{{ old('login') }}" placeholder="Usuário">
                            @if ($errors->has('login')) 
                                <h6> <span class="help-block"> {{ $errors->first('login') }} </span> </h6>
                            @endif

						</div>

						<div class="form-group {{ $errors->has('senha') ? 'has-error' : '' }}">
							<label for="inputPassword" class="sr-only"> Senha </label>
                            <input type="password" id="inputPassword" class="form-control" name='senha' value="{{ old('senha') }}" placeholder="Senha">
                            @if ($errors->has('senha')) 
                               <h6> <span class="help-block"> {{ $errors->first('senha') }} </span> </h6>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-rounded btn-floating btn-lg btn-block" id="logar"> Entrar </button>
					</form>
                </div>
            </div>
            @if (session('msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('msg') }}
                </div>
            @endif
		</div>
	</div>

	<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
	<script src="{{asset('assets/vendor/modernizr/modernizr.custom.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/vendor/js-storage/js.storage.js')}}"></script>
	<script src="{{asset('assets/vendor/js-cookie/src/js.cookie.js')}}"></script>
	<script src="{{asset('assets/vendor/pace/pace.js')}}"></script>
	<script src="{{asset('assets/vendor/metismenu/dist/metisMenu.js')}}"></script>
	<script src="{{asset('assets/vendor/switchery-npm/index.js')}}"></script>
	<script src="{{asset('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>

	<!-- ================== GLOBAL APP SCRIPTS ==================-->
	<script src="{{asset('assets/js/global/app.js')}}"></script>
	<script src="{{asset('assets/js/script.js')}}"></script>
	<script src="{{asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
</body>

</html>