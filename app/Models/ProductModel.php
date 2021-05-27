<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "tbl_category";
    protected $fillable = [
        'id',
        'product_name',
        'category_image',
        'created_at',
        'updated_at'
    ];
}
