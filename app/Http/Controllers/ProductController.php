<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\AssetsModel;
use App\Models\UserModel;
use App\Models\newUser;
class ProductController extends Controller
{
    public function getProduct(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "product";
        $data['subtype'] = "";        
        $data['product'] = ProductModel::orderBy('id','desc')->get();
        return view('Company.Product.product',compact('data'));
    }
    public function addProduct(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "product";
        $data['subtype'] = "";        
        $data['product'] = ProductModel::orderBy('id','desc')->get();
        return view('Company.Product.addproduct',compact('data'));
    }
    public function addProductData(Request $req){
        $validate = validator([
            'pName' => 'required',
            'hsncode'=> 'required',
            'baseprice'=> 'required',
            'sprice'=> 'required',
            'dprice'=> 'required',
            'rprice'=> 'required',
            'description'=> 'required',
            'pImage'=> 'required',
        ]);
        
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

        $input['updated_at'] = \Carbon\Carbon::now();
        $input['created_at'] = \Carbon\Carbon::now();
        
        if(ProductModel::insert($input)){
            return redirect()->back()->with('success','Product added successfully');
        }else{
            return redirect()->back()->with('failure','Product edition fail');
        }
    }
    public function editProduct(Request $req,$pid){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "product";
        $data['subtype'] = "";        
        $data['product'] = ProductModel::where("id","=",$pid)->orderBy('id','desc')->get()->first();
        return view('Company.Product.editproduct',compact('data'));
    }
    public function editProductData(Request $req){
        $validate = validator([
            'pName' => 'required',
            'hsncode'=> 'required',
            'baseprice'=> 'required',
            'sprice'=> 'required',
            'dprice'=> 'required',
            'rprice'=> 'required',
            'description'=> 'required',
            'pImage'=> 'required',
        ]);
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
                return redirect()->back()->with('success','Product updated success');
            }else{
                return redirect()->back()->with('failure','Product updation fail');
            }
        }
        catch (Exception $e){
            return redirect()->back()->with('failure',$e);
        }
        
    }
    public function deleteProductData(Request $req,$id){
        try{
            if(ProductModel::where('id',"=",$id)->delete()){
                return redirect()->back()->with('success','Product deleted success');
            }else{
                return redirect()->back()->with('failure','Product delation fail');
            }
        }
        catch (Exception $e){
            return redirect()->back()->with('failure',$e);
        }
    }
}
