<?php

namespace App\Models;

use App\Models\Member\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class City extends Model
{
    // 如果資料表名稱 = cities，就不需要這行
    // protected $table = 'city';  // ← 這行刪掉

    public function info(Request $req)
    {
        $cities = City::orderBy('id')->get();

        $memberId = session()->get("memberId");
        $member   = Member::find($memberId);

        $ship  = session("ship", "main");
        $logis = session("logis", "cvs_cod");
        $pay   = session("pay", "cod");

        $totals = session("totals", []);

        return view('front.order.info', compact('member', 'ship', 'logis', 'pay', 'totals', 'cities'));
    }
}
