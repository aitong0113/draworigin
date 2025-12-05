<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dist extends Model
{
    public $timestamps = false;
    protected $table = "dist";
    protected $primaryKey = "id";
    protected $fillable = ["id", "city", "dist", "zip"];

    public function getDist($city)
    {
        $list = self::where("city", $city)->get();
        return $list;
    }

    public function getZip($city, $dist)
    {
        $list = self::where("city", $city)->where("dist", $dist)->first();
        return $list;
    }
}
