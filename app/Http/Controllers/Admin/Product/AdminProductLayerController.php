<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductLayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProductLayerController extends Controller
{
    public function list()
    {
        //$list = (new ProductLayer())->getList();
        $list = ProductLayer::get();
        return view("admin.product.layer.list", compact("list"));
    }

    public function add()
    {
        return view("admin.product.layer.add");
    }

    public function insert(Request $req)
    {
        $ly = new ProductLayer();
        $ly->layer_name = $req->layer_name;
        $ly->active = $req->active;
        $ly->save();

        Session::flash("message", "已新增");
        Session::forget("layer");
        return redirect("/admin/product/layer/list");
    }


    public function edit(Request $req)
    {
        $layer = ProductLayer::find($req->id);
        return view("admin.product.layer.edit", compact("layer"));
    }

    public function update(Request $req)
    {
        $layer = ProductLayer::find($req->id);
        $layer->layer_name = $req->layer_name;
        $layer->active = $req->active;
        $layer->save();

        Session::flash("message", "已修改");
        Session::forget("layer");
        return redirect("/admin/product/layer/list");
    }

    public function delete(Request $req)
    {
        ProductLayer::destroy($req->id);
        Session::flash("message", "已刪除");
        Session::forget("layer");
        return redirect("admin/product/list");
    }
}
