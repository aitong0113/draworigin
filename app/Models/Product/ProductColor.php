<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductColor extends Model
{
    public $timestamps = false;
    protected $table = "product_color";
    protected $primaryKey = "id";
    protected $fillable = ["id", "productId", "colorId", "createTime"];


    public function getList($productId)
    {
        $list = DB::table("{$this->table} AS a")
            ->selectRaw("a.*, b.color, b.colorName")
            ->join("color AS b", "a.colorId", "=", "b.id")
            ->where("a.productId", $productId)
            ->get();

        return $list;
    }
}
