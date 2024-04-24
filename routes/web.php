<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\customerTitleController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\batchController;
use App\Http\Controllers\productController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\OrderController;
use App\Models\Product;
use App\Http\Controllers\customOrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $productlist = Product::orderBy('id','desc')->take(3)->get();
    return view('customer/homepage',compact("productlist"));
})->name('homepage');

Route::get('/admin', function () {
    return view('admin/dashboard/login');
});
Route::post('/admin/login',[userController::class,'login']);
Route::middleware(['admin'])->group(function () {

    Route::resource('/admin/staff',userController::class);
    Route::post('/admin/staff/search',[userController::class,'searchByStaff']);
    Route::resource('/admin/dashboard',dashboardController::class);
    Route::resource('/admin/role',roleController::class);
    Route::post('/admin/role/search',[roleController::class,'searchByRole']);
    Route::resource('/admin/customertitle',customerTitleController::class);
    Route::resource('/admin/batch',batchController::class);
    Route::resource('/admin/product',productController::class);
    Route::post('/admin/product/search',[productController::class,'searchByProduct']);
    Route::get('/admin/customerlist',[customerController::class,'customerlist']);
    Route::post('/admin/customer/search',[customerController::class,'searchByCustomer']);
    Route::resource('/admin/customer',customerController::class);
    Route::get('/admin/logout', [userController::class,'logout'])->name('admin.logout');
    Route::resource('/admin/custom_order_form',customOrderController::class);
    Route::get('/admin/custom_order',[customOrderController::class,'custom_order'])->name('admin.custom_order');
    Route::get('/admin/custom_order/{uuid}',[customOrderController::class,'custom_order_detail'])->name('admin.custom_order_detail');
    Route::post('/admin/custom_order/status',[customOrderController::class,'custom_order_status']);
});





// Customer Page
Route::get('/product',[productController::class,'product']);

Route::get('/productdetail/{uuid}',[productController::class,'productdetail'])->name('product.detail');

Route::get('/cart',function(){
    return view('customer/cart');
})->name("cart");

Route::get('/checkout',function(){
    return view('customer/checkout');
})->name('checkout');

Route::get('/login',[customerController::class,'logincreate']);
Route::post('/login/data',[customerController::class,'login']);
Route::get('/logout', [customerController::class,'logout'])->name('logout');
Route::resource('/register',customerController::class);

Route::post('/add-to-cart/{product}',[CartController::class,'addToCart'])->name('cart.add');
Route::get('/remove-from-cart', [CartController::class,'removeFromCart'])->name('cart.remove');

Route::get('/profile',[OrderController::class,'orderByCustomer'])->name('profile');

Route::post('/order',[OrderController::class,'order'])->name('order');

Route::get('/thankyou',function(){
    return view('customer/thankyou');
});

Route::resource('/custom_order',customOrderController::class);

Route::resource('/customer',customerController::class);



