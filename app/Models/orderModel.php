<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderModel extends Model
{
    use HasFactory;
    protected $table = "tbl_order";
    public function product(){
        return  $this->hasOne(ProductModel::class,"id","order_productid");
     }
     public function sku(){
        return  $this->hasOne(CategoryModel::class,"id","order_id");
     }
     public function user(){
         return $this->hasOne(UserModel::class,"user_email","order_userid");
     }
    
}
