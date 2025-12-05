<?php

use App\Http\Controllers\Admin\Qa\AdminQaController;
use Illuminate\Support\Facades\Route;


Route::group(["middleware" => "manager", "prefix" => "admin/qa"], function () {
    Route::get("list", [AdminQaController::class, "list"]);
    Route::get("add", [AdminQaController::class, "add"]);
    Route::post("insert", [AdminQaController::class, "insert"]);
    Route::get("edit/{id}", [AdminQaController::class, "edit"]);
    Route::post("update", [AdminQaController::class, "update"]);
    Route::post('delete', [AdminQaController::class, 'delete']);
});
