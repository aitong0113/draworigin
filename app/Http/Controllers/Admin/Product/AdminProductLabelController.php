<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin\Upload;
use App\Models\Product\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProductLabelController extends Controller
{
    public function list()
    {
        $list = Label::get();
        return view("admin.product.label.list", compact("list"));
    }

    public function add()
    {
        return view("admin.product.label.add");
    }

    public function insert(Request $req)
    {
        $label = $req->label;
        $msg   = "請選擇檔案";

        if (!empty($label)) {
            $path     = "images/label";
            $fileName = (new Upload())->uploadPhoto($path, $label, false, 0, 0, false, 0, 0);

            $labelM = new Label();
            $labelM->label  = $fileName;
            $labelM->active = $req->active;
            $labelM->save();

            $msg = "已新增";
        }

        Session::flash("message", $msg);
        return redirect("/admin/product/label/list");
    }


    public function edit(Request $req)
    {
        $label = Label::find($req->id);
        return view("admin.product.label.edit", compact("label"));
    }


    public function update(Request $req)
    {
        $label = Label::find($req->id);
        $img = $req->label;

        $msg = "已處理";
        if (!empty($img)) {
            $photo = $label->label;

            $path = "images/label";
            $fileName = (new Upload())->uploadPhoto($path, $img, false, 0, 0, false, 0, 0);
            $label->label = $fileName;

            unlink("images/label/" . $photo);
            $msg = "已修改";
        }

        $label->active = $req->active;
        $label->update();

        Session::flash("message", $msg);
        return redirect("/admin/product/label/list");
    }




    public function delete(Request $req)
    {
        $ids = $req->id;
        if (!empty($ids)) {
            foreach ($ids as $id) {
                $label = Label::find($id);

                // 建議先檢查檔案存在再刪除，且用 public_path 確保目錄正確
                $path = public_path('images/label/' . $label->label);
                if ($label && $label->label && file_exists($path)) {
                    @unlink($path);
                }

                $label->delete();
            }
        }

        Session::flash("message", "已刪除");
        return redirect("/admin/product/label/list");
    }
}
