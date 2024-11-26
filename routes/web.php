<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/category', [App\Http\Controllers\Frontend\FrontendController::class, 'category']);
Route::get('/view-category/{slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewcategory']);
Route::get('/category/{cate_slug}/{prod_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productview']);
Auth::routes();


Route::post('/add-to-cart', [CartController::class, 'addproduct']);
Route::post('/delete-cart-item', [CartController::class, 'deleteproduct']);
Route::post('/update-cart', [CartController::class, 'updatecart']);



Route::middleware(['auth'])->group(function () {

    Route::get('/cart', [CartController::class, 'viewcart']);
    Route::get('/place-order', [UserController::class, 'index']);
    Route::get('/my-order', [UserController::class, 'myorder']);
    Route::get('/cancel-order/{id}', [UserController::class, 'cancelorder']);
    Route::get('/user-order-history', [UserController::class, 'orderhistory']);

    Route::get('/wishlist', [WishlistController::class, 'index']);
    
});


Route::middleware(['auth', 'isadmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index']);

    //category
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'add']);
    Route::post('/insert-category', [CategoryController::class, 'insert']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('/update-category/{id}', [CategoryController::class, 'update']);
    Route::get('/delete-category/{id}', [CategoryController::class, 'destroy']);

    //products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/add-products', [ProductController::class, 'add']);
    Route::post('/insert-product', [ProductController::class, 'insert']);
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('/update-product/{id}', [ProductController::class, 'update']);
    Route::get('/delete-product/{id}', [ProductController::class, 'destroy']);

    //Orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::put('/update-order/{id}', [OrderController::class, 'updateorder']);
    Route::get('/order-history', [OrderController::class, 'orderhistory']);
    Route::get('/users', [DashboardController::class, 'users']);
    
    
});