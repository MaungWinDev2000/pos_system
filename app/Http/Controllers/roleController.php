<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\role;
use Illuminate\Support\Facades\DB;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('admin.role.role_list',compact("role"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.role_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $role = new Role;
        $role->rolename = $request->rolename;
        $role->uuid = uniqid();
        $role->save();
        
        return redirect('/admin/role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $role = Role::where('uuid',$uuid)->first();
        return view('admin.role.role_create',compact("role"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $role = Role::where('uuid',$uuid)->first();
        $role->rolename = $request->rolename;
        $role->save();

        return redirect('/admin/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $role = Role::where('uuid',$uuid)->first();
        $role->delete();

        return redirect('/admin/role');

    }

    public function searchByRole(Request $request){
       
        if($request->searchrole !=""){
            $role=Role::where('rolename','like','%'.$request->searchrole.'%')->get();
        }else{
            $role = Role::all();
        }

        return view('admin.role.role_list',compact("role"));
    }
}
