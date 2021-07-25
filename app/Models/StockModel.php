<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockModel extends Model
{
    use HasFactory;
    protected $table = "tbl_stock";
    public function user(){
        return $this->hasOne(NewUser::class,"user_email","stock_userid");
    }
    public function product(){
        return $this->hasOne(ProductModel::class,"id","stock_productid");
    }
    public function sku(){
        return $this->hasOne(CategoryModel::class,"id","stock_skuid");
    }
}
