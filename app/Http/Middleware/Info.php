<?php

namespace App\Http\Middleware;

use App\Models\Order\OrderTemp;
use App\Models\Product\ProductLayer;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Info
{
    public function handle(Request $request, Closure $next): Response
    {
        // 商品分類
        if (empty(session()->get("layer"))) {
            $layer = (new ProductLayer())->getList();
            session()->put("layer", $layer);
        }

        // 購物車
        if (empty(session()->get("cart"))) {
            $memberId  = session()->get("memberId");
            $sessionId = session()->getId();
            $list = (new OrderTemp())->getCart($memberId, $sessionId);
            session()->put("cart", $list);
            session()->put("cartNum", $list->sum('qty')); // ✅ 記錄購物車商品總數
        }

        return $next($request); // ⚠ 最後統一 return
    }
}

    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (empty(session()->get("layer"))) {
    //         $layer = (new ProductLayer())->getList();
    //         session()->put("layer", $layer);
    //     }

    //     if (empty(session()->get("cart"))) {
    //         $memberId  = session()->get("memberId");
    //         $sessionId = session()->getId();
    //         $list = (new OrderTemp())->getCart($memberId, $sessionId);
    //         session()->put("cart", $list);
    //         session()->put("cartNum", $list->sum('qty')); // ✅ 記錄總數量
    //     }

    //     return $next($request); // ⚠ 最後統一 return
    // }
