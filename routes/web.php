<?php
use App\http\Controllers\AdminController;
use App\http\Controllers\categoryController;
use App\http\Controllers\CouponController;
use App\http\Controllers\SizeController;
use App\http\Controllers\ColorController;
use App\http\Controllers\productController;
use App\http\Controllers\BrandController;
use App\http\Controllers\customerController;
use App\http\Controllers\Front\FrontController;
use App\http\Controllers\HomeBannerController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[FrontController::class,'index']);
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');



Route::group(['middleware'=>'admin_auth'],function(){

Route::get('admin/dashboard',[AdminController::class,'dashboard']);
Route::get('admin/category',[categoryController::class,'index']);
Route::get('admin/category/manage_category',[categoryController::class,'manage_category']);
Route::get('admin/category/manage_category/{id}',[categoryController::class,'manage_category']);
Route::post('admin/category/manage_category_process',[categoryController::class,'manage_category_process'])->name('category.manage_category_process');
Route::get('admin/category/delete/{id}',[categoryController::class,'delete']);
Route::get('admin/category/status/{status}/{id}',[categoryController::class,'status']);
// Route::get('admin/updatepassword',[AdminController::class,'updatepassword']);  



Route::get('admin/coupon',[CouponController::class,'index']);
Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);



Route::get('admin/size',[SizeController::class,'index']);
Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size']);
Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('size.manage_size_process');
Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);



Route::get('admin/color',[ColorController::class,'index']);
Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color']);
Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('color.manage_color_process');
Route::get('admin/color/delete/{id}',[ColorController::class,'delete']);

Route::get('admin/color/status/{status}/{id}',[ColorController::class,'status']);




Route::get('admin/brand',[BrandController::class,'index']);
Route::get('admin/brand/manage_brand',[BrandController::class,'manage_brand']);
Route::get('admin/brand/manage_brand/{id}',[BrandController::class,'manage_brand']);
Route::post('admin/brand/manage_brand_process',[BrandController::class,'manage_brand_process'])->name('brand.manage_brand_process');
Route::get('admin/brand/delete/{id}',[BrandController::class,'delete']);
Route::get('admin/brand/status/{status}/{id}',[BrandController ::class,'status']);



Route::get('admin/product',[productController::class,'index']);
Route::get('admin/product/manage_product',[productController::class,'manage_product']);
Route::get('admin/product/manage_product/{id}',[productController::class,'manage_product']);
Route::post('admin/product/manage_product_process',[productController::class,'manage_product_process'])->name('product.manage_product_process');
Route::get('admin/product/delete/{id}',[productController::class,'delete']);
Route::get('admin/product/status/{status}/{id}',[productController::class,'status']);


Route::get('admin/customer',[customerController::class,'index']);
Route::get('admin/customer/manage_customer',[customerController::class,'manage_customer']);
Route::get('admin/customer/manage_customerproduct/{id}',[customerController::class,'manage_customer']);
Route::post('admin/customer/manage_customer_process',[customerController::class,'manage_customer_process'])->name('customer.manage_customer_process');
Route::get('admin/customer/delete/{id}',[customerController::class,'delete']);
Route::get('admin/customer/show/{id}',[customerController::class,'show']);
Route::get('admin/customer/status/{status}/{id}',[customerController::class,'status']);



Route::get('admin/home_banner',[HomeBannerController::class,'index']);
Route::get('admin/home_banner/manage_home_banner',[HomeBannerController::class,'manage_home_banner']);
Route::get('admin/home_banner/manage_home_banner/{id}',[HomeBannerController::class,'manage_home_banner']);
Route::post('admin/home_banner/manage_home_banner_process',[HomeBannerController::class,'manage_home_banner_process'])->name('home_banner.manage_home_banner_process');
Route::get('admin/home_banner/delete/{id}',[HomeBannerController::class,'delete']);
Route::get('admin/home_banner/status/{status}/{id}',[HomeBannerController::class,'status']);



Route::get('admin/logout', function () {
  session()->forget('ADMIN_LOGIN');
  session()->forget('ADMIN_ID');
session()->flash('error','logout sucessfully');
    return redirect('admin');
});
});