<?php

use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "info", "prefix" => "product"], function () {
  Route::get("list/{layer?}", [ProductController::class, "list"]) ->name('product.list')->middleware('info');
  Route::get("detail/{id}", [ProductController::class, "detail"]);  
});


