<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Customer;
use App\Models\CustomerTitle;
use App\Models\CustomOrder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function order(Request $request){

        $totalPrice = 0;
        $validator = Validator::make($request->all(), [
            'payment_method' => 'required',
            // Other validation rules for your form fields
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            // Return the view with the validation errors
            return redirect()->back()->with('error', 'The payment method field must be choose.');
        }
        
        if (Auth::guard('customer')->check()) {
        $customer = Auth::guard('customer')->user()->uuid;
        }

        if(session::has('cart')){
          $data=session::get('cart');

          foreach($data as $item){
            $totalPrice = $totalPrice + $item["totalprice"];
          }
        
        }
        // dd($data);
        $order = new Order;
        $order->customer_uuid = $customer;
        $order->total_price = $totalPrice;
        $order->order_address = $request->address;
        $order->payment_type = $request->payment_method;
        $order->uuid = uniqid();
        $order->save();

       
        
        if(session::has('cart')){
            $listdata = session::get('cart');
            foreach($listdata as $list_item){
                $orderdetail = new OrderDetail;
                $orderdetail->order_uuid = $order->uuid;
                $orderdetail->product_uuid = $list_item["uuid"];
                $orderdetail->order_qty = $list_item["quantity"];
                $orderdetail->price = $list_item["totalprice"];
                $orderdetail->uuid = uniqid();
                $orderdetail->save();

                $product = Product::where('uuid',$list_item["uuid"])->first();
                $product->item_qty = $product->item_qty - $list_item["quantity"];
                $product->save();
            }

            $request->session()->forget('cart');
        }
        
     

        return redirect('/thankyou');

    }


    public function orderByCustomer(){

        if(Auth::guard('customer')->check()){
            $customer = Auth::guard('customer')->user()->uuid;

            $customerdata = DB::table("customers")
                        ->join("customer_titles","customer_titles.id","=","customers.customertitle")
                        ->where("customers.uuid",$customer)
                        ->select("customers.*","customer_titles.title")
                        ->get();

            $order = DB::table("orders")
                        ->join("order_details","order_details.order_uuid","=","orders.uuid")
                        ->join("products","products.uuid","=","order_details.product_uuid")
                        ->where("orders.customer_uuid","=",$customer)
                        ->select("orders.*","order_details.*","products.*")
                        ->get();

            $custom_order = DB::table('custom_orders')
                            ->join('customers','customers.uuid','=','custom_orders.customer_uuid')
                            ->where("custom_orders.customer_uuid",'=',$customer)
                            ->select("custom_orders.*")
                            ->get();
            // dd($customerdata    );
                    
            return view('customer.profile',compact("order","customerdata","custom_order"));
        }
    }
}
