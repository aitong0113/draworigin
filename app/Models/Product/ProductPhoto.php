<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    public $timestamps = false;
    protected $table = "product_photo";
    protected $primaryKey = "id";
    protected $fillable = ["id", "productId", "photo", "createTime"];

    public function getList($productId)
    {
        $list = self::where("productId", $productId)->get();
        return $list;
    }
}
