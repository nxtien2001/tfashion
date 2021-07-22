<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResignterController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'index'])->name('home');
//Back end
Route::get('/dashboard', function () {
    return view('home');
})->middleware('checklogin');

Route::get('/admin', [AdminController::class, 'index'])->middleware('checklogin');
Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->middleware('checklogin');
Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('checklogin');
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('checklogin');

//CHECK PHÂN QUYỀN
Route::prefix('admin')->middleware('admin')->group(function () {
    //Category
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category-create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/category-update', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/category-delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::get('/activeCategory/{category_id}', [CategoryController::class, 'activeCate']);
    Route::get('/unactiveCategory/{category_id}', [CategoryController::class, 'unactiveCate']);
    //Thuộc tính
    Route::get('/attribute', [AttributeController::class, 'index']);
    Route::get('/attribute-create', [AttributeController::class, 'create'])->name('attribute.create');
    Route::post('/attribute-store', [AttributeController::class, 'store'])->name('attribute.store');
    Route::get('/attribute-edit/{id}', [AttributeController::class, 'edit'])->name('attribute.edit');
    Route::post('/attribute-update/{id}', [AttributeController::class, 'update'])->name('attribute.update');
    Route::get('/attribute-delete/{id}', [AttributeController::class, 'delete'])->name('attribute.delete');
    //Sản phẩm
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product-add', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product-store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/product-update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/product-delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
    //Thương hiệu
    Route::get('/brand', [BrandController::class, 'index']);
    Route::get('/brand-create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand-store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand-edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand-update', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand-delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
    Route::get('/activeBrand/{brand_id}', [BrandController::class, 'active']);
    Route::get('/unactiveBrand/{brand_id}', [BrandController::class, 'unactive']);
    //slider
    Route::get('/slider', [SliderController::class, 'index']);
    Route::get('/slider-create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::get('/slider-edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('/slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider-delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
});


// GIAO DIỆN FRONT END
Route::get('category/{id}', [HomeController::class, 'view'])->name('view');
// GIAO DIỆN GIỎ HÀNG
Route::get('/cart', [CartController::class, 'index'])->name('viewcart');
Route::get('/add-cart/{id}', [CartController::class, 'AddCart'])->name('AddCart');
Route::get('/show-cart', [CartController::class, 'ShowCart'])->name('ShowCart');
Route::get('/update-cart', [CartController::class, 'UpdateCart'])->name('UpdateCart');
Route::get('/delete-cart', [CartController::class, 'DeleteCart'])->name('DeleteCart');
Route::get('/thanh-toan', [CartController::class, 'getFormPay'])->name('getFormPay')->middleware('checklogin');
Route::get('/dat-hang', [CartController::class, 'getSaveInfo'])->name('getSaveInfo')->middleware('checklogin');

//ĐĂNG NHẬP ĐĂNG KÍ
Route::get('/dang-ky', [ResignterController::class, 'getResign'])->name('getResign');
Route::post('/dang-ky', [ResignterController::class, 'postResign'])->name('postResign');
Route::get('/dang-nhap', [LoginController::class, 'getLogin'])->name('getLogin');
Route::post('/dang-nhap', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/dang-xuat', [LoginController::class, 'getLogout'])->name('getLogout')->middleware('checklogin');
//ĐỔI MẬT KHẨU
Route::get('/profile', [LoginController::class, 'showProfile'])->name('showProfile');
Route::post('/profile', [LoginController::class, 'profile'])->name('profile');

//CHECK-OUT
Route::get('/checkout', [CheckoutController::class, 'form'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'submit_form'])->name('checkout');

//SẢN PHẨM YÊU THÍCH
Route::get('/addToWishlist/{id}', [WishlistController::class, 'addtowishlist'])->name('addtowishlist');
Route::get('/show-Wishlist', [WishlistController::class, 'wishPage'])->name('wishPage');
Route::get('/wishlist/delete/{id}', [WishlistController::class, 'destroy'])->name('destroy');
