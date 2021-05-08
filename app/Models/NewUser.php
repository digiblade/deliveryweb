<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NewUser extends Authenticatable
{
    use HasFactory;
    protected $table = "tbl_users";
    protected $fillable = [
        'user_email',
        'user_type',
        'user_password',
        'user_name',
        'user_image'
    ];
    protected $hidden = [
        'user_password',
        'remember_token',
    ];
    public function getAuthPassword(){
        return $this->user_password;
    }
}
