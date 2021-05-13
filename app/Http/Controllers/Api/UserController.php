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
}
