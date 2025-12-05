<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "product";
    protected $primaryKey = "id";
    protected $fillable = ["id","layer", "itemNo", "itemName", "title", "content", "qty", "price", "salePrice", "isNew", "active", "createTime"];



    public function getList()
    {
        return DB::table("$this->table AS a")
            ->selectRaw('a.*, b.layer_name')
            ->join("product_layer AS b", "a.layer",'b.id')
            ->paginate(10);
        return $list;
    }
    public function getFrontList($layer)
    {
        $sql = "SELECT a.*, b.layer_name,
                (SELECT photo FROM product_photo WHERE productId = a.id LIMIT 1) AS photo
                FROM $this->table a INNER JOIN product_layer b ON a.layer = b.id";

        if (!empty($layer)) {
            $sql .= " WHERE a.layer = $layer";
        }

        $list = collect(DB::select($sql));
        return $list;
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'productId');
    }


}
