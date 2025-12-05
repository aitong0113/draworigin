<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Manager;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.login");
    }

    public function login(Request $req)
    {
        $userId = $req->userId;
        $pwd    = $req->pwd;
        $code   = $req->code;

        if (captcha_check($code) == false)
        {
            return back()->withInput()->withErrors(["code" => "驗證碼錯誤"]);
        }

        $manager = (new Manager())->getManager($userId, $pwd);

        if (empty($manager))
        {
            return back()->withInput()->withErrors(["err" => "帳號或密碼錯誤"]);
            exit;
        }

        session()->put("managerId", $userId);
        return redirect("/myadmin/home");
    }

    public function home()
    {
        return view("admin.home");
    }

    public function logout()
    {
        // 方法 1：用 helper
        session()->forget("managerId");

        // // 方法 2：用 facade
        // Session::forget("managerId");

        // 登出後導回登入頁
        return redirect("/myadmin");
    }



    public function delete(Request $req)
    {
        // 根據傳入的 id 刪除會員
        news::destroy($req->id);

        // 在 session 裡存放一次性的提示訊息
        Session::flash("message", "已刪除");

        // 刪除完成後導回會員列表頁
        return redirect("/admin/news/list");
    }
}
