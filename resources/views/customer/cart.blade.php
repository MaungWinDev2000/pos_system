@extends('customer.page')

@section('content-class')
@section('content')

<!-- Start Hero Section -->
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      @if(auth()->guard('customer')->check())
                       @if(session()->has('cart'))
                          @foreach(session()->get('cart') as $item)
                              <tbody>
                            <tr>
                              <td class="product-thumbnail">
                                <img src="{{asset('upload/'.$item['image'])}}" alt="Image" class="img-fluid">
                              </td>
                              <td class="product-name">
                                <h2 class="h5 text-black">{{$item['name']}}</h2>
                              </td>
                              <td>{{$item['price']}}</td>
                              <td>
                                <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                  <div class="input-group-prepend">
                                    <button class="btn btn-outline-black " id="btn-minus" type="button">&minus;</button>
                                  </div>
                                  <input type="text" class="form-control text-center quantity-amount" value="{{$item['quantity']}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-black " type="button">&plus;</button>
                                  </div>
                                </div>
            
                              </td>
                              <td>{{$item['totalprice']}}</td>
                              <td><a href="#" class="btn btn-black btn-sm delete" data-product-id="{{ $item['uuid'] }}">X</a></td>
                            </tr>
                          </tbody>
                          @endforeach
                          @else
                        <tbody><tr></tr></tbody>
                        @endif
                      @endif
                    </table>
                    @if(!session()->has('cart'))
                    <div>
                      <h3 style="text-align: center;color:#f8b810;">Empty</h3>
                    </div>
                    @endif
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <!-- <div class="col-md-6 mb-3 mb-md-0">
                      <button class="btn btn-black btn-sm btn-block">Update Cart</button>
                    </div> -->
                    <!-- <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
                    </div> -->
                  </div>
                  <div class="row">
                    <!-- <div class="col-md-12">
                      <label class="text-black h4" for="coupon">Coupon</label>
                      <p>Enter your coupon code if you have one.</p>
                    </div> -->
                    <!-- <div class="col-md-8 mb-3 mb-md-0">
                      <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div> -->
                    <!-- <div class="col-md-4">
                      <button class="btn btn-black">Apply Coupon</button>
                    </div> -->
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <!-- <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div> 
                        <div class="col-md-6 text-right">
                          <strong class="text-black">$230.00</strong>
                        </div>
                      </div> -->
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                        <strong class="text-black" id="totaladdtocart">{{ calculateTotalPrice()}} MMK</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='{{ route('checkout') }}'">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @php
            function calculateTotalPrice() {
                $totalPrice = 0;
                if(session()->has('cart')) {
                    foreach(session()->get('cart') as $item) {
                        $totalPrice += $item['totalprice'];
                    }
                }
                return $totalPrice;
            }
          @endphp

@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
    });
    $('.delete').click(function(event) {
        event.preventDefault();
        
        var productId = $(this).data('product-id');
        var $deleteButton = $(this); // Store reference to the delete button
        console.log(productId);
        
        $.ajax({
            type:'GET',
            url: '{{ route("cart.remove") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'product_id': productId
            },
            success: function(response) {
                // Handle success, e.g., remove the product row from the table
                $deleteButton.closest('tr').remove();
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });
    });

    
    
});
</script>
@endsection

@endsection
@endsection