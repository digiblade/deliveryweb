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
Route::get('/company/dashboard/',[ProductController::class,'dashboard']);
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

//product company
Route::get('/company/products/{id}',[ProductController::class,'getProductAPI']);
Route::post('/company/addproduct',[ProductController::class,'addProductAPI']);
Route::post('/company/product',[ProductController::class,'addProductDataAPI']);
Route::get('/company/editproduct/{pid}',[ProductController::class,'editProductAPI']);
Route::put('/company/product/edit/{pid}',[ProductController::class,'editProductDataAPI']);
Route::get('/company/deleteproduct/{pid}',[ProductController::class,'deleteProductDataAPI']);

//Manufacturing
// Route::post('/company/manufacturing/add',[ProductController::class,'addManufacturingDataAPI']);
//manufacturing
Route::get('/company/manufacturing/{pid}',[ProductController::class,'getManufacturingAPI']);
Route::get('/company/addmanufacturing/{pid}',[ProductController::class,'addManufacturingAPI']);
Route::post('/company/manufacturing/add',[ProductController::class,'addManufacturingDataAPI']);
Route::get('/company/editmanufacturing/{pid}',[ProductController::class,'editManufacturingAPI']);
Route::post('/company/manufacturing/edit',[ProductController::class,'editManufacturingDataAPI']);
Route::get('/company/deletemanufacturing/{pid}',[ProductController::class,'deleteManufacturingDataAPI']);
//category
Route::get('/company/category',[CompanyController::class,'category']);
Route::get('/company/addcategory',[CompanyController::class,'addCategory']);
Route::post('/company/category/add',[CompanyController::class,'addCategoryData']);
Route::get('/company/editcategory/{cid}',[CompanyController::class,'editCategory']);
Route::post('/company/category/edit',[CompanyController::class,'editCategoryData']);
Route::get('/company/deletecategory/{cid}',[CompanyController::class,'deleteCategoryData']);
