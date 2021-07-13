<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/getpassword',[Auth::class,'getPassword']);
Route::post('/user', [Auth::class,'checkLogin']);
Route::get('/getalluser', [UserController::class,'getAllUser']);
Route::get('/getalluser/{type}', [UserController::class,'getUserByType']);
Route::Post('/addUser',[UserController::class,'addUser']);

//products
Route::get('/products/get/',[ProductController::class,'getProducts']);
Route::post('/products/get/',[ProductController::class,'getProductsById']);
//order
Route::post('/order/create',[ProductController::class,'createOrder']);
Route::post('/order/view',[ProductController::class,'getOrder']);


