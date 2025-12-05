<?php

namespace App\Http\Controllers\Front\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderTemp;
use App\Models\Order\Payment;
use App\Models\Product\Product;
use App\Models\Product\ProductSize;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    /**
     * ➕ 加入購物車
     */
    public function addCart(Request $req)
    {
        $sessionId = session()->getId();
        $memberId  = session()->get("memberId");

        $productId = $req->productId;
        $colorId   = $req->colorId;
        $sizeId    = $req->sizeId;
        $qty       = (int) $req->qty;

        $temp = (new OrderTemp())->getProduct($memberId, $sessionId, $productId, $colorId, $sizeId);

        if ($temp) {
            $temp->qty += $qty;
            $temp->update();
        } else {
            $product = Product::find($productId);
            if (!$product) {
                return response()->json(["error" => "找不到商品"], 404);
            }

            $temp = new OrderTemp();
            $temp->sessionId = $sessionId;
            $temp->memberId  = $memberId;
            $temp->productId = $productId;
            $temp->colorId   = $colorId;
            $temp->sizeId    = $sizeId;
            $temp->price     = $product->salePrice;
            $temp->qty       = $qty;
            $temp->save();
        }

        $list   = $this->refreshCart($memberId, $sessionId);
        $totals = $this->calculateTotals($list);

        return response()->json([
            "status"  => "success",
            "cartNum" => session("cartNum"),
            "totals"  => $totals
        ]);
    }

    /**
     * 🛒 取得購物車內容 (for header / 小浮窗)
     */
    public function getCart()
    {
        $memberId  = session()->get("memberId");
        $sessionId = session()->getId();

        $list   = $this->refreshCart($memberId, $sessionId);
        $totals = $this->calculateTotals($list);

        $html = view("front.order.temp.cart", compact("list"))->render();

        return response()->json([
            "html"    => $html,
            "cartNum" => session("cartNum"),
            "totals"  => $totals
        ]);
    }

    /**
     * 📄 購物車頁面
     */
    public function list()
    {
        
        $memberId = session()->get("memberId");
        if (empty($memberId)) {
            return redirect("/member/login/");
        }

        $pay  = Payment::all();
        $list = (new OrderTemp())->getCart($memberId, "");
        $size = [];

        foreach ($list as $data) {
            $size[$data->productId] = (new ProductSize())->getList($data->productId);
        }

        // ✅ 從 session 抓
        $ship  = session("ship", "main");
        $logis = session("logis", "cvs_cod");

        $shipping = $this->getShipping($ship, $logis);
        $totals   = $this->calculateTotals($list, $shipping);

        session()->put("totals", $totals);

        return view("front.order.temp.list", compact("list", "size", "totals", "pay", "ship", "logis"));
    }



    /**
     * ✏️ 更新購物車項目
     */
    public function update(Request $req)
    {
        $id      = $req->id;
        $colorId = $req->colorId;
        $sizeId  = $req->sizeId;
        $qty     = (int) $req->qty;
        $area    = $req->area ?? "main";   // 新增
        $logis   = $req->logis ?? "cvs";   // 新增

        $temp = OrderTemp::find($id);
        if (!$temp) {
            return response()->json(["error" => "找不到購物車項目"], 404);
        }

        if (!empty($colorId)) $temp->colorId = $colorId;
        if (!empty($sizeId))  $temp->sizeId  = $sizeId;
        $temp->qty = $qty;
        $temp->update();

        $list     = $this->refreshCart(session("memberId"), session()->getId());
        $shipping = $this->getShipping($area, $logis);
        $totals   = $this->calculateTotals($list, $shipping);

        return response()->json([
            "status"  => "updated",
            "cartNum" => session("cartNum"),
            "totals"  => $totals
        ]);
    }

    /**
     * ❌ 刪除購物車項目
     */
    public function delete(Request $req)
    {
        $id = $req->id;
        $temp = OrderTemp::find($id);

        if ($temp) {
            $temp->delete();
        }

        $list     = $this->refreshCart(session("memberId"), session()->getId());
        $shipping = $this->getShipping("main", "cvs"); // 預設
        $totals   = $this->calculateTotals($list, $shipping);

        return response()->json([
            "status"  => "deleted",
            "cartNum" => session("cartNum"),
            "totals"  => $totals
        ]);
    }

    /**
     * 🔄 共用：更新 Session
     */
    private function refreshCart($memberId, $sessionId)
    {
        $list = (new OrderTemp())->getCart($memberId, $sessionId);
        session()->put("cart", $list);
        session()->put("cartNum", $list->sum("qty"));
        return $list;
    }

    /**
     * 💰 共用：計算金額
     */ // ShopCartController.php
    // 原本是 private function calculateTotals
    // ShopCartController.php
    public function calculateTotals($list, $shipping = 0)
    {
        $subtotal = $list->sum(function ($item) {
            $qty   = isset($item->qty) ? (int) $item->qty : 0;
            $price = isset($item->price) ? (int) $item->price : 0;
            return $qty * $price;
        });

        $vipDiscount = 58;
        $coupon      = 180;
        $codFee      = 30;

        if ($subtotal >= 3000) {
            $shipping = 0;
        }

        $grandTotal = $subtotal - $vipDiscount - $coupon + $shipping + $codFee;

        return [
            "subtotal"    => $subtotal,
            "vipDiscount" => $vipDiscount,
            "coupon"      => $coupon,
            "shipping"    => $shipping,
            "codFee"      => $codFee,
            "grandTotal"  => $grandTotal,
        ];
    }



    /**
     * 🚚 運費計算
     */
    public function calcShipping(Request $req)
    {
        $area  = $req->area ?? "main";
        $logis = $req->logis ?? "cvs";

        $memberId  = session()->get("memberId");
        $sessionId = session()->getId();

        $list     = $this->refreshCart($memberId, $sessionId);
        $shipping = $this->getShipping($area, $logis);
        $totals   = $this->calculateTotals($list, $shipping);

        return response()->json([
            "totals" => $totals
        ]);
    }

    /**
     * 📦 共用：依地區 / 配送方式計算運費
     */
    public function getShipping($area, $logis)
    {
        if ($area === "main") {
            if ($logis === "cvs_cod") return 65;   // 超商取貨付款
            if ($logis === "cvs")     return 60;   // 超商純取貨
            if ($logis === "home")    return 150;  // 宅配
            if ($logis === "post")    return 100;  // 郵寄
            return 65; // 預設保底
        } else {
            return 280; // 外島
        }
    }



    public function finish()
    {
        return view('front.order.finish');
    }
}
