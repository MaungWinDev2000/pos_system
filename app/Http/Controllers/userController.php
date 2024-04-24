<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = User::all();

        return view('admin.user.user_list',compact("staff"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();

        return view('admin.user.user_create',compact("role"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::where('uuid',$request->roleuuid)->first();
        // dd($role->rolename);
        $user = new User;
        $user->name= $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_uuid = $request->roleuuid;
        $user->rolename = $role->rolename;
        $user->uuid =uniqid(); 
        $user->save();

        return redirect('/admin/staff');


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
        $staff = User::where('uuid',$uuid)->first();
        $role = Role::all();
        return view('admin.user.user_create',compact("staff","role"));
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
        // dd($request);
        $role = Role::where('uuid',$request->roleuuid)->first();
        $user = User::where('uuid',$uuid)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password !=null){
            $user->password = $request->password;
        }
        $user->role_uuid = $request->roleuuid;
        $user->rolename = $role->rolename;
        $user->save();

        return redirect('/admin/staff');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $user = User::where('uuid',$uuid)->first();
        $user->delete();
        return redirect('/admin/staff');
    }


    public function login(Request $request)
    {
        // dd($request);
        $input=$request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $login=array(
            'email'=>$input["email"],
            'password'=>$input["password"]
        );
        if(auth()->attempt($login))
        {
            $user=auth()->user();
            return redirect('/admin/dashboard');
        }
        else{
            return view('admin.dashboard.login');
        }
        
    }

    public function searchByStaff(Request $request){
       
        if($request->searchrole !=""){
            $staff=User::where('name','like','%'.$request->searchrole.'%')->get();
        }else{
            $staff = User::all();
        }

        return view('admin.user.user_list',compact("staff"));
    }

    public function logout(){
        Auth::logout(); // Logout the user
        return redirect()->intended('/admin');
    }
}
