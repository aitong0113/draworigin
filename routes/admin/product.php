<?php

use App\Http\Controllers\Admin\Product\AdminProductLayerController as Ly;
use App\Http\Controllers\Admin\Product\AdminProductColorController as Color;
use App\Http\Controllers\Admin\Product\AdminProductController;
use App\Http\Controllers\Admin\Product\AdminProductLabelController;
use App\Http\Controllers\Admin\Product\AdminProductLayerController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "manager", "prefix" => "admin/product"], function () {
  Route::group(["prefix" => "layer"], function () {
    Route::get("list", [Ly::class, "list"]);
    Route::get("add", [Ly::class, "add"]);
    Route::post("insert", [Ly::class, "insert"]);
    Route::get("edit/{id}", [Ly::class, "edit"]);
    Route::post("update", [Ly::class, "update"]);
    Route::post("delete", [Ly::class, "delete"]);
  });



  Route::group(["prefix" => "color"], function () {
    Route::get("list",    [Color::class, "list"]);
    Route::get("add",     [Color::class, "add"]);
    Route::post("insert", [Color::class, "insert"]);   
    Route::get("edit/{id}", [Color::class, "edit"]);   
    Route::post("update", [Color::class, "update"]);   
    Route::post("delete", [Color::class, "delete"]);   
  });

  Route::group(['prefix' => 'label'], function () {
    Route::get('list',   [AdminProductLabelController::class, 'list'])->name('admin.label.list');
    Route::get('add',    [AdminProductLabelController::class, 'add'])->name('admin.label.add');
    Route::post('insert', [AdminProductLabelController::class, 'insert'])->name('admin.label.insert');
    Route::get('edit/{id}', [AdminProductLabelController::class, 'edit'])->name('admin.label.edit');
    Route::post('update', [AdminProductLabelController::class, 'update'])->name('admin.label.update');
    Route::post('delete', [AdminProductLabelController::class, 'delete'])->name('admin.label.delete');
  });


  Route::group(["prefix" => "product"], function () {
    Route::get("list",  [AdminProductController::class, "list"])->name("admin.product.list");
    Route::get("add",   [AdminProductController::class, "add"]);
    Route::post("insert", [AdminProductController::class, "insert"]);
    Route::get("edit/{id}", [AdminProductController::class, "edit"]);
    Route::post("update", [AdminProductController::class, "update"]);
    Route::post("delete", [AdminProductController::class, "delete"]);
    Route::get("export", [AdminProductController::class, "export"]);
    Route::get("word/{id}", [AdminProductController::class, "word"]);
  });

  


});




