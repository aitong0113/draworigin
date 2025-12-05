<?php

use App\Http\Controllers\Front\ContactController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "contact"], function () {
  Route::get("/", [contactController::class, "list"]);
  Route::get("detail/{id}", [ContactController::class, "detail"]);
});
