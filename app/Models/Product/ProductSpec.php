<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductSpec extends Model
{
    public $timestamps = false;   // 因為沒有 created_at / updated_at
    protected $table = "product_spec";
    protected $primaryKey = "id";
    protected $fillable = ["id", "productId", "title", "content", "createTime"];
}
