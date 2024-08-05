<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/product', function () {
//     return view('product.index');
// });

Route::get('/', [DashboardController::class, 'index']);
Route::resource('/admin', \App\Http\Controllers\UserController::class);
Route::resource('/product', \App\Http\Controllers\ProductController::class);
Route::resource('/role', \App\Http\Controllers\RoleController::class);
Route::resource('/type', \App\Http\Controllers\TypeController::class);
Route::resource('/delivery', \App\Http\Controllers\DeliveryController::class);