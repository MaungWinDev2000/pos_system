<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Batch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd($request->searchrole);
       
            $product = Product::orderBy('id','desc')->paginate(5);
        

        return view('admin.product.product_list',compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch = Batch::all();
        return view('admin.product.product_create',compact('batch'));
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
           $batch = Batch::where('uuid',$request->batchuuid)->first();
        
       
        
            $image = time().'.'.$request->img->extension();
            $request->img->move(public_path('upload'),$image);
        
            
        $productlist = Product::orderBy('id','desc')->first();
        $product = new Product;
        if($productlist== null){
            $product->item_code = "P0001";
        }
        else{
            $product->item_code = "P000".++$productlist->id;
        }

        $product->item_name = $request->name;
        $product->description = $request->desc;
        $product->item_price = $request->price;
        $product->batchcode = $batch->batchcode;
        $product->batchuuid = $batch->uuid;
        $product->item_qty = $request->qty;
        $product->item_image = $image;
        $product->uuid = uniqid();
        $product->save();

        return redirect('/admin/product');


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
        $product = Product::where('uuid',$uuid)->first();
        $batch = Batch::all();
        return view('admin.product.product_create',compact('product','batch'));
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
        // dd($uuid);
        $batch = Batch::where('uuid',$request->batchuuid)->first();
        $product = Product::where('uuid',$uuid)->first();
        // dd($product);
        $oldimage = $product->item_image;

        if(!empty($oldimage))
        {
            $oldimage = public_path('upload').'/'.$oldimage;
            if(file_exists($oldimage)){
                unlink($oldimage);
            }
        }

        $image = time().'.'.$request->img->extension();

        $request->img->move(public_path('upload'),$image);

        $product->item_name = $request->name;
        $product->description = $request->desc;
        $product->item_price = $request->price;
        $product->batchcode = $batch->batchcode;
        $product->batchuuid = $batch->uuid;
        $product->item_qty = $request->qty;
        $product->item_image = $image;
        $product->save();

        return redirect('/admin/product');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function product(){

        $product = Product::orderBy('id','desc')->paginate(6);

        return view('customer.productlist',compact("product"));
    }

    public function productdetail($uuid){

        $productlist = Product::orderBy('id','desc')->take(4)->get();
        $product = Product::where('uuid', $uuid)->firstOrFail(); // Assuming 'uuid' is the field name
        return view('customer.productdetail', compact('product','productlist')); 
    }

    public function searchByProduct(Request $request){

        if($request->searchrole !=null || $request->searchrole !="")
        {
            $product = Product::where('item_code',$request->searchrole)->orderBy('id','desc')->paginate(5);
        }
        else{
            $product = Product::orderBy('id','desc')->paginate(5);
        }
       

        return view('admin.product.product_list',compact("product"));

    }

}
