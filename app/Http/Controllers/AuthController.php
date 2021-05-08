<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\NewUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function checkLogin(Request $req){
        $req->validate([
            'user_email'=>'required',
            'type'=>'required',
            'user_password'=>'required',
        ]);
        // $credential= $req->only('user_email','user_password');
        $user = NewUser::where('user_email',"=",$req->user_email)->first();
        if($user){
            if(Hash::check($req->user_password, $user->user_password)){
                session(["user_id"=>$user->user_id]);
                return redirect("/company/dashboard");
            }
        else{
            return redirect()->back()->with('error','Invalid Credentials');
        }
        }else{
            return redirect()->back()->with('error','Invalid Credentials');
        }
        // if(Auth::attempt(['user_email'=>$req->input('email'),'user_password'=>$req->input('password')])){
        //     return redirect('/dashboard');
        // }
    }
}
