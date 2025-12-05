<?php

use App\Http\Controllers\Front\Order\ShopCartController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "info", "prefix" => "shopCart"], function () {
  Route::post("addCart", [ShopCartController::class, "addCart"]);
  Route::get("getCart", [ShopCartController::class, "getCart"]);
  Route::get("list", [ShopCartController::class, "list"]);
  Route::post("update", [ShopCartController::class, "update"])->middleware('member');
  Route::post("delete", [ShopCartController::class, "delete"])->middleware('member');
  Route::post('calcShipping', [ShopCartController::class, 'calcShipping']);
  Route::get('finish', [ShopCartController::class, 'finish'])->name('shopCart.finish');
});
