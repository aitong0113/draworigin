<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;
    protected $table = "payment";
    protected $primaryKey = "id";
    protected $fillable = ["id", "payName", "active"];

    public function getlist()
    {
        $list = self::where("active", "Y")->get();
        return $list;
    }
}
