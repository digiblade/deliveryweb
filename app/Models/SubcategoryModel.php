<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoryModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_subcategory';
    protected $fillable = [
        'subcategory_id',
        'subcategory_name',
        'category_id',
        'created_at',
        'updated_at'
    ];
    public function category(){
        return $this->hasOne(CategoryModel::class,"id","category_id");
    }
}
