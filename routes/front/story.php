<?php

use App\Http\Controllers\Front\About\StoryController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "story"], function () {
  Route::get("/", [StoryController::class, "list"]);
  Route::get("detail/{id}", [StoryController::class, "detail"]);
});
