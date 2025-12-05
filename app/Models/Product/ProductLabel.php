<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductLabel extends Model
{
    public $timestamps = false;   // 因為沒有 created_at / updated_at
    protected $table = "product_label";
    protected $primaryKey = "id";
    protected $fillable = ["id", "productId", "labelId", "createTime"];
}
