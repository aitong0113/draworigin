<?php

namespace App\Http\Controllers\Admin\Member;

use App\Exports\MemberExport;
use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;

class AdminMemberController extends Controller
{
    public function list()
    {
        // 取出會員資料，每頁顯示 20 筆
        $list = Member::paginate(20);

        // 傳送到 resources/views/admin/member/list.blade.php
        // 並把 $list 傳給 Blade
        return view("admin.member.list", compact("list"));
    }



    public function delete(Request $req)
    {
        // 根據傳入的 id 刪除會員
        Member::destroy($req->id);

        // 在 session 裡存放一次性的提示訊息
        Session::flash("message", "已刪除");

        // 刪除完成後導回會員列表頁
        return redirect("/admin/member/list");
    }

    public function export()
    {
        return Excel::download(new MemberExport, "會員.xlsx");
    }


    /* ===== 在這裡以下加入這兩個方法 ===== */

    // 顯示修改密碼表單
    public function showChangePasswordForm($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.member.changePwd', compact('member'));
    }

    // 處理修改密碼（不雜湊版本）
    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'password.required'  => '請輸入新密碼',
            'password.min'       => '密碼至少 6 碼',
            'password.confirmed' => '兩次密碼輸入不一致',
        ]);

        $member = Member::findOrFail($id);
        $member->pwd = $request->input('password');   // ← 直接存明文
        $member->save();

        return redirect()->route('admin.member.list')->with('success', '密碼已更新');
    }
    
}


