@extends('customer.page')
@section('product','active')
@section('content-class')
@section('content')

	<form action="{{ route('cart.add', ['product' => $product]) }}" method="POST" enctype="multipart/form-data">
	@csrf

	@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
	@endif
	<div class="container mt-5">
  <div class="row">
    <div class="col-md-5">
    <!-- Product Image with Enhanced UI -->
	<div class="image-container-detail">
		<img src="{{asset('upload/'.$product->item_image)}}" class="img-fluid product-thumbnail" alt="Product Image">
	</div>
    <!-- <div class="border shadow-sm rounded p-3">
        <img src="{{asset('upload/'.$product->item_image)}}" class="img-fluid" alt="Product Image">
    </div> -->
    </div>

    <div class="col-md-6 ms-5">
  <!-- Product Details without Card Border -->
  <div class="p-4 ">
    <h2>{{$product->item_name}}</h2>
	<h2 class="price_color">{{$product->item_price}} MMK</h2>
    <div>{!! $product->description !!}</div>
    
    
    <!-- Quantity with Plus and Minus Buttons -->
    <div class="col-auto">
	<ul class="list-inline pb-3">
		<li class="list-inline-item text-end pe-3">Quantity</li>
		<li class="list-inline-item">
			<div class="row align-items-center">
				<div class="col-auto">
					<span class="btn1 btn-primary btn-lg" id="btn-minus">-</span>
				</div>
				<div class="col-auto">
					<input type="hidden" name="product-quantity" id="product-quantity" value="{{ $product->item_qty }}">
					<input type="hidden" name="item_qty" id="item_qty" >
					@if($product->item_qty >=1)
					<span class="border rounded-pill border-secondary px-4 py-2"  id="var-value">1</span>
					@else
					<span class="border rounded-pill border-secondary px-4 py-2" id="var-value">1</span>
					@endif
				</div>
				<div class="col-auto">
					<span class="btn1 btn-primary btn-lg" id="btn-plus">+</span>
				</div>
			</div>
		</li>
	</ul>

	@if($product->item_qty < 1 )
	<h4 class="price_color">*** Out of Stock Quantity ***</h2>
	@endif
  
	</div>

		<!-- Add to Cart / Buy Now Buttons -->
		<div class="mt-4">
			@if(auth()->guard('customer')->check())
			<button class="btn btn-primary me-3">Add to Cart</button>
			<button class="btn btn-success">Buy Now</button>
			@else
			<a href="{{ url('/login') }}" class="btn btn-primary me-3">Add to Cart</a>
    		<a href="{{ url('/login') }}" class="btn btn-success">Buy Now</a>
			@endif
			</div>
		</div>
		</div>


	</div>
	</div>


	</form>

 

<!-- Related Products -->
<div class="container mt-5">
  <h3>Related Products</h3>
  <div class="untree_co-section product-section before-footer-section" style="white-space: nowrap;">
		    <div class="container">
		      	<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 mb-5 overflow-auto">

		      		<!-- Start Column 1 -->
                   @foreach($productlist as $data)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 " style="display: inline-block; min-width: 200px;">
						<a class="product-item" href="{{route('product.detail', ['uuid' => $data->uuid]) }}">
							<div class="image-container-related">
								<img src="{{asset('upload/'.$data->item_image)}}" class="img-fluid product-thumbnail" alt="Product Image">
							</div>
							<h3 class="product-title">{{$data->item_name}}</h3>
							<strong class="product-price">{{$data->item_price}} MMK</strong>

							<span class="icon-cross">
								<img src="{{asset('img/cross.svg')}}" class="img-fluid">
							</span>
						</a>
					</div> 
                    @endforeach
					<!-- End Column 1 -->
						
					

		      	</div>
		    </div>
		</div>
</div>

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<!-- <div class="sofa-img">
					<img src="images/sofa.png" alt="Image" class="img-fluid">
				</div> -->

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
		$(document).ready(function() {
			var quantity = parseInt($('#product-quantity').val());
			$('#item_qty').val(parseInt($('#var-value').text()));

			$('#btn-minus').click(function() {
				console.log("minus");
				var currentValue = parseInt($('#var-value').text());
				if (currentValue > 1) {
					$('#var-value').text(currentValue - 1);
					$('#item_qty').val(currentValue - 1);
				}
			});

			$('#btn-plus').click(function() {
				var currentValue = parseInt($('#var-value').text());
				if (currentValue < quantity) {
					$('#var-value').text(currentValue + 1);
					$('#item_qty').val(currentValue + 1);
				}
			});
		});
</script>
@endsection
@endsection
@endsection

