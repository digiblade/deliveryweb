<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "tbl_products";

    
    protected $fillable = [
        'id',
        'product_name',	
        'product_code',	
        'product_hsncode',	
        'product_baseprice',	
        'product_showprice',	
        'product_isactive',
        'product_isinstock',
        'product_quantity',
        'product_stokistprice',
        'product_distributorprice',
        'product_retailerprice',	
        'product_reorderpoint',
        'product_description',	
        'product_image',	
        'created_at',
        'updated_at',
    ];
    public function category(){
        return $this->hasMany(ManufacturingModel::class,"manufacturing_productid","id");
    }
}
