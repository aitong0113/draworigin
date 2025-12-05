<?php

use App\Http\Controllers\Front\MemberController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "member"], function () {
  Route::get("login", [MemberController::class, "login"]);   // ⬅️ 加這一行
  Route::post("doLogin", [MemberController::class, "doLogin"]);
  Route::get("logout", [MemberController::class, "logout"]);
  Route::get("join", [MemberController::class, "join"]);
  Route::post("checkMember", [MemberController::class, "checkMember"]);
  Route::post("save", [MemberController::class, "save"]);
  Route::get("home", [MemberController::class, "home"])->middleware("member");
  Route::get("changeInfo", [MemberController::class, "changeInfo"])->middleware("member");
  Route::post("updateInfo", [MemberController::class, "updateInfo"])->middleware("member");
  Route::get("cart", [MemberController::class, "cart"]);
  Route::post("updateTemp", [MemberController::class, "updateTemp"]);
});
