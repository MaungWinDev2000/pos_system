<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Template</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" href="img/login.ico"/>
    
	<meta name="author" content="Yuli Petrilli">
    <meta name="description" content="Free login template made with Bootstrap 5">
	
	<!-- / Bootstrap Core -->	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- / FontAwesome -->	
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!-- / Custom style -->	
	<link rel="stylesheet" type="text/css" href="{{asset('css/login_style.css')}}">
</head>
<body>
	
<main>
	<div class="form-main-container">
		<div class="form-wrapper">
			<div class="form-header">
				<span class="form-title">
					Login to <strong>POS</strong>
				</span>
			</div>

			<form class="form-content" action="{{url('/login/data')}}" method="POST">
				@csrf

				<div class="input-wrapper">
					<input class="input-style" type="text" name="email" placeholder="Username" required>
					<span class="input-style-focus"></span>
				</div>

				<div class="input-wrapper">
                    <div class="input-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" id="password" required>
                        <span class="form-control-focus"></span>
                        <div class="input-group-addon" onclick="passwordVisibility();">
                            <i class="fa fa-eye-slash " id="hidePass"></i>
                            <i class="fa fa-eye d-none" id="showPass"></i>
                        </div>
                    </div>
                </div>
			 
				<button class="button-style w-100">
					Login
				</button>

				<div class="checkbox-wrapper mt-4">
					<input type="checkbox" class="checkbox-style" id="checkbox" name="remember-me">
					<label class="label-checkbox-style" for="checkbox">
						Remember me
					</label>

					<a href="#" class="txt-style2">
						<strong>Forgot your password?</strong>
					</a>
				</div>
				
				<p class="txt-style1 mt-5">Not a member yet? <a class="txt-style2" href="{{url('/register/create')}}"><strong>Register</strong></a></p>
			</form>
		</div>
	</div>
</main>

<script src="{{asset('js/password-visibility.js')}}"></script>

</body>
</html>