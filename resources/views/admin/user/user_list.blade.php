@extends('admin.dashboard.admin_layout',['pagename'=>'Staff List'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Staff List</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','staff')
@section('main-content')

<div class="align-middle p-0 m-0 container">

      <form method="POST" action="{{url('/admin/staff/search')}}" >
        @csrf
      <div class="row mb-3 ">
          <div class="col-lg-3 ms-0  pe-0">
              <input type="text" name="searchrole" placeholder="Search Staff Name" class="form-control" >
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
      <th>Staff Name</th>
      <th>Email</th>
      <th>Role Name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody >
    @foreach($staff as $data)
    <tr>
      
          <td>{{$data->name}}</td>
          <td>{{$data->email}}</td>
          <td>{{$data->rolename}}</td>
          
          <td>
          
           
         <form action="{{url('/admin/staff/'.$data->uuid.'/edit')}}" method="GET">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Edit">
         </form>
            
         <form action="{{url('/admin/staff',[$data->uuid])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Delete">
         </form>
    </tr>
    @endforeach
    
  </tbody>
</table>

@endsection