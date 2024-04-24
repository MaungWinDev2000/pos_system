@extends('admin.dashboard.admin_layout',['pagename'=>'Staff Create'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Staff Create</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','staff')
@section('main-content') 

<?php 
    $update=false;
    if(isset($staff))
    {
        $update=true;
    }
?>

        <form action="{{$update==true? url('/admin/staff',[$staff->uuid]):url('/admin/staff')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @if ($update ==true)
                @method('PATCH')
            @endif

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Staff Name</label>
            <input type="text" class="form-control" name="name" id="nn" value="{{$update==true?$staff->name : ""}}" placeholder="Enter Staff Name">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="nn" value="{{$update==true?$staff->email : ""}}" placeholder="Enter Email">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="text" class="form-control" name="password" id="nn" value="{{""}}" placeholder="Enter Password">
            </div>
            <label for="exampleFormControlInput1" class="form-label">Role Type</label>
            <select class="form-control m-bot15" name="roleuuid" id="roleSelect">
                <option value="{{$update==true?$staff->role_uuid : ""}}">{{$update==true?$staff->rolename : "SELECT RoleType"}}</option>
                @if($role->count() > 0)
                @foreach($role as $rtype)
                <option value="{{$rtype->uuid}}">{{$rtype->rolename}}</option>
                @endForeach
                @else
                No Record Found
                    @endif   
             </select>
        
            <div class="mb-3 mt-3">
            <button type="submit" class="submit btn btn-primary mb-3">{{$update==true? "Update":"Save"}}</button>
            </div>
        </form>

@endsection

<!-- <script>
    document.getElementById('roleSelect').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        if (selectedOption.value !== "") {
            var values = selectedOption.value.split(',');
            var uuid = values[0];
            var roleName = values[1];

             // Update hidden input fields with selected values
             document.getElementById('selectedRoleUUID').value = uuid;
            document.getElementById('selectedRoleName').value = roleName;
            
            console.log("UUID: " + uuid + ", RoleName: " + roleName);
            // You can do whatever you want with uuid and roleName here
        }
    });
</script> -->
