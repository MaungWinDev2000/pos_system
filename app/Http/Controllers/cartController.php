<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Product $product,Request $request)
    {
        // dd($request);
        // Add the product to the cart
        // session()->forget('cart');
        $cart = session()->get('cart');

        // If cart is empty, then this is the first product
        if (!$cart) {
            $cart = [
                $product->id => [
                    'name' => $product->item_name,
                    'price' => $product->item_price,
                    'quantity' => $request->item_qty,
                    'image' => $product->item_image,
                    'uuid' =>$product->uuid,
                    'batchuuid'=>$product->batchuuid,
                    'totalprice'=>$product->item_price * $request->item_qty,
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // If cart is not empty, check if the product is already in cart
        if (isset($cart[$product->id])) {
            // Increment the quantity if the product is already in cart
            $cart[$product->id]['quantity']++;
            $cart[$product->id]['totalprice'] = $cart[$product->id]['totalprice'] * $cart[$product->id]['quantity'];
        } else {

            // dd($product);
            // Add the product to the cart if it's not already there
            $cart[$product->id] = [
                'name' => $product->item_name,
                'price' => $product->item_price,
                'quantity' => $request->item_qty,
                'image' => $product->item_image,
                'uuid' =>$product->uuid,
                'batchuuid'=>$product->batchuuid,
                'totalprice'=>$product->item_price * $request->item_qty,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $productId = $request->input('product_id');
        $filteredCart = array_filter($cart, function ($product) use ($productId) {
            return $product['uuid'] != $productId;
        });
        Session::put('cart', $filteredCart);
        return redirect()->route('cart')->with('success', 'Product removed from cart.');
    }
}

