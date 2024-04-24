<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerTitle;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = CustomerTitle::all();
        return view('customer.register',compact('title'));
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
        $customer = new Customer;
        $customer->customertitle = $request->ctitle;
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->dob = $request->dob;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->uuid = uniqid();
        $customer->save();

        return redirect('/login');
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
    public function edit($id)
    {
        $customer = Customer::where('uuid',$id)->first();
    
        // dd($customer->password);
        $customertitle = CustomerTitle::where('id',$customer->customertitle)->first();
        $title = CustomerTitle::all();
        return view('customer.register',compact('title','customer','customertitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);

        $customer = Customer::where('uuid',$id)->first();
        $customer->customertitle = $request->ctitle;
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->dob = $request->dob;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->save();

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $customer = Customer::where('uuid',$uuid)->first();
        $user->delete();
        return redirect('/admin/customerlist');
        
    }

    public function logincreate()
    {
        return view('customer.login');
    }

    public function login(Request $request){
        // dd($request);

        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $login = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ];
        if(Auth::guard('customer')->attempt($login))
        {
            // $user=auth()->customer();
            return redirect()->intended('/');
        }
        else{
            return redirect()->back()->withErrors(['phone' => 'Invalid phone number or password']);;
        }
    }

    public function logout(){
        Auth::guard('customer')->logout(); // Logout the customer
        return redirect()->intended('/');
    }

    public function customerlist(){

        $customer = Customer::orderBy('id','desc')->get();
        return view('admin.user.customer_list',compact('customer'));
    }

    public function searchByCustomer(Request $request){
       
        if($request->searchrole !=""){
            $customer=Customer::where('firstname','like','%'.$request->searchrole.'%')
                            ->orWhere('lastname', 'like', '%' . $request->searchrole . '%')
                            ->orWhere('phone','like','%'.$request->searchrole.'%')
                            ->orderBy('id','desc')
                            ->get();
        }else{
            $customer = Customer::orderBy('id','desc')->get();
        }

        return view('admin.user.customer_list',compact("customer"));
    }


}
