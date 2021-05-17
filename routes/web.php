<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
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

//subcategory
Route::get('/company/subcategory',[CompanyController::class,'subcategory']);
Route::get('/company/addsubcategory',[CompanyController::class,'addSubcategory']);
Route::post('/company/subcategory/add',[CompanyController::class,'addSubcategoryData']);
Route::get('/company/editsubcategory/{sid}',[CompanyController::class,'editSubcategory']);
Route::post('/company/subcategory/edit',[CompanyController::class,'editSubcategoryData']);
Route::get('/company/deletesubcategory/{cid}',[CompanyController::class,'deleteSubcategoryData']);

//user
Route::get('/company/adduser',[UserController::class,'createUser']);
Route::post('/company/user/add',[UserController::class,'createUserData']);
Route::get('/company/company',[UserController::class,'getCompany']);
Route::get('/company/superstokist',[UserController::class,'getSuperStokist']);
Route::get('/company/distributor',[UserController::class,'getDistributor']);
Route::get('/company/retailer',[UserController::class,'getRetailer']);
Route::get('/company/sales',[UserController::class,'getAreaSalesManager']);


