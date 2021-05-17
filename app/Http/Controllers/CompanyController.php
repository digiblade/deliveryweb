<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Carbon;
use Illuminate\Http\Request;
use App\Models\AssetsModel;
use App\Models\CategoryModel;
use App\Models\SubcategoryModel;
use App\Models\NewUser;
class CompanyController extends Controller
{
    public function dashboard(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "dashboard";
        $data['subtype'] = "";
        
        return view("Company.dashboard",compact('data'));
    }
    public function category(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "category";
        $data['subtype'] = "";
        $data['category'] = CategoryModel::orderBy('id','desc')->get();
        return view('Company.Category.category',compact('data'));
    }
    public function addCategory(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "category";
        $data['subtype'] = "";
        return view('Company.Category.addcategory',compact('data'));
    }
    public function addCategoryData(Request $req){
        $req->validate(
            [
                'cName' => 'required',
                'cImage' => 'required',
            ],
            [
                'cName.required' => 'Category name is required',
                'cImage.required' => 'Category Image is required',
            ],
        );
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
            return redirect()->back()->with('success','Category inserted successfully');
        }else{
            return redirect()->back()->with('failure','Category insertion fail');
        }
    }
    public function editCategory(Request $req, $cid){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "category";
        $data['subtype'] = "";
        $data['category'] = CategoryModel::where("id", "=", $cid)->get()->first();
        return view('Company.Category.editcategory',compact('data'));
    }
    public function editCategoryData(Request $req){
        $validate = validator([
            'cName' => 'required',
        ]);
        if($req->hasFile('cImage')){
            $path = 'assets/categories/';
            unlink($path.$req->oldimg);
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
            return redirect()->back()->with('success','Category updated successfully');
        }else{
            return redirect()->back()->with('failure','Category updation fail');
        }
    }
    
    public function deleteCategoryData($cid){
        if(CategoryModel::find($cid)->delete()){
            return redirect()->back()->with('success','Category deleted successfully');
        }else{
            return redirect()->back()->with('failure','Category deletion failed');
        }

    }
    public function getCategory(Request $req,$cid){
        $category = subcategoryModel::where('category_id','=',$cid)->get();
        return response()->json($category, 200)->header('Content-Type', 'application/json'); 
    }
    //subcategory
    public function subcategory(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "subcategory";
        $data['subtype'] = "";
        $data['subcategory'] = SubcategoryModel::orderBy('subcategory_id','desc')->get();
        // return $data;
        return view('Company.SubCategory.subcategory',compact('data'));
    }
    public function addSubcategory(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "subcategory";
        $data['subtype'] = "";
        $data['category'] = CategoryModel::orderBy('id','desc')->get();
        return view('Company.Subcategory.addsubcategory',compact('data'));
    }
    public function addSubcategoryData(Request $req){
        $req->validate(
            [
                
                'cName' => 'required',
                'sCName' => 'required',
                'sCImage' => 'required',
            ],
            [
                'cName.required' => 'Category name is required',
                'sCName.required' => 'Category name is required',
                'sCImage.required' => 'Category Image is required',
            ],
        );
        $subcategoryImage = $req->file('sCImage');
        $sCImage = date("Y_m_d_H_i_s");
        $ext = strtolower($subcategoryImage->getClientOriginalExtension());
        $imageName = $sCImage.".".$ext;
        $path = 'assets/subcategories/';
        $subcategoryImage->move($path,$imageName);
        $input = array(
            'subcategory_name'=>$req->sCName,
            'subcategory_image'=> $imageName,
            'category_id'=>$req->cName,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        );
        if(SubcategoryModel::insert($input)){
            return redirect()->back()->with('success','Subcategory inserted successfully');
        }else{
            return redirect()->back()->with('failure','Subcategory insertion fail');
        }
    }
    public function editSubcategory(Request $req, $sid){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "subcategory";
        $data['subtype'] = "";        
        $data['category'] = CategoryModel::orderBy('id','desc')->get();
        $data['subcategory'] = SubcategoryModel::where("subcategory_id", "=", $sid)->get()->first();
        return view('Company.Subcategory.editsubcategory',compact('data'));
    }
    public function editSubcategoryData(Request $req){
        $validate = validator([
            'cName' => 'required',
        ]);
        if($req->hasFile('sCImage')){
           
            $path = 'assets/subcategories/';
            unlink($path.$req->oldimg);
            $subcategoryImage = $req->file('sCImage');
            $sCImage = date("Y_m_d_H_i_s");
            $ext = strtolower($subcategoryImage->getClientOriginalExtension());
            $imageName = $sCImage.".".$ext;
            $subcategoryImage->move($path,$imageName);
            $input['subcategory_image'] = $imageName;
        }
        
        $input['category_id'] = $req->cName;
        $input['subcategory_name'] = $req->sCName;

        $input['updated_at'] = \Carbon\Carbon::now();
        
        if(SubcategoryModel::where('subcategory_id',"=" ,$req->id)->update($input)){
            return redirect()->back()->with('success','Subcategory updated successfully');
        }else{
            return redirect()->back()->with('failure','Subcategory updation fail');
        }
    }
    
    public function deleteSubcategoryData($cid){
        if(CategoryModel::find($cid)->delete()){
            return redirect()->back()->with('success','Category deleted successfully');
        }else{
            return redirect()->back()->with('failure','Category deletion failed');
        }

    }
    public function openForm(){
        $category = categoryModel::get();
        return view('test',compact('category'));
    }
    public function openEditForm(Request $req, $sid){
        $subcategory = SubcategoryModel::where("subcategory_id","=",$sid)->first();
        // return $subcategory;
        $category = categoryModel::get();
        return view('testEdit',compact('subcategory','category'));
    }
    
}
