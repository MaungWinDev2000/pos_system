@extends('admin.dashboard.admin_layout',['pagename'=>'Batch Create'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Batch Create</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','batch')
@section('main-content')

<?php 
    $update=false;
    if(isset($role))
    {
        $update=true;
    }
?>

        <form action="{{$update==true? url('/admin/batch',[$role->uuid]):url('/admin/batch')}}" method="POST">
            @csrf
            @if ($update ==true)
                @method('PATCH')
            @endif

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Manufacture Date</label>
            <input type="text" class="form-control" name="mdate" id="nn" placeholder="Enter Year" value="{{$update==true?$role->rolename : '' }}">
            </div>

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Batch Remark</label>
            <input type="text" class="form-control" name="bremark" id="nn" value="{{$update==true?$role->rolename : '' }}">
            </div>
            
            <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">{{$update==true? "Update":"Save"}}</button>
            </div>
        </form>

@endsection