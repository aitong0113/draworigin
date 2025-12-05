<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\NewsDetail;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // 列表頁
    public function list()
    {
        $list = News::get();
        return view("front.news.list", compact("list"));
    }

    // 詳細頁
    public function detail(Request $req)
    {
        $list = (new NewsDetail())->detail($req->id);
        return view("front.news.detail", compact("list"));
    }
}
