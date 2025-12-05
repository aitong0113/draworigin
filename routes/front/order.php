<?php

use App\Http\Controllers\Front\Order\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "info","prefix" => "order"], function () {
  Route::match(['get', 'post'], 'info', [OrderController::class, 'info']);
  Route::post("info", [OrderController::class, "info"])->middleware('member');
  Route::post("payment", [OrderController::class, "payment"])->middleware('member');
  Route::get("flow", [OrderController::class, "flow"])->middleware('member');
  Route::any("finish", [OrderController::class, "finish"])->middleware('member');
  Route::post('/order/saveAddress', [OrderController::class, 'saveAddress'])->name('order.saveAddress');
  Route::post('/order/getDist', [OrderController::class, 'getDist']);
  Route::post('/order/getZip', [OrderController::class, 'getZip']);

});

