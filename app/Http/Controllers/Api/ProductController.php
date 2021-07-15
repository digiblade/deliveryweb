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

    //api
    public function getProductAPI(){ 
        $data = ProductModel::orderBy('id','desc')->get();
        return $data;
    }
    
    public function addProductDataAPI(Request $req){
        // $validate = validator([
        //     'pName' => 'required',
        //     'hsncode'=> 'required',
        //     'baseprice'=> 'required',
        //     'sprice'=> 'required',
        //     'dprice'=> 'required',
        //     'rprice'=> 'required',
        //     'description'=> 'required',
        //     'pImage'=> 'required',
        // ]);
      
        $path = 'assets/product/';
        // unlink($path.$req->oldimg);
        $subcategoryImage = $req->file('pImage');
        $sCImage = date("Y_m_d_H_i_s");
        $ext = strtolower($subcategoryImage->getClientOriginalExtension());
        $imageName = $sCImage.".".$ext;
        $subcategoryImage->move($path,$imageName);
        $input['product_image'] = $imageName;
        $input['product_name'] = $req->pName;        
        $input['product_hsncode'] = $req->hsncode;
        $input['product_baseprice'] = $req->baseprice;
        $input['product_stokistprice'] = $req->sprice;
        $input['product_distributorprice'] = $req->dprice;
        $input['product_retailerprice'] = $req->rprice;
        $input['product_description'] = $req->description;
        $input['product_companyid'] = $id;
        $input['updated_at'] = \Carbon\Carbon::now();
        $input['created_at'] = \Carbon\Carbon::now();
        
        if(ProductModel::insert($input)){
            return array("response"=>true);
        }else{
            return array("response"=>false);
        }
    }
    public function editProductAPI(Request $req,$pid){
           
        $data = ProductModel::where("id","=",$pid)->orderBy('id','desc')->get()->first();
        return $data;
    }
    public function editProductDataAPI(Request $req){
        // $validate = validator([
        //     'pName' => 'required',
        //     'hsncode'=> 'required',
        //     'baseprice'=> 'required',
        //     'sprice'=> 'required',
        //     'dprice'=> 'required',
        //     'rprice'=> 'required',
        //     'description'=> 'required',
        //     'pImage'=> 'required',
        // ]);
        if($req->hasFile('pImage')){
            $path = 'assets/product/';
            unlink($path.$req->oldimg);
            $subcategoryImage = $req->file('pImage');
            $sCImage = date("Y_m_d_H_i_s");
            $ext = strtolower($subcategoryImage->getClientOriginalExtension());
            $imageName = $sCImage.".".$ext;
            $subcategoryImage->move($path,$imageName);
            $input['product_image'] = $imageName;
        }
        $input['product_name'] = $req->pName;        
        $input['product_hsncode'] = $req->hsncode;
        $input['product_baseprice'] = $req->baseprice;
        $input['product_stokistprice'] = $req->sprice;
        $input['product_distributorprice'] = $req->dprice;
        $input['product_retailerprice'] = $req->rprice;
        $input['product_description'] = $req->description;

        $input['updated_at'] = \Carbon\Carbon::now();
        
        try{
            if(ProductModel::where('id',"=",$req->id)->update($input)){
                return array("response"=>true);
            }else{
                return array("response"=>true,"error"=>"something went wrong");
            }
        }
        catch (Exception $e){
            return array("response"=>true,"error"=>$e);
        }
        
}
    public function deleteProductDataAPI(Request $req,$id){
        try{
            if(ProductModel::where('id',"=",$id)->delete()){
                return array("response"=>true);
            }else{
                
return array("response"=>true,"error"=>"something went wrong");
            }
        }
        catch (Exception $e){
            return array("response"=>true,"error"=>$e);
        }
    }   

// manufacturing
    public function getManufacturingAPI(Request $req,$pid){
        
           
        $data['productid'] = $pid;   
        $data['manufacturing'] = ManufacturingModel::where("manufacturing_productid","=",$pid)->orderBy('manufacturing_id','desc')->get();
        return $data;
        // return view('Company.Product.Manufacturing.manufacturing',compact('data'));
        }
    public function addManufacturingAPI(Request $req,$pid){
        // if(session("user_id")==null){
        //     return redirect("/");
        // }
        // $data['logo'] = AssetsModel::get()->first();
        // $id = session("user_id");
        // $data['profile'] = NewUser::where("user_id","=",$id)->first();
        // $data['type']  = "product";
        // $data['subtype'] = "";
        // $data['productid'] = ProductModel::where("id","=",$pid)->get()->first();        
        // $data['sku'] = CategoryModel::orderBy('id','desc')->get();
        // return view('Company.Product.Manufacturing.addmanufacturing',compact('data'));
    }
    public function addManufacturingDataAPI(Request $req){
        // $validate = validator([
        //     'sku' => 'required',
        //     'mcode'=> 'required',
        //     'baseprice'=> 'required',
        //     'sprice'=> 'required',
        //     'dprice'=> 'required',
        //     'rprice'=> 'required',
        //     'count'=> 'required',
        // ]);


        $input['manufacturing_skuid'] = $req->sku;        
        $input['manufacturing_code'] = $req->mcode;
        $input['manufacturing_baseprice'] = $req->baseprice;
        $input['manufacturing_stokistprice'] = $req->sprice;
        $input['manufacturing_distibutorprice'] = $req->dprice;
        $input['manufacturing_retailerprice'] = $req->rprice;
        $input['manufacturing_productid'] = $req->pid;
        $input['manufacturing_totalcount'] = $req->count;
        $input['updated_at'] = \Carbon\Carbon::now();
        $input['created_at'] = \Carbon\Carbon::now();

        if(ManufacturingModel::insert($input)){
            return array("response"=>true); 
        }else{
            return array("response"=>true,"error"=>"something went wrong");
        }
    }
    public function editManufacturingAPI(Request $req,$pid){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "product";
        $data['subtype'] = "";      
        $data['sku'] = CategoryModel::orderBy('id','desc')->get();  
        $data['manufacturing'] = ManufacturingModel::where("manufacturing_id","=",$pid)->get()->first();
        return view('Company.Product.Manufacturing.editmanufacturing',compact('data'));
    }
    public function editManufacturingDataAPI(Request $req){
        // $validate = validator([
        //     'sku' => 'required',
        //     'mcode'=> 'required',
        //     'baseprice'=> 'required',
        //     'sprice'=> 'required',
        //     'dprice'=> 'required',
        //     'rprice'=> 'required',
        //     'count'=> 'required',
        //     // 'sold' => 'required',
        // ]);

        $input['manufacturing_skuid'] = $req->sku;        
        $input['manufacturing_code'] = $req->mcode;
        $input['manufacturing_baseprice'] = $req->baseprice;
        $input['manufacturing_stokistprice'] = $req->sprice;
        $input['manufacturing_distibutorprice'] = $req->dprice;
        $input['manufacturing_retailerprice'] = $req->rprice;
        $input['manufacturing_totalcount'] = $req->count;
        // $input['manufacturing_sold'] = $req->description;

        $input['updated_at'] = \Carbon\Carbon::now();

        try{
            if(ManufacturingModel::where('manufacturing_id',"=",$req->id)->update($input)){
                return array("response"=>true);
            }else{
                return array("response"=>true,"error"=>"something went wrong");
            }
        }
        catch (Exception $e){
            return redirect()->back()->with('failure',$e);
        }

        }
    public function deleteManufacturingDataAPI(Request $req,$id){
        try{
            if(ManufacturingModel::where('manufacturing_id',"=",$id)->delete()){
                return array("response"=>true);
            }else{
                return array("response"=>true,"error"=>"something went wrong");
            }
        }
        catch (Exception $e){
            return array("response"=>true,"error"=>$e);
            return redirect()->back()->with('failure',$e);
        }
    }
}
