<?php

use App\Http\Controllers\Front\QaController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "qa"], function () {
  Route::get("/", [QaController::class, "list"]);
  Route::get("detail/{id}", [QaController::class, "detail"]);
});
