<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\AssetsModel;
use App\Models\UserModel;
use App\Models\NewUser;

class UserController extends Controller
{
    public function createUser(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "ruser";
        $data['subtype'] = "rc";
        // $data['category'] = CategoryModel::orderBy('id','desc')->get();
        return view('Company.User.addUser',compact('data'));
    }
    public function createUserData(Request $req){
        $validation['firmname'] = 'required';

        $validation['fullname'] = 'required';
        $validation['mobileno'] = 'required';
        if($req->usertype=="1"){
            $validation['gst'] = 'required';
        }
        $validation['user_email'] = 'required|unique:tbl_users';
        $validation['officeadd'] ='required';
        $validation['godownadd'] = 'required';
        $req->validate($validation,[
            'user_email.required'=>'email is required',
            'user_email.unique'=>'email must be unique',
        ]);
          $aid = session("user_id");
        $input = array(
            "user_type" =>$req->usertype,
            "user_firmname" => $req->firmname,
            "user_name"=>$req->fullname,
            "user_mobile"=>$req->mobileno,
            "user_gstNo"=>$req->gst,
            "user_email"=>$req->user_email,
            "user_officeaddress"=>$req->officeadd,
            "user_godownaddress"=>$req->godownadd,
            'user_description'=>$req->description,
            'user_password'=>Hash::make($req->email),
            'user_parentid'=>$aid,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        );
        try{
            if(UserModel::insert($input)){
                return redirect()->back()->with('success','user added success');
            }else{
                return redirect()->back()->with('failure','user addition fail');
            }
        }
        catch (Exception $e){
            return redirect()->back()->with('failure',$e);
        }
        
    }
    public function getCompany(){
        if(session("user_id")==null){
            return redirect("/");
        }
        $data['logo'] = AssetsModel::get()->first();
        $id = session("user_id");
        $data['profile'] = NewUser::where("user_id","=",$id)->first();
        $data['type']  = "ruser";
        $data['subtype'] = "rco";
        $data['user'] = UserModel::orderBy('user_id','desc')->get();
        return view('Company.User.user',compact('data'));
    }
}
