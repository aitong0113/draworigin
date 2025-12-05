<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $timestamps = false;
    protected $table = "size";
    protected $primaryKey = "id";
    protected $fillable = ["id", "size", "createTime"];

    public function getlist()
    {
        $list = self::where('active', 'Y')->get();
        return $list;
    }
}
