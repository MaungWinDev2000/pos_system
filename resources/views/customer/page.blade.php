<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{asset('css/tiny-slider.css')}}" rel="stylesheet">
		<link href="{{asset('css/style1.css')}}" rel="stylesheet">
		<title>POS System </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">POS<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item section @yield('home')">
							<a class="nav-link" href="{{url('/')}}">Home</a>
						</li>
						<li class="nav-item section @yield('product')">
							<a class="nav-link" href="{{url('/product')}}">Product</a></li>
						<!-- <li class="nav-item section @yield('')">
							<a class="nav-link" href="about.html">About us</a></li> -->
						<!-- <li class="nav-item section @yield('')">
							<a class="nav-link" href="services.html">Services</a></li> -->
						<!-- <li class="nav-item section @yield('')">
							<a class="nav-link" href="{{route('logout')}}">Logout</a></li> -->
						<li class="nav-item section @yield('')">
						@if(auth()->guard('customer')->check())
							<a class="nav-link" href="{{url('/custom_order/create')}}">Custom Form</a>
						@else
							<a class="nav-link" href="{{url('/login')}}">Custom Form</a>
						@endif
						</li>
							@if(!auth()->guard('customer')->check())
							<li class="nav-item section @yield('')">
							<a class="nav-link" href="{{url('/login')}}">Login</a></li>
							@endif
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<!-- <button type="button" data-bs-toggle="popover" title="Popover Title" data-bs-content="Popover Content" href="#" class="btn btn-light">Light</button> -->
						@if(auth()->guard('customer')->check())
						<li><a class="nav-link" href="{{url('/profile')}}"><img src="{{asset('img/user.svg')}}"></a></li>
        				@endif
						
						<li><a class="nav-link" href="{{url('/cart')}}"><img src="{{asset('img/cart.svg')}}"></a></li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<section class="section @yield('content-class')">
        @yield('content')
      </section>


		<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('js/tiny-slider.js')}}"></script>
		<script src="{{asset('js/custom.js')}}"></script>
		<script>
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  })
</script>

@yield('script')

	</body>

</html>
