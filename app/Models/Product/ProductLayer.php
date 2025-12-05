<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductLayer extends Model
{
    public $timestamps = false;
    protected $table = "product_layer";
    protected $primaryKey = "id";
    protected $fillable = ["id", "layer_name", "active"];


    public function getList()
    {
        $list = self::where("active", "Y")->get();
        return $list;
    }
}
