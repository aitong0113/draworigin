<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Member\AdminMemberController;
use App\Http\Controllers\Admin\News\AdminNewsController;
use App\Http\Controllers\Admin\News\AdminNewsDetailController;
use Illuminate\Support\Facades\Route;

// 主頁面
Route::group(["middleware" => "manager", "prefix" => "admin/news"], function () {
    Route::get("list", [AdminNewsController::class, "list"]);
    Route::get("add", [AdminNewsController::class, "add"]);
    Route::post("insert", [AdminNewsController::class, "insert"]);
    Route::get("edit/{id}", [AdminNewsController::class, "edit"]);
    Route::post("update", [AdminNewsController::class, "update"]);
    Route::post('delete', [AdminNewsController::class, 'delete']);

    // 明細（detail）
    Route::group(["prefix" => "detail"], function () {
        Route::get("add/{newsId}", [AdminNewsDetailController::class, "add"]);
        Route::post("insert", [AdminNewsDetailController::class, "insert"]);
        Route::get("edit/{newsId}/{id}", [AdminNewsDetailController::class, "edit"]);
        Route::post("update", [AdminNewsDetailController::class, "update"]);
        Route::post("delete", [AdminNewsDetailController::class, "delete"]);
    
    });
});


