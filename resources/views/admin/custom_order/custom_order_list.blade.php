@extends('admin.dashboard.admin_layout',['pagename'=>'Custom Order List'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Custom Order List</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','batch')
@section('main-content')

<div class="align-middle p-0 m-0 container">

      <form method="GET" action="{{url('/admin/custom_order')}}" >
        @csrf
        <div class="row mb-3 ">
            <div class="col-lg-3 ms-0  pe-0">
                <input type="text" name="searchrole" placeholder="Search Customer Name" class="form-control" >
            </div>
            
            <div class="col-lg-3 ">
                  <button type="submit" class="btn btn-primary" >Search</button>
                </div>
        </div>
      </form>
</div>


<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Customer Name</th>
      <th>Customer Phone</th>
      <th>Description</th>
      <th>Status</th>
      <th>Action</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody >
    @foreach($custom_order as $data)
    <tr>
      
          <td>{{$data->firstname}} {{$data->lastname}}</td>
          <td>{{$data->phone}}</td>
          <td>{!! $data->description !!}</td>
          <td>{{$data->status}}</td>
          
             <td>
                <button type="button" class="detailform btn btn-link btn-rounded btn-sm fw-bold" data-uuid="{{$data->uuid}}">Detail</button>
            </td>


         <td>
        @if($data->status == "Pending")
        
        <button type="button" class="approve btn btn-link btn-rounded btn-sm fw-bold" data-uuid="{{$data->uuid}}">Approve</button>
         
        <button type="button" class="cancel btn btn-link btn-rounded btn-sm fw-bold" data-uuid="{{$data->uuid}}">Cancel</button>
        
         @else
         <form action="{{url('/admin/custom_order_form',[$data->uuid])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Delete">
         </form>
         @endif
         </td>
    </tr>
    @endforeach
    
  </tbody>
  
</table>

<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="detailContent"></div>
            </div>
        </div>
    </div>
</div>

{{ $custom_order->onEachSide(5)->links('vendor.pagination.bootstrap-5') }}

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Event handler for clicking the "Detail" button
        $(document).on('click', '.detailform', function() {
            var uuid = this.getAttribute('data-uuid');
        console.log(uuid); 
            $.ajax({
                type: 'GET',
                url: "{{ url('/admin/custom_order') }}/" + uuid,
                success: function(response) {
                    // console.log(response);
                    // Construct HTML content from response data
                    var htmlContent = "<ul>";
                    htmlContent += "<li>Customer Name: "+"<strong>" + response[0].firstname +" "+ response[0].lastname+"</strong>" + "</li>";
                    htmlContent += "<li>Phone: "+"<strong>"  + response[0].phone + "</strong>" +"</li>";
                    htmlContent += "<li>Weight: " +"<strong>" + response[0].weight + " lbs"+"</strong>"  + "</li>";
                    htmlContent += "<li>Height: "+"<strong>"  + response[0].height + " cm"+"</strong>" +"</li>";
                    htmlContent += "<li>Shoulder: "+"<strong>"  + response[0].shoulder+ " inches"+"</strong>"  + "</li>";
                    htmlContent += "<li>Bust: "+"<strong>"  + response[0].bust + " inches" +"</strong>" + "</li>";
                    htmlContent += "<li>Waist: "+"<strong>"  + response[0].waist+ " inches"+"</strong>"  + "</li>";
                    htmlContent += "<li>Hips: "+"<strong>"  + response[0].hips + " inches"+"</strong>"  +"</li>";
                    htmlContent += "<li>Thigh: "+"<strong>"  + response[0].thigh + " inches"+"</strong>"  +"</li>";
                    htmlContent += "<li>Leg Opening: "+"<strong>"  + response[0].leg_opening + " inches"+"</strong>" +"</li>";
                    
                    htmlContent += "<li>Description: " + response[0].description + "</li>";
                    // Add more lines as needed for other data
                    htmlContent += "</ul>";

                    $('#detailContent').html(htmlContent);
                    $('#detailModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // approve handler 
        $(document).on('click', '.approve', function() {
            var uuid = this.getAttribute('data-uuid');
            var status = "approve";
        console.log(uuid); 
            $.ajax({
                type: 'POST',
                url: "{{ url('/admin/custom_order/status') }}",
                data:{uuid:uuid,status:status},
                success: function(response) {
                    if (response.redirect) {
                        // Redirect to the received URL
                        window.location.href = response.redirect;
                    } else {
                        // No redirect received, handle the response as needed
                        // Construct HTML content from response data
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // cancel handler 

        $(document).on('click', '.cancel', function() {
            var uuid = this.getAttribute('data-uuid');
            var status = "cancel";
        console.log(uuid); 
            $.ajax({
                type: 'POST',
                url: "{{ url('/admin/custom_order/status') }}" ,
                data:{uuid:uuid,status:status},
                success: function(response) {
                    if (response.redirect) {
                        // Redirect to the received URL
                        window.location.href = response.redirect;
                    } else {
                        // No redirect received, handle the response as needed
                        // Construct HTML content from response data
                    } 
                 },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // Event handler for the cancel icon
        $('.modal .close').click(function() {
            $(this).closest('.modal').modal('hide');
        });
    });
</script>
@endsection

@endsection
