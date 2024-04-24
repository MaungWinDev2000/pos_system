@extends('admin.dashboard.admin_layout',['pagename'=>'Batch List'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Batch List</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','batch')
@section('main-content')


<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Batch Code</th>
      <th>ManufacturedDate</th>
      <th>Batch Quantity</th>
      <th>Batch Remark</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody >
    @foreach($batch as $data)
    <tr>
      
          <td>{{$data->batchcode}}</td>
          <td>{{$data->manufacturedDate}}</td>
          <td>{{$data->batchqty}}</td>
          <td>{{$data->batchremark}}</td>
          
          <td>
          
           
         <form action="{{url('/admin/batch/'.$data->id.'/edit')}}" method="GET">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Edit">
         </form>
            
         <form action="{{url('/admin/batch',[$data->id])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Delete">
         </form>
    </tr>
    @endforeach
    
  </tbody>
</table>

@endsection