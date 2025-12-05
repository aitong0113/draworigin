<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\NewsDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminNewsDetailController extends Controller
{
    public function add(Request $req)
    {
        $id   = $req->newsId;                  // 來自路由的 {newsId}（若你用 $req->id 帶進來）
        $news = News::find($id);           // 取主檔資料（可選）
        return view('admin.news.detail.add', compact('news'));
    }


    public function insert(Request $req)
    {
        $add    = false;
        $id     = $req->newsId;
        $detail = new NewsDetail();

        $content = $req->content;
        if (!empty($content)) {
            $add     = true;
            $content = str_replace("\n", "<br/>", $content);
            $detail->content = $content;
        }

        $photo = $req->photo;

        if (!empty($photo)) {
            if (!file_exists("images/news")) {
                mkdir("images/news", 0777);
            }

            $add = true;

            $times    = explode(" ", microtime());
            $fileName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]) . substr($times[0], 2, 3) . "." . $photo->extension();
            $photo->move("images/news", $fileName);

            $detail->photo = $fileName;
        }

        if ($add) {
            $detail->newsId = $id;
            $detail->save();
        }

        Session::flash("message", "已新增");
        return redirect("/admin/news/edit/{$id}#tab2");
    }




    // public function edit(Request $req)
    // {
    //     $newsId = $req->newsId;
    //     $id = $req->id;

    //     $news = News::find($newsId);
    //     $detail = NewsDetail::find($id);

    //     return view("admin.news.detail.edit", compact("news", "detail"));
    // }

    public function edit(Request $req)
    {
        // 路由使用 /{newsId}/{id}
        $newsId = (int) $req->newsId;   // 主檔 id
        $id     = (int) $req->id;       // 明細 id

        $news   = News::findOrFail($newsId);
        $detail = NewsDetail::findOrFail($id);

        // ✅ 回「內文」的編輯頁，而不是主檔頁
        return view('admin.news.detail.edit', compact('news', 'detail'));
    }

    
    public function update(Request $req)
    {
        $newsId = $req->newsId;
        $id = $req->id;
        $detail = NewsDetail::find($id);
        $content = $req->content;
        if (!empty($content)) {
            $content = str_replace("\n", "<br/>", $content);
            $detail->content = $content;
        }

        $photo = $req->photo;
        if (!empty($photo)) {
            $img = $detail->photo;

            $times = explode(" ", microtime());
            $fileName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]) . substr($times[0], 2, 3) . "." . $photo->extension();
            $photo->move("images/news", $fileName);
            $detail->photo = $fileName;
            if (!empty($img)) {
                unlink("images/news/" . $img);
            }
        }

        $detail->save();
        Session::flash("message", "已修改");
        return redirect("/admin/news/edit/$newsId#tab2");
    }


    public function delete(Request $req)
    {
        $id = $req->id;
        $newsId = $req->newsId;
        $msg = "已經刪除";
        if (!empty($id)) {
            $msg = "已刪除";
            foreach ($id as $detailId) {
                $detail = NewsDetail::find($detailId);
                if (!empty($detail->photo)) {
                    unlink("images/news/" . $detail->photo);
                }
                $detail->delete();
            }
        }

        Session::flash("message", $msg);
        return redirect("/admin/news/edit/$newsId#tab2");

    }
}
