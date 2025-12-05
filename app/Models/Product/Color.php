<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $timestamps = false;
    protected $table = "color";
    protected $primaryKey = "id";
    protected $fillable = ["id", "color", "colorName", "active"];


    public function getlist()
    {
        $list = self::where("active", "Y")->get();
        return $list;
    }
}