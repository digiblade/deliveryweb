<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderModel;
use App\Models\AssetsModel;
use App\Models\NewUser;
use App\Models\StockModel;

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
        $order = orderModel::get();
        $pagename="order";
        return View('Company.Order.order',compact('data','pagename','order'));
    }
    public function getOrderAPI(Request $req){
        // return  orderModel::with('product')->get();
        return  orderModel::with('product','sku','user')->get();
    }
    public function getStock(Request $req , $cid){
        return StockModel::with('product','sku','user')->where('stock_companyid',"=",$cid)->get();
    }
    public function getStockByData(Request $req){
        // return $this->getStock($req,$req->cid);
        return StockModel::where("stock_companyid","=",$req->cid)->where("stock_userid","=",$req->uid)->where("stock_productid","=",$req->pid)->where("stock_skuid","=",$req->sid)->with('product','sku','user')->get();
    }
    public function changeStatus(Request $req){
        try{
            $inputC['status'] = $req->status;
            // $input['created_at']=\Carbon\Carbon::now();
            $inputC['updated_at']=\Carbon\Carbon::now();
            if(orderModel::where("order_id","=", $req->id)->update($inputC)){
                
            }else{
                return array("response"=>false,"error"=>"not update fail");
            }
            if($req->status != "PENDING" && $req->status != "DELIVERED"){
                $data= StockModel::where("stock_companyid","=",$req->cid)->where("stock_userid","=",$req->uid)->where("stock_productid","=",$req->pid)->where("stock_skuid","=",$req->sid)->get();
                if (count($data)>0){
                 
                     $input['stock_total'] = $data[0]['stock_total']+$req->qty;
                     $input['stock_remaining'] = $data[0]['stock_remaining']+$req->qty;
                     $input['updated_at']=\Carbon\Carbon::now();
                    if(StockModel::where("stock_companyid","=",$req->cid)->where("stock_userid","=",$req->uid)->where("stock_productid","=",$req->pid)->where("stock_skuid","=",$req->sid)->update($input)){
                         return array("response"=>true);
                    }
                    else{
                        return array("response"=>false ,"error"=>"update fail");
                    }
                }else{
                    $input['stock_userid'] = $req->uid;
                    $input['stock_productid'] = $req->pid;
                    $input['stock_skuid'] = $req->sid;
                    $input['stock_companyid'] = $req->cid;
                    $input['stock_total'] = $req->qty;
                    $input['stock_remaining'] = $req->qty;
                    $input['stock_price']=$req->price;
                    $input['created_at']=\Carbon\Carbon::now();
                    $input['updated_at']=\Carbon\Carbon::now();
                    if(StockModel::insert($input)){
                        return array("response"=>true);
                    }
                    else{
                        return array("response"=>false,"error"=>"insert fail");
                    }
                }
            }
            
        }catch(Exception $e){
            return $e;
        }
      
    }
    public function getProductById(Request $req){
        $id = $req->id;
        $user = NewUser::where(
            "user_id","=",$id
        )->get()->first();
        $parent = NewUser::where("user_id","=",$user->user_parentid)->get();
        if(count($parent)>0){
            $p = $parent->first();
            return StockModel::where('stock_userid',"=",$p->user_email)->with('product','sku','user')->get();
        }else{
            return array("response"=>false);
        }
        
    }
}
