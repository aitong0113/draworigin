<?php

namespace App\Http\Controllers\Admin\Product;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Models\Admin\Upload;
use App\Models\Product\Color;
use App\Models\Product\Label;
use App\Models\Product\Product;
use App\Models\Product\ProductColor;
use App\Models\Product\ProductLabel;
use App\Models\Product\ProductLayer;
use App\Models\Product\ProductPhoto;
use App\Models\Product\ProductSize;
use App\Models\Product\ProductSpec;
use App\Models\Product\Size;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class AdminProductController extends Controller
{
    public function list()
    {
        $list = (new Product())->getList();
        return view("admin.product.product.list", compact("list"));
    }


    public function add()
    {
        $layer = ProductLayer::get();
        $color = Color::get();
        $label = Label::get();
        $size  = Size::get();
        return view("admin.product.product.add", compact("layer", "color", "label", "size"));
    }

    public function insert(Request $req)
    {
        $msg = "已新增";
        DB::beginTransaction();
        try {
            $productId = $this->addProduct($req);
            $this->addColor($req, $productId);
            $this->addLabel($req, $productId);
            $this->addSize($req, $productId);
            $this->addSpec($req, $productId);
            $this->addPhoto($req, $productId);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $msg = "新增失敗";
            throw $e;
        }

        Session::flash("message", $msg);
        return redirect("/admin/product/product/list");
    }



    private function addProduct(Request $req)
    {
        $product = new Product();
        $product->layer     = $req->layer;
        $product->itemNo    = $req->itemNo;
        $product->itemName  = $req->itemName;
        $product->title     = $req->title;
        $product->content   = $req->content;
        $product->qty       = $req->qty;
        $product->price     = $req->price;
        $product->salePrice = $req->salePrice;
        $product->isNew = $req->isNew;
        $product->active    = $req->active;
        $product->save();

        return $product->id;
    }



    private function addColor(Request $req, $productId)
    {
        $color = Color::get();
        $input = request()->all();
        foreach ($color as $data) {
            if (!empty($input["color" . $data->id])) {
                $table = new ProductColor();
                $table->productId = $productId;
                $table->colorId   = $data->id;
                $table->save();
            }
        }
    }

    private function addLabel(Request $req, $productId)
    {
        $label = Label::get();
        $input = request()->all();
        foreach ($label as $data) {
            if (!empty($input["label" . $data->id])) {
                $table = new ProductLabel();
                $table->productId = $productId;
                $table->labelId   = $data->id;
                $table->save();
            }
        }
    }




    private function addSize(Request $req, $productId)
    {
        $size = Size::get();
        $input = request()->all();
        foreach ($size as $data) {
            if (!empty($input["size" . $data->id])) {
                $table = new ProductSize();
                $table->productId = $productId;
                $table->sizeId    = $data->id;
                $table->save();
            }
        }
    }




    private function addSpec(Request $req, $productId)
    {
        $input = request()->all();
        foreach (range(1, 10) as $seq) {
            if (!empty($input["title" . $seq])) {
                $spec = new ProductSpec();
                $spec->productId = $productId;
                $spec->title     = $input["title" . $seq];
                $spec->content   = $input["content" . $seq];
                $spec->save();
            }
        }
    }




    private function addPhoto(Request $req, $productId)
    {
        $input = request()->all();
        $path = "images/product";
        foreach (range(1, 8) as $seq) {
            if (!empty($input["photo" . $seq])) {
                $photo = $input["photo" . $seq];
                $fileName = (new Upload())->uploadPhoto($path, $photo, true, 575, 575, true, 120, 120);
                $table = new ProductPhoto();
                $table->productId = $productId;
                $table->photo = $fileName;
                $table->save();
            }
        }
    }



    public function delete(Request $req)
    {
        Product::destroy($req->id);
        Session::flash("message", "已刪除");
        return redirect()->route("admin.product.list");
    }



    public function export()
    {
        return Excel::download(new ProductExport, "產品資料.xlsx");
    }

}


