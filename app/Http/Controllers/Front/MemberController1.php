<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Order\OrderTemp;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function join()
    {
        return view("front.member.join");
    }

    public function checkMember(Request $req)
    {
        $member = (new Member())->getMember($req->email);
        if (!empty($member)) {
            echo "exist";
        }
    }

    public function save(Request $req)
    {
        $email = $req->userEmail;
        $mem = (new Member())->getMember($email);
        if (!empty($mem)) {
            echo "exist";
            exit;
        }

        $code = $req->userCode;
        if (captcha_check($code) == false) {
            echo "code";
            exit;
        }

        $member = new Member();
        $member->email = $email;
        $member->pwd = $req->pwd1;
        $member->userName = $req->userName;
        $member->save();

        $id = $member->id;
        session()->put("memberId", $id);

        echo "/member/home";
    }


    public function login(Request $req)
    {
        $email = $req->email;
        $pwd = $req->pwd;
        $mem = (new Member())->getMember($email, $pwd);
        if (empty($mem)) {
            echo "error";
            exit;
        }

        $code = $req->code;
        if (captcha_check($code) == false) {
            echo "code";
            exit;
        }

        session()->put("memberId", $mem->id);

        (new OrderTemp())->updateMemberCart($mem->id, session()->getId());


        if (!empty($cart)) {
            echo ("/shopCart/list");
        } else {
            echo ("/member/home");
        }


    }




    public function home()
    {
        // 會員專屬首頁（通常放簡單的訂單歷史查詢）
        return view("front.member.home");
    }

    public function logout()
    {
        session()->forget("memberId");
        // Session::forget("memberId");
        return redirect("/");
    }

    public function cart()
    {
        return view("front.member.cart");
    }

    public function updateTemp(Request $req)
    {
        $email = $req->email;
        $pwd = $req->pwd;
        $mem = (new Member())->getMember($email, $pwd);
        if (empty($mem)) {
            echo "error";
            exit;
        }

        $code = $req->code;
        if (captcha_check($code) == false) {
            echo "code";
            exit;
        }

        session()->put("memberId", $mem->id);

        // 要更新購物車的會員ID，將原本所儲存的 sessionId，更新為 memberId
        // 更新的目的為：當會員關閉瀏覽器，暫時離開網站時，下次再登入可取得原本未結帳的購物清單
        /*
            update ...
        */
        
    }
}
