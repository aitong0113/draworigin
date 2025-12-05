<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public $timestamps = false;   // 因為沒有 created_at / updated_at 欄位
    protected $table = "label";   // 對應資料表名稱
    protected $primaryKey = "id"; // 主鍵欄位

    // 可批量賦值的欄位
    protected $fillable = ["id", "label", "active"];
}
