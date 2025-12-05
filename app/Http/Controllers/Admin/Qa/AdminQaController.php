<?php

namespace App\Http\Controllers\Admin\Qa;

use App\Http\Controllers\Controller;
use App\Models\Qa\Qa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Session;

class AdminQaController extends Controller
{
    public function list()
    {
        $list = Qa::paginate(10);
        return view("admin.qa.list", compact("list"));
    }

    public function add()
    {
        return view("admin.qa.add");
    }


    public function insert(Request $req)
    {

        $msg = "已新增";
        DB::beginTransaction();
        try {
            $id = $this->addQa($req);
            // 移除錯誤的呼叫，因為 add() 是回傳 view，這裡不需要呼叫
            // $this->add($req, $id);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $msg = "新增失敗";
            throw $e;
        }

        Session::flash("message", $msg);
        return redirect("/admin/qa/list");
    }

    public function addQa(Request $req)
    {
        $qa = new Qa();
        $content = $req->content;
        if (!empty($content)) {
            $content = str_replace("\n", "<br/>", $content);
            $qa->content = $content;
        }

        $qa->dates = $req->dates;
        $qa->title = $req->title;
        $qa->save();

        return $qa->id;
    }


    public function edit(Request $req)
    {
        $id = $req->id;
        $qa = Qa::find($id);

        return view("admin.qa.edit", compact("id", "qa"));
    }

    public function update(Request $req)
    {
        $id = $req->id;
        $qa = Qa::find($id);

        $content = $req->content;
        //如果有內容
        if (!empty($content)) {
            //將換行改為html的換行
            $content = str_replace("\n", "<br/>", $content);
            $qa->content = $content;
        }
        //更新資料表日期欄位
        $qa->dates = $req->dates;
        //更新資料表標題欄位
        $qa->title = $req->title;
        $qa->save();

        Session::flash("message", "已修改");
        //導回修改頁面
        return redirect("/admin/qa/edit/$id");
    }

    public function delete(Request $req)
    {
        $id = $req->id;
        $msg = "已處理";
        if (!empty($id)) {
            $msg = "已刪除";
            foreach ($id as $item) {
                $qa = Qa::find($item);
                if ($qa) {
                    $qa->delete();
                }
            }
        }

        Session::flash("message", $msg);
        return redirect("/admin/qa/list");
    }
}
