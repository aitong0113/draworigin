<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    public $timestamps = false;
    protected $table = "ship";
    protected $primaryKey = "id";
    protected $fillable = ["id", "shipName", "active"];

    public function getList()
    {
        $list = self::where("active", "Y")->get();
        return $list;
    }
}
