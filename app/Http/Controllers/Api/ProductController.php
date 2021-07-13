<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\orderModel;
use App\Models\UserModel;
class ProductController extends Controller
{
    public function getProducts(){
        return ProductModel::orderBy('id','desc')->with('category','category.sku')->get();
    }
    public function getProductsById(Request $req){

        return ProductModel::where("product_companyid","=",$req->cid)->orderBy('id','desc')->with('category','category.sku')->get();
    }
    public function createOrder(Request $req){
        $input = [
            "order_productid"=>$req->productid,
            "order_userid"=>$req->userid,
            "order_usertype"=>$req->usertype,
            "order_userprice"=>$req->yourprice,
            "order_skuid"=>$req->skuid,
            "order_quantity"=>$req->quantity,
            "created_at"=>\Carbon\Carbon::now(),
            "updated_at"=>\Carbon\Carbon::now(),
            "order_groupid"=>$req->groupid,
        ];
        if(OrderModel::insert($input)){
            return array("response"=>true);
        }else{
            return array("response"=>false);
        }
    }
    public function getOrder(Request $req){
        // $data = UserModel::where("user_email","=",$req->userid)->get();
        
        return orderModel::where("order_userid","=",$req->userid)->with('product','sku','user')->get();
    }
}
