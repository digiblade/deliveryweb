<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
    return view('login');
});
Route::get('/logout',function(){
    session()->flush();
    return redirect("/");
});
Route::get('/dashboard', function () {
    return view('welcome');
});
Route::post('/checkLogin',[AuthController::class,'checkLogin']);


//Company Routes

Route::get('/company/dashboard',[CompanyController::class,'dashboard']);

//category
Route::get('/company/category',[CompanyController::class,'category']);
Route::get('/company/addcategory',[CompanyController::class,'addCategory']);
Route::post('/company/category/add',[CompanyController::class,'addCategoryData']);
Route::get('/company/editcategory/{cid}',[CompanyController::class,'editCategory']);
Route::post('/company/category/edit',[CompanyController::class,'editCategoryData']);
Route::get('/company/deletecategory/{cid}',[CompanyController::class,'deleteCategoryData']);

//testing
Route::get('/company/subcategory/{cid}',[CompanyController::class,'getCategory']);
Route::get('/company/test/',[CompanyController::class,'openForm']);
Route::get('/company/testdata/{sid}',[CompanyController::class,'openEditForm']);

//product
Route::get('/company/product',[ProductController::class,'getProduct']);
Route::get('/company/addproduct',[ProductController::class,'addProduct']);
Route::post('/company/product/add',[ProductController::class,'addProductData']);
Route::get('/company/editproduct/{pid}',[ProductController::class,'editProduct']);
Route::post('/company/product/edit',[ProductController::class,'editProductData']);
Route::get('/company/deleteproduct/{pid}',[ProductController::class,'deleteProductData']);
//manufacturing
Route::get('/company/manufacturing/{pid}',[ProductController::class,'getManufacturing']);
Route::get('/company/addmanufacturing/{pid}',[ProductController::class,'addManufacturing']);
Route::post('/company/manufacturing/add',[ProductController::class,'addManufacturingData']);
Route::get('/company/editmanufacturing/{pid}',[ProductController::class,'editManufacturing']);
Route::post('/company/manufacturing/edit',[ProductController::class,'editManufacturingData']);
Route::get('/company/deletemanufacturing/{pid}',[ProductController::class,'deleteManufacturingData']);

//user
Route::get('/company/adduser',[UserController::class,'createUser']);
Route::post('/company/user/add',[UserController::class,'createUserData']);
Route::get('/company/company',[UserController::class,'getCompany']);
Route::get('/company/superstokist',[UserController::class,'getSuperStokist']);
Route::get('/company/distributor',[UserController::class,'getDistributor']);
Route::get('/company/retailer',[UserController::class,'getRetailer']);
Route::get('/company/sales',[UserController::class,'getAreaSalesManager']);
Route::get('/company/edituser/{type}/{id}',[UserController::class,'editUser']);
Route::post('/company/user/edit',[UserController::class,'editUserData']);
Route::get('/company/user/delete/{id}',[UserController::class,'deleteUserData']);


