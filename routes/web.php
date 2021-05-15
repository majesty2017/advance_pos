<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [LoginController::class, 'logout']);


//Order Route
Route::resource('/orders', OrderController::class);
Route::get('/get-orders', [OrderController::class, 'orders']);
Route::get('/get-order-products', [OrderController::class, 'get_products']);
Route::get('/get-product-id/{product_id}', [OrderController::class, 'get_product_byId']);

//Order Detail Route
Route::resource('/order_details', OrderDetailController::class);

//Product Route
Route::resource('/products', ProductController::class);
Route::get('/get-products', [ProductController::class, 'products']);

//Supplier Route
Route::resource('/suppliers', SupplierController::class);

//User Route
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/get-data', [UserController::class, 'getUserData']);
Route::get('/users/{user_id}', [UserController::class, 'show']);
Route::post('users/update', [UserController::class, 'update'])->name('users.update');
Route::delete('users/destroy/{user_id}', [UserController::class, 'destroy']);

//Transaction Route
Route::resource('/transactions', TransactionController::class);

//Company Route
Route::resource('/company', CompanyController::class);

