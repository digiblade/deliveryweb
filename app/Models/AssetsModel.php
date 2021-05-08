<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsModel extends Model
{
    use HasFactory;
    protected $table = "tbl_assets";
    protected $fillable = [
        'logo',
        'name'
    ];
}
