<?php

use App\Http\Controllers\Front\About\TeacherController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "teacher"], function () {
  Route::get("/", [TeacherController::class, "list"]);
  Route::get("detail/{id}", [TeacherController::class, "detail"]);
});
