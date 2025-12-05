<?php

use App\Http\Controllers\Front\NewsController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "news"], function () {
  Route::get("/", [NewsController::class, "list"]);
  Route::get("detail/{id}", [NewsController::class, "detail"]);
});
