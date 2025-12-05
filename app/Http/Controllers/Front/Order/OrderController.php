<?php

namespace App\Http\Controllers\Front\Order;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Dist;
use App\Models\Member\Member;
use App\Models\Order\OrderTemp;
use App\Models\Order\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function info(Request $req)
    // {
    //     $ship = $req->ship;
    //     $pay = $req->pay;
    //     $memberId = session()->get("memberId");
    //     $member = Member::find($memberId);

    //     session()->put("ship", $ship);
    //     session()->put("pay", $pay);

    //     return view("front.order.info", compact("member", "ship"));
    /**
     * Handle the info request.
     *
     * @param  Request  $req
     * @return Response
     */
    // }
    public function info(Request $req)
    {
        if ($req->isMethod('post')) {
            session()->put("ship", $req->ship ?? 'main');
            session()->put("logis", $req->logis ?? 'cvs_cod');
            session()->put("pay", $req->pay ?? 'cod');
        }

        $memberId = session()->get("memberId");
        $member   = Member::find($memberId);

        $ship   = session("ship", "main");
        $logis  = session("logis", "cvs_cod");
        $pay    = session("pay", "cod");
        $totals = session("totals", []);

        // 🔑 在這裡查詢 city 資料
        $cities = City::orderBy('id')->get();

        return view('front.order.info', compact('member', 'ship', 'logis', 'pay', 'totals', 'cities'));
    }



    public function payment(Request $req)
    {
        // 處理訂單資料
        return redirect("/order/flow");
    }

    public function flow()
    {
        // 將物流相關資料送至物流公司
        $data = "";
        return view("front.order.flow", compact("data"));
    }

    public function finish(Request $req)
    {
        // 取得訂單資料
        $data = "";
        return view("front.order.finish", compact("data"));
    }


    public function saveAddress(Request $request)
    {
        $request->validate([
            'city' => 'required',
            'district' => 'required',
            'zipcode' => 'required',
        ]);

        // 存入 session 或資料庫
        session()->put('city', $request->city);
        session()->put('district', $request->district);
        session()->put('zipcode', $request->zipcode);

        return redirect()->back()->with('success', '地址已儲存！');
    }



    public function getDist(Request $req)
    {
        $city = $req->city;
        $list = (new Dist())->getDist($city);
        return view("front.city.dist", compact("list"));
    }

    public function getZip(Request $req)
    {
        $city = $req->city;
        $dist = $req->dist;
        $zip = (new Dist())->getZip($city, $dist);
        echo ($zip->zip);
    }
}

