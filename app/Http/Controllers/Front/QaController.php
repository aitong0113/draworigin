<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Qa\Qa;
use Illuminate\Http\Request;

class QaController extends Controller
{
    // 列表頁
    public function list()
    {
        $list = Qa::get();
        return view("front.qa.list", compact("list"));
    }
}
