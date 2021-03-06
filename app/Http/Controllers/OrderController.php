<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orderModel;
use App\Models\AssetsModel;
use App\Models\NewUser;
use App\Models\StockModel;
use App\Models\ManufacturingModel;
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
                $stock = ManufacturingModel::where("manufacturing_productid","=",$req->pid)->where("manufacturing_skuid","=",$req->sid)->get();
                
                 foreach($stock as $res){}
               
                $data= StockModel::where("stock_companyid","=",$req->idData)->where("stock_userid","=",$req->uid)->where("stock_productid","=",$req->pid)->where("stock_skuid","=",$req->sid)->get();
               
                // return $stock;
                $man["stock"] = 0;
                foreach($stock as $res){
                    if($man["stock"]<= $req->qty){
                        if(((double)$req->qty - (double)$man["stock"]) >= ((double)$res->manufacturing_totalcount - (double)$res->manufacturing_sold)){
                            // if(((double)$res->manufacturing_totalcount - (double)$res->manufacturing_sold)!=0){
                                $man["stock"] += ((double)$res->manufacturing_totalcount - (double)$res->manufacturing_sold);
                            // }
                           
                            ManufacturingModel::where("manufacturing_id","=",(double)$res->manufacturing_id)->update(['manufacturing_sold'=>$res->manufacturing_totalcount]);
                        }else{
                              $st = ((double)$req->qty - (double)$man['stock']);
                            $man['stock'] += $st;
                           
                            ManufacturingModel::where("manufacturing_id","=",(double)$res->manufacturing_id)->update(['manufacturing_sold'=>$st]);
                            break;
                        }
                    }
                    // echo $man['stock'];
                }
                // die();
                if (count($data)>0){
                     $input['stock_total'] = $data[0]['stock_total']+$man['stock'];
                     $input['stock_remaining'] = $data[0]['stock_remaining']+$man['stock'];
                     
                     $input['updated_at']=\Carbon\Carbon::now();
                    if(StockModel::where("stock_companyid","=",$req->idData)->where("stock_userid","=",$req->uid)->where("stock_productid","=",$req->pid)->where("stock_skuid","=",$req->sid)->update($input)){
                       
                        return array("response"=>true);
                    }
                    else{
                        return array("response"=>false ,"error"=>"update fail");
                    }
                }else{
                    $input['stock_userid'] = $req->uid;
                    $input['stock_productid'] = $req->pid;
                    $input['stock_skuid'] = $req->sid;
                    $input['stock_companyid'] = $req->idData;
                    $input['stock_total'] = $req->qty;
                    $input['stock_remaining'] = $req->qty;
                    $input['stock_price'] = $req->price;
                    $input['created_at'] = \Carbon\Carbon::now();
                    $input['updated_at'] = \Carbon\Carbon::now();
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
    public function changeStatusC(Request $req){
        try{
            $inputC['status'] = $req->status;
            // $input['created_at']=\Carbon\Carbon::now();
            $inputC['updated_at']=\Carbon\Carbon::now();
            if(orderModel::where("order_id","=", $req->id)->update($inputC)){
                
            }else{
                return array("response"=>false,"error"=>"not update fail");
            }
            if($req->status != "PENDING" && $req->status != "DELIVERED"){
                $ndata = StockModel::where("stock_companyid","=",$req->idData)->where("stock_productid","=",$req->pid)->where("stock_skuid","=",$req->sid)->get();
                if((((double)$ndata[0]['stock_remaining']) - (double)$req->qty)<0){
                    return array("response"=>false ,"error"=>"out of stock");
                }
                $data= StockModel::where("stock_companyid","=",$req->idData)->where("stock_userid","=",$req->uid)->where("stock_productid","=",$req->pid)->where("stock_skuid","=",$req->sid)->get();
                
                // return $stock;
                $man["stock"] = 0;
                
                $input2['stock_remaining'] = (((double)$ndata[0]['stock_remaining']) - (double)$req->qty);
                $input2['updated_at']=\Carbon\Carbon::now(); 
                if(StockModel::where("stock_userid","=",$stock->user_email)->where("stock_productid","=",$req->pid)->where("stock_skuid","=",$req->sid)->update($input2)){
                    // return "update";
                }else{
                    return array("response"=>false ,"error"=>"update fail");
                }
                // die();
                if (count($data)>0){
                     $input['stock_total'] = $data[0]['stock_total']+$req->qty;
                     $input['stock_remaining'] = $data[0]['stock_remaining']+$req->qty;
                     $input['updated_at']=\Carbon\Carbon::now();
                     
                    if(StockModel::where("stock_companyid","=",$req->idData)->where("stock_userid","=",$req->uid)->where("stock_productid","=",$req->pid)->where("stock_skuid","=",$req->sid)->update($input)){
                        return array("response"=>true);
                    }
                    else{
                        return array("response"=>false ,"error"=>"update fail");
                    }
                }else{
                   
                    $input['stock_userid'] = $req->uid;
                    $input['stock_productid'] = $req->pid;
                    $input['stock_skuid'] = $req->sid;
                    $input['stock_companyid'] = $req->idData;
                    $input['stock_total'] = $req->qty;
                    $input['stock_remaining'] = $req->qty;
                    $input['stock_price'] = $req->price;
                    $input['created_at'] = \Carbon\Carbon::now();
                    $input['updated_at'] = \Carbon\Carbon::now();
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
            // return $p;
            return StockModel::where('stock_companyid',"=",$p->user_id)->with('product','sku','user')->get();
        }else{
            return array("response"=>false);
        }
        
    }
}
