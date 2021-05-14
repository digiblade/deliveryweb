<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;
class Auth extends Controller
{
    public function checkLogin(Request $req){
        $msg['response'] = false;

        $user = UserModel::where("user_email","=",$req->email)->where("user_type","=",$req->type)->get()->first();
        if($user != null){
            if(Hash::check($req->password,$user->user_password)){
                $msg['response'] = true;
            }else{
                $msg['error'] = "Check Password";
            }
        }else{
            $msg['error'] = "Check Userid";
        }
       
        return $msg;
    }
    public function getPassword(Request $req){
        return Hash::make($req->password);
    }
}
