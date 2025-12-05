<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductSize extends Model
{
    public $timestamps = false;   
    protected $table = "product_size";
    protected $primaryKey = "id";
    protected $fillable = ["id", "productId", "sizeId", "createTime"];

    public function getList($productId)
    {
        $list = DB::table("{$this->table} AS a")
            ->selectRaw("a.*, b.size")
            ->join("size AS b", "a.sizeId", "=", "b.id")
            ->where("a.productId", $productId)
            ->get();

        return $list;
    }
}
