<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Order\OrderTemp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    // 顯示登入頁
    public function login(Request $req)
    {
        $cart = $req->cart; // 可能是 Y 或空
        return view("front.member.login", compact("cart"));
    }

    // 處理登入
    public function doLogin(Request $req)
    {
        $email = $req->input('email');
        $pwd   = $req->input('pwd');
        $code  = $req->input('code');
        $cart  = $req->input('cart'); // 可能為 Y

        // 驗證碼
        if (!captcha_check($code)) {
            return response("code");
        }

        // 找會員
        $mem = Member::where('email', $email)->first();
        if (!$mem || $pwd !== $mem->pwd) { // ⚠️ 目前是純文字比對
            return response("error");
        }

        // 登入成功 → 寫入 session
        session()->put("memberId", $mem->id);
        session()->put("email", $email);

        // 更新購物車 (綁定到該會員)
        (new OrderTemp())->updateMemberCart($mem->id, session()->getId());

        // 回傳導向網址
        if (!empty($cart) && $cart === 'Y') {
            return response("/shopCart/list");
        }
        return response("/member/home");
    }


    // 註冊
    public function save(Request $req)
    {
        $email = $req->userEmail;
        $mem = Member::where('email', $email)->first();

        if (!empty($mem)) {
            echo "exist";
            exit;
        }

        if (!captcha_check($req->userCode)) {
            echo "code";
            exit;
        }

        $member = new Member();
        $member->email = $email;
        $member->pwd = $req->pwd1;   
        $member->userName = $req->userName;
        $member->save();

        session()->put("memberId", $member->id);

        echo "/member/home";
    }

    // 登出
    public function logout()
    {
        session()->forget("memberId");
        return redirect("/");
    }

    // 會員首頁
    public function home()
    {
        return view("front.member.home");
    }


    // 顯示註冊頁
    public function join()
    {
        return view("front.member.join");
    }
}
