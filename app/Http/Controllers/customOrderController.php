<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomOrder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
class customOrderController extends Controller
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
        return view('customer.custom_order_form');
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
        if (Auth::guard('customer')->check()) {
            $customer = Auth::guard('customer')->user()->uuid;
            }
       
        $custom_order = new CustomOrder;
        $custom_order->customer_uuid = $customer;
        $custom_order->height = $request->height;
        $custom_order->weight = $request->weight;
        $custom_order->shoulder = $request->shoulder;
        $custom_order->bust = $request->bust;
        $custom_order->waist = $request->waist;
        $custom_order->hips = $request->hips;
        $custom_order->thigh = $request->thigh;
        $custom_order->leg_opening = $request->leg;
        $custom_order->phone = $request->phone;
        $custom_order->description = $request->desc;
        $custom_order->status = "Pending";
        $custom_order->uuid = uniqid();

        $custom_order->save();

        return redirect('/');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $custom_order = CustomOrder::where('uuid',$uuid)->first();
        $custom_order->delete();
        return redirect('/admin/custom_order');
    }

    public function custom_order(Request $request){

        if($request->searchrole !="" || $request->searchrole != null)
        {
            $custom_order = DB::table('custom_orders')
                            ->join('customers','customers.uuid','=','custom_orders.customer_uuid')
                            ->where('customers.firstname','=',$request->searchrole)
                            ->orWhere('customers.lastname','=',$request->searchrole)
                            ->select("custom_orders.*","customers.firstname as firstname","customers.lastname as lastname")
                            ->paginate(5);
        }
        else
        {

            $custom_order = DB::table('custom_orders')
                            ->join('customers','customers.uuid','=','custom_orders.customer_uuid')
                            ->select("custom_orders.*","customers.firstname as firstname","customers.lastname as lastname")
                            ->paginate(5);
        }

        return view('admin.custom_order.custom_order_list',compact('custom_order'));

    
    }

    public function custom_order_detail($uuid){

        $custom_order = DB::table('custom_orders')
        ->join('customers','customers.uuid','=','custom_orders.customer_uuid')
        ->where('custom_orders.uuid','=',$uuid)
        ->select("custom_orders.*","customers.firstname as firstname","customers.lastname as lastname")
        ->get();

        return $custom_order;
    }

    public function custom_order_status(Request $request){
        if($request->status == "approve"){
            $custom_order_status = CustomOrder::where('uuid',$request->uuid)->first();
            $custom_order_status->status = "Approved";
            $custom_order_status->save();
        }
        else if($request->status == "cancel"){
            $custom_order_status = CustomOrder::where('uuid',$request->uuid)->first();
            $custom_order_status->status = "Cancel";
            $custom_order_status->save();
        }

        return response()->json(['redirect' => '/admin/custom_order']);
    }
}
