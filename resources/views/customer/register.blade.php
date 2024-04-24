<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Template</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" href="img/register.ico"/>
	
	<meta name="author" content="Yuli Petrilli">
    <meta name="description" content="Free register template made with Bootstrap 5">
	
	<!-- / Bootstrap Core -->	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- / FontAwesome -->	
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!-- / Custom style -->	
	<link rel="stylesheet" type="text/css" href="{{asset('css/register_style.css')}}">
</head>
<body>
<?php 
    $update=false;
    if(isset($customer))
    {
        $update=true;
    }
?>
<main>
	<div class="form-main-container">
		<div class="form-wrapper">
			<div class="form-header">
				<span class="form-title">
					Register to <strong>POS</strong>
				</span>
			</div>

			<form class="form-content" action="{{$update==true? url('/customer',[$customer->uuid]):url('/register')}}"  method="POST">

				@csrf

				@if ($update ==true)
						@method('PATCH')
				@endif

				<div class="input-wrapper">
					<select class="input-style form-control m-bot15" name="ctitle" id="roleSelect">
						<option value="{{$update==true?$customertitle->id : ""}}" class="text">{{$update ==true?$customertitle->title :"Select CustomerTitle"}}</option>
						@if($title->count() > 0)
						@foreach($title as $t)
						<option value="{{$t->id}}">{{$t->title}}</option>
						@endForeach
						@else
						No Record Found
							@endif   
					</select>
					<span class="input-style-focus"></span>
				</div>

				<div class="row1">
					<div class="input-wrapper1">
						<input class="input-style1" type="text" name="firstname" placeholder="FirstName" value="{{$update==true?$customer->firstname : ""}}" required>
						<span class="input-style-focus1"></span>
					</div>
					<div class="input-wrapper1">
						<input class="input-style1" type="text" name="lastname" placeholder="Lastname" value="{{$update==true?$customer->lastname : ""}}" required>
						<span class="input-style-focus1"></span>
					</div>
				</div>

				<div class="input-wrapper">
					<input class="input-style" type="date" name="dob" placeholder="Date of Birth" value="{{$update==true?$customer->dob : ""}}" required>
					<span class="input-style-focus"></span>
				</div>

				<div class="input-wrapper">
					<input class="input-style" type="tel" name="phone" placeholder="Phone Number" value="{{$update==true?$customer->phone : ""}}" required>
					<span class="input-style-focus"></span>
				</div>

				<div class="input-wrapper">
					<input class="input-style" type="email" name="email" placeholder="Email" value="{{$update==true?$customer->email : ""}}" required>
					<span class="input-style-focus"></span>
				</div>
				
				<div class="input-wrapper">
                    <div class="input-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" id="password"  required>
                        <span class="form-control-focus"></span>
                        <div class="input-group-addon" onclick="passwordVisibility();">
                            <i class="fa fa-eye-slash " id="hidePass"></i>
                            <i class="fa fa-eye d-none" id="showPass"></i>
                        </div>
                    </div>
                </div>
				
				<!-- <div class="input-wrapper">
					<input class="form-control" type="password" placeholder="Repeat Password" id="repeatPassword" required>
					<span class="input-style-focus"></span>
				</div> -->
				
				<div class="checkbox-wrapper mt-4">
					<input type="checkbox" class="checkbox-style" id="checkbox" name="remember-me" required>
					<label class="label-checkbox-style" for="checkbox">
						I agree with terms and conditions
					</label>
				</div>
			 
				<button class="button-style w-100">
					{{ $update==true? "Update":"Register"}}
				</button>
				
				@if($update !=true)
					<p class="txt-style1 mt-5">Already a member? <a class="txt-style2" href="#"><strong>Login</strong></a></p>
				
				@endif
			</form>
		</div>
	</div>
</main>

<script src="{{asset('js/password-visibility.js')}}"></script>

</body>
</html>