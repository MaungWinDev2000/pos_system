@extends('admin.dashboard.admin_layout',['pagename'=>'CustomerTitle Create'])
@section('breadcrumb')
    {{--  <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Customer Title Create</li>
        </ol>
    </nav>  --}}
@endsection
@section('content-class','customertitle')
@section('main-content')

<?php 
    $update=false;
    if(isset($role))
    {
        $update=true;
    }
?>

        <form action="{{$update==true? url('/admin/customertitle',[$role->uuid]):url('/admin/customertitle')}}" method="POST">
            @csrf
            @if ($update ==true)
                @method('PATCH')
            @endif

            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Cutomer Title Name</label>
            <input type="text" class="form-control" name="title" id="nn" value="{{$update==true?$role->rolename : '' }}" placeholder="Enter Title Name">
            </div>
            
            <div class="mb-3">
            <button type="submit" class="btn btn-primary mb-3">{{$update==true? "Update":"Save"}}</button>
            </div>
        </form>

@endsection