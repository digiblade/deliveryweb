<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = "tbl_users";
    protected $fillable = [
        'user_email',
        'user_type',
        'user_password',
        'user_name',
        'user_image',
        'user_firmname',
        'user_mobile',
        'user_gstNo',
        'user_officeaddress',
        'user_godownaddress',
        'user_description',

    ];
    protected $hidden = [
        'user_password',
        'remember_token',
    ];
}
