<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderTemp extends Model
{
    public $timestamps = false;
    protected $table = "ordertemp";
    protected $primaryKey = "id";
    protected $fillable = ["id", "sessionId", "memberId", "productId", "sizeId", "colorId", "qty", "price", "createTime"];

    public function getProduct($memberId, $sessionId, $productId, $colorId, $sizeId)
    {
        $sql = self::where("productId", $productId);
        if (!empty($memberId)) {
            $sql->where("memberId", $memberId);
        } else {
            $sql->where("sessionId", $sessionId);
        }

        if (!empty($colorId)) {
            $sql->where("colorId", $colorId);
        }

        if (!empty($sizeId)) {
            $sql->where("sizeId", $sizeId);
        }

        $product = $sql->first();
        return $product;
    }

    public function getCart($memberId, $sessionId)
    {
        $sql = "SELECT a.*, b.itemNo, b.itemName, b.salePrice, c.size, d.colorName,
            (SELECT photo FROM product_photo WHERE productId = b.id LIMIT 1) AS photo
            FROM ordertemp a INNER JOIN product b ON a.productId = b.id
            LEFT JOIN size c ON a.sizeId = c.id
            LEFT JOIN color d ON a.colorId = d.id WHERE ";

        if (!empty($memberId)) {
            $sql .= "memberId = " . $memberId;
        } else {
            $sql .= "sessionId = '" . $sessionId . "'";
        }

        $list = collect(DB::select($sql));
        return $list;
    }

    public function updateMemberCart($memberId, $sessionId)
    {
        DB::table("$this->table")->where("sessionId", $sessionId)->update(["memberId" => $memberId]);
    }

    public function getTotalAmount()
    {
        $sql = DB::select("SELECT sum(qty*price) as total FROM `ordertemp` where memberId = ?", [session()->get("memberId")]);
        $list = collect($sql)->first();

        return $list;
    }
}
