<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturingModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_manufacturing';
    protected $fillable = [
        'manufacturing_id',
        'subcategory_name',
        'category_id',
        'created_at',
        'updated_at'
    ];
    public function sku(){
        return $this->hasOne(CategoryModel::class,"id","manufacturing_skuid");
    }
    public function Product(){
        return $this->hasOne(ProductModel::class,"id","manufacturing_productid");
    }
}
