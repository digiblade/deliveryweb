<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
class ProductController extends Controller
{
    public function getProducts(){
        return ProductModel::orderBy('id','desc')->get();
    }
}
