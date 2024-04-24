@extends('admin.dashboard.admin_layout',['pagename'=>'Role List'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Role List</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','role')
@section('main-content')

<div class="align-middle p-0 m-0 container">

      <form method="POST" action="{{url('/admin/role/search')}}" >
        @csrf
      <div class="row mb-3 ">
          <div class="col-lg-3 ms-0  pe-0">
              <input type="text" name="searchrole" placeholder="Search Role Name" class="form-control" >
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
      <th>Role Name</th>
      <!-- <th>Description</th> -->
      <th>Action</th>
    </tr>
  </thead>
  <tbody >
    @foreach($role as $data)
    <tr>
      
          <td>{{$data->rolename}}</td>
          <!-- <td>{{$data->description}}</td> -->
          
          <td>
          
           
         <form action="{{url('/admin/role/'.$data->uuid.'/edit')}}" method="GET">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Edit">
         </form>
            
         <form action="{{url('/admin/role',[$data->uuid])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE"/>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="submit" class="edit btn btn-link btn-rounded btn-sm fw-bold" value="Delete">
         </form>
    </tr>
    @endforeach
    
  </tbody>
</table>

@endsection