@extends('customer.page')

@section('content-class')
@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Profile</h1>
                    @if(auth()->guard('customer')->check())
                        <h4><p>Name : {{$customerdata[0]->title}}. {{ $customerdata[0]->firstname }} {{ $customerdata[0]->lastname }} </p></h4>
                        <h4><p>Email : {{ $customerdata[0]->email }}</p></h4>
                        <h4><p>Phone Number : {{ $customerdata[0]->phone }}</p></h4>
                        <p>
                        
                        <a href="#" onclick="editProfile('{{ $customerdata[0]->uuid }}')" class="btn btn-secondary me-2">Edit Profile</a>
                        <a href="{{route('logout')}}" class="btn btn-white-outline">Logout</a></p>
                        <!-- <button class="btn  py-3 " onclick="window.location='{{ route('checkout') }}'">Proceed To Checkout</button> -->

                        <!-- Add more user information fields as needed -->
                    @else
                        <p>Please log in to view user information.</p>
                    @endif
                </div>
            </div>
            <div class="col-lg-7">
                <!-- Add additional content or functionality here -->
            </div>
        </div>
    </div>
</div>

		<!-- End Hero Section -->

    <!-- Start Tabs Section -->
<div class="container mt-5">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="order-details-tab" data-bs-toggle="tab" data-bs-target="#order-details" type="button" role="tab" aria-controls="order-details" aria-selected="true">Order List</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="order-history-tab" data-bs-toggle="tab" data-bs-target="#order-history" type="button" role="tab" aria-controls="order-history" aria-selected="false">Custom Order</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="order-details" role="tabpanel" aria-labelledby="order-details-tab">
            <!-- Order Details Form -->
            <table class="table">
                      <thead>
                        <tr>
                          <th class="">Product Code</th>
                          <th>Product Name</th>
                          <th class="">Quantity</th>
                          <th class="">Price</th>
                          
                        </tr>
                      </thead>
                      @foreach($order as $data)
                      <tbody>
                        <tr>
                            <td>{{$data->item_code}}</td>
                            <td>{{$data->item_name}}</td>
                            <td>{{$data->order_qty}}</td>
                            <td>{{$data->price}}</td>
                        </tr>
                        
                       </tbody> 
                      @endforeach
            </table>
        </div>
        <div class="tab-pane fade" id="order-history" role="tabpanel" aria-labelledby="order-history-tab">
            <!-- Order History Content -->
            <!-- Order Details Form -->
            <table class="table">
                      <thead>
                        <tr>
                          <th class="">Weight (lbs)</th>
                          <th>Height (cm)</th>
                          <th class="">Shoulder (inches)</th>
                          <th class="">Bust (inches)</th>
                          <th>Waist (inches)</th>
                          <th>Hips (inches)</th>
                          <th>Thigh (inches)</th>
                          <th>Leg_Opening (inches)</th>
                          <th>Phone Number</th>
                          <th>Description</th>
                          <th>Status</th>
                          
                        </tr>
                      </thead>
                      @foreach($custom_order as $data)
                      <tbody>
                        <tr>
                            <td>{{$data->weight}}</td>
                            <td>{{$data->height}}</td>
                            <td>{{$data->shoulder}}</td>
                            <td>{{$data->bust}}</td>
                            <td>{{$data->waist}}</td>
                            <td>{{$data->hips}}</td>
                            <td>{{$data->thigh}}</td>
                            <td>{{$data->leg_opening}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{!! $data->description !!}</td>
                            <td class="status">{{$data->status}}</td>
        
                        </tr>
                        
                       </tbody> 
                      @endforeach
            </table>
        </div>
    </div>
</div>
<!-- End Tabs Section -->


@section('script')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function editProfile(uuid) {
        // Construct the URL with the uuid parameter
        var editUrl = "{{ url('/customer') }}" + '/' + uuid + '/edit';
        // Redirect to the constructed URL
        window.location.href = editUrl;
    }
$(document).ready(function() {

    function editProfile(uuid) {
        // Construct the URL with the uuid parameter
        var editUrl = "{{ url('/customer') }}" + '/' + uuid + '/edit';
        // Redirect to the constructed URL
        window.location.href = editUrl;
    }

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