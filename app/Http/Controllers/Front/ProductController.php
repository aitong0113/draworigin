<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product\Color;
use App\Models\Product\Product;
use App\Models\Product\ProductColor;
use App\Models\Product\ProductLayer;
use App\Models\Product\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{


    public function list(Request $req)
    {
        $layer   = $req->layer;
        $colorId = $req->colorId;

        $types = (new ProductLayer())->getList();
        $color = (new Color())->getList();

        $list = (new Product())->getFrontList($layer);



        $productColor = null;
        $size = null;

        // 如果有產品
        if (!empty($list) && sizeof($list) > 0) {
            foreach ($list as $data) {
                // 產品顏色
                $productColor[$data->id] = (new ProductColor())->getList($data->id);

                // 產品尺寸
                $size[$data->id] = (new ProductSize())->getList($data->id);
            }
        }

        return view("front.product.list", compact("types", "color", "list", "productColor", "size"));
    }


    public function detail($id)
    {
        // 主商品
        $product = DB::table('product')
            ->leftJoin('product_photo', 'product.id', '=', 'product_photo.productId')
            ->select(
                'product.id',
                'product.itemName',
                'product.title',
                'product.content',
                'product.price',
                'product.salePrice',
                'product.isNew',
                DB::raw('MIN(product_photo.photo) as photo')
            )
            ->where('product.id', $id)
            ->groupBy(
                'product.id',
                'product.itemName',
                'product.title',
                'product.content',
                'product.price',
                'product.salePrice',
                'product.isNew'
            )
            ->first();


        // 取照片
        $photos = DB::table('product_photo')
            ->where('productId', $id)
            ->select('photo')
            ->get();

        // 顏色
        $colors = DB::table('product_color')
            ->join('color', 'product_color.colorId', '=', 'color.id')
            ->where('product_color.productId', $id)
            ->select('product_color.id', 'color.colorName')
            ->get();

        // 尺寸
        $sizes = DB::table('product_size')
            ->join('size', 'product_size.sizeId', '=', 'size.id')
            ->where('product_size.productId', $id)
            ->select('product_size.id', 'size.size')
            ->get();

        // 推薦商品
        $recommend = DB::table('product')
            ->leftJoin('product_photo', 'product.id', '=', 'product_photo.productId')
            ->select(
                'product.id',
                'product.itemName',
                'product.price',
                'product.salePrice',
                DB::raw('MIN(product_photo.photo) as photo')
            )
            ->where('product.id', '!=', $id)
            ->groupBy('product.id', 'product.itemName', 'product.price', 'product.salePrice')
            ->orderBy('product.createTime', 'desc')
            ->limit(4)
            ->get();

        return view('front.product.detail', compact('product', 'photos', 'colors', 'sizes', 'recommend'));
    }
}
