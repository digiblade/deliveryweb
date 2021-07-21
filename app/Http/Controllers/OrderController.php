<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderModel;

class OrderController extends Controller
{
    public function getOrder(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "order";
        $data['subtype'] = "";
        $data['order'] = orderModel::where("order_userid","=",$id)->get();
        return View('Company.Order.order',compact('data'));
    }
    public function getOrderAPI(Request $req){
        return  orderModel::where([["order_userid","=",$req->id],["order_usertype","=",$req->type]])->with('product','sku','user')->get();
    }
}
