<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
class UserController extends Controller
{
    public function getAllUser(){
        return UserModel::get();
    }
    public function getUserByType(Request $req,$type){
        return UserModel::where("user_type","=",($type-1))->get();
    }
    public function addUser(Request $req){
        $msg['response'] = false;
        $aid = UserModel::where("user_email","=",$req->aid)->get();
        $id = 0;
        if(count($aid)>0){
            $id = $aid->first();
        }
        return $id;
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
            'user_password'=>Hash::make('123456'),
            'user_parentid'=>$id,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        );
        try{
            if(UserModel::insert($input)){
               $msg['reponse'] = true ;
            }else{
                $msg['error'] = 'Insertion fail';
            }
        }
        catch (Exception $e){
            $msg['error'] = $e;
        }
        return $msg;
    }
    public function editUser(Request $req){
        $msg['response'] = false;
        $aid = UserModel::where("user_email","=",$req->aid)->get();
        $id = 0;
        if(count($aid)>0){
            $id = $aid->first();
        }
        return $id;
        $check = $UserModel::where("user_email","=",$req->user_email)->get();
        if(count($check)>0){
            $msg['error'] = 'Email must be unique';
            return $msg;
        }
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
            'user_password'=>Hash::make('123456'),
            'user_parentid'=>$id,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        );
        try{
            if(UserModel::insert($input)){
               $msg['reponse'] = true ;
            }else{
                $msg['error'] = 'Insertion fail';
            }
        }
        catch (Exception $e){
            $msg['error'] = $e;
        }
        return $msg;
    }
    public function deleteUser(Request $req){
        $msg['response'] = false;
        $aid = UserModel::where("user_email","=",$req->aid)->get();
        $id = 0;
        if(count($aid)>0){
            $id = $aid->first();
        }
        return $id;
        $check = $UserModel::where("user_id","=",$req->user_id)->get();
        if(count($check)>0){
            if($check->first()->user_email != $req->user_email){
                $checkEmail = UserModel::where("user_email","=",$req->user_email);
                if(count($checkEmail)>0){
                    $msg['error'] = 'Email must be unique';
                    return $msg;
                }
            }
            return $msg;
        }
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
            'user_password'=>Hash::make('123456'),
            'user_parentid'=>$id,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        );
        try{
            if(UserModel::where('user_id',"=",$req->id)->update($input)){
               $msg['reponse'] = true ;
            }else{
                $msg['error'] = 'Insertion fail';
            }
        }
        catch (Exception $e){
            $msg['error'] = $e;
        }
        return $msg;
    }
    
}
