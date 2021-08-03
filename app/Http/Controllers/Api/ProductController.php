<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\orderModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\ManufacturingModel;
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
    public function dashboard(){
        $data['skucount'] = count(CategoryModel::get());
        $data['usercount'] = count(UserModel::get());
        $data['companycount'] = count(UserModel::where("user_type","=","1")->get());
        $data['sscount'] = count(UserModel::where("user_type","=","2")->get());;
        $data['distributorcount'] = count(UserModel::where("user_type","=","3")->get());;
        $data['asmcount'] = count(UserModel::where("user_type","=","4")->get());;
        $data['productcount'] = count(ProductModel::get());;
        return $data;
    }
    public function getProductAPI(Request $req,$id){ 
        $cid = UserModel::where("user_parentid","=",$id)->get()->first()->user_id;
        echo $cid;
        $data = ProductModel::where("product_companyid","=",$cid)->orderBy('id','desc')->with('category','category.sku')->get();
        return $data;
    }
    public function addProduct(Request $req){
        return array("data"=>$req->data);
    }
    public function addProductDataAPI(Request $req){
        try{
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
            $input['product_companyid'] = $req->id;
            $input['updated_at'] = \Carbon\Carbon::now();
            $input['created_at'] = \Carbon\Carbon::now();
            
            if(ProductModel::insert($input)){
                return array("response"=>true);
            }else{
                return array("response"=>false);
            }
        }catch(Exception $e){
            echo $e;
        }
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
      
       
    }
    public function editProductAPI(Request $req,$pid){
           
        $data = ProductModel::where("id","=",$pid)->orderBy('id','desc')->get()->first();
        return $data;
    }
    public function editProductDataAPI(Request $req){
       
        if($req->hasFile('pImage')){
            $path = 'assets/product/';
            // unlink($path.$req->oldimg);
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
        
           
       
        $data['manufacturing'] = ManufacturingModel::where("manufacturing_productid","=",$pid)->orderBy('manufacturing_id','desc')->with('sku','Product')->get();
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
    //sku
    public function categoryAPI(Request $req){
        // $id = $req->id;
         
        return CategoryModel::orderBy('id','desc')->get();
    }
  
    public function addCategoryDataAPI(Request $req){
      
        $categoryImage = $req->file('cImage');
        $cImage = date("Y_m_d_H_i_s");
        $ext = strtolower($categoryImage->getClientOriginalExtension());
        $imageName = $cImage.".".$ext;
        $path = 'assets/categories/';
        $categoryImage->move($path,$imageName);
        $input = array(
            'category_name'=>$req->cName,
            'category_image'=> $imageName,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        );
        if(CategoryModel::insert($input)){
            return array("response"=>true,'msg'=>'Category inserted successfully');
        }else{ 
            return array("response"=>false,'msg'=>'Category insertion fail');
        }
    }
   
    public function editCategoryDataAPI(Request $req){
       
        if($req->hasFile('cImage')){
            $path = 'assets/categories/';
            // unlink($path.$req->oldimg);
            $categoryImage = $req->file('cImage');
            $cImage = date("Y_m_d_H_i_s");
            $ext = strtolower($categoryImage->getClientOriginalExtension());
            $imageName = $cImage.".".$ext;
            $categoryImage->move($path,$imageName);
            $input['category_image'] = $imageName;
        }
        
        $input['category_name']= $req->cName;
        $input['updated_at'] = \Carbon\Carbon::now();
        
        if(CategoryModel::where('id',"=" ,$req->id)->update($input)){
            return array("response"=>true,'msg'=>'Category updated successfully');
        }else{
            return array("response"=>true,'msg'=>'Category updated fail');
        }
    }
    
    public function deleteCategoryDataAPI($cid){
        if(CategoryModel::find($cid)->delete()){
            return redirect()->back()->with('success','Category deleted successfully');
        }else{
            return redirect()->back()->with('failure','Category deletion failed');
        }

    }
    public function getCategoryAPI(Request $req,$cid){
        $category = subcategoryModel::where('category_id','=',$cid)->get();
        return response()->json($category, 200)->header('Content-Type', 'application/json'); 
    }
}
