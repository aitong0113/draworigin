<?php

use App\Http\Controllers\Admin\Member\AdminMemberController;
use App\Http\Controllers\Front\MemberController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "manager", "prefix" => "admin/member"], function () {
  Route::get("list", [AdminMemberController::class, "list"]);
  Route::post('delete', [AdminMemberController::class, "delete"]);
  Route::get("export", [AdminMemberController::class, "export"]);
});






// Admin 會員管理路由
Route::group(['middleware' => 'manager', 'prefix' => 'admin/member'], function () {
  Route::get('list', [AdminMemberController::class, 'list'])->name('admin.member.list');
  Route::post('delete', [AdminMemberController::class, 'delete'])->name('admin.member.delete');
  Route::get('export', [AdminMemberController::class, 'export'])->name('admin.member.export');

  // 顯示修改密碼表單
  Route::get('{id}/change-password', [AdminMemberController::class, 'showChangePasswordForm'])
    ->name('admin.member.changePwd');

  // 更新密碼
  Route::post('{id}/change-password', [AdminMemberController::class, 'updatePassword'])
    ->name('admin.member.changePwd.update');
});