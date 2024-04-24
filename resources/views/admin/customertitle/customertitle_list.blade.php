@extends('admin.dashboard.admin_layout',['pagename'=>'Customer Title List'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Customer Title List</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','customertitle')
@section('main-content')


<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Title</th>
      <!-- <th>Description</th> -->
      <th>Action</th>
    </tr>
  </thead>
  <tbody >
    @foreach($title as $data)
    <tr>
      
          <td>{{$data->title}}</td>
          <!-- <td>{{$data->description}}</td> -->
          
          <td>
          
           
         <form action="{{url('/admin/customertitle/'.$data->id.'/edit')}}" method="GET">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Edit">
         </form>
            
         <form action="{{url('/admin/customertitle',[$data->id])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Delete">
         </form>
    </tr>
    @endforeach
    
  </tbody>
</table>

@endsection