@extends('admin.dashboard.admin_layout',['pagename'=>'Product List'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Product List</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','batch')
@section('main-content')

<div class="align-middle p-0 m-0 container">

      <form method="POST" action="{{url('/admin/product/search')}}" >
        @csrf
        <div class="row mb-3 ">
            <div class="col-lg-3 ms-0  pe-0">
                <input type="text" name="searchrole" placeholder="Search Product Code" class="form-control" >
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
      <th>Product Code</th>
      <th>Batch Code</th>
      <th>Product Name</th>
      <th>Description</th>
      <th>Product Price</th>
      <th>Product Qty</th>
      <th>Product Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody >
    @foreach($product as $data)
    <tr>
      
          <td>{{$data->item_code}}</td>
          <td>{{$data->batchcode}}</td>
          <td>{{$data->item_name}}</td>
          <td>{!! $data->description !!}</td>
          <td>{{$data->item_price}}</td>
          <td>{{$data->item_qty}}</td>
          <td><img src="{{asset('upload/'. $data->item_image)}}" alt="" width="50" height="50"></td>
       
          <td>
          
           
         <form action="{{url('/admin/product/'.$data->uuid.'/edit')}}" method="GET">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Edit">
         </form>
            
         <form action="{{url('/admin/product',[$data->uuid])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Delete">
         </form>
    </tr>
    @endforeach
    
  </tbody>
  
</table>

{{ $product->onEachSide(5)->links('vendor.pagination.bootstrap-5') }}


@endsection