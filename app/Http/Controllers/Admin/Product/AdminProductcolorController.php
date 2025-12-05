<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product\ProductColor;

class AdminProductColorController extends Controller
{
    /** 列表 */
    public function list()
    {
        $list = Color::get();    // ← 改這一行即可（最小改動）
        return view('admin.product.color.list', compact('list'));
    }

    /** 新增頁 */
    public function add()
    {
        return view('admin.product.color.add');
    }


    public function insert(Request $req)
    {
        $req->validate([
            'colorName' => 'required|string|max:50',
            'color'     => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            // checkbox 沒勾不會送值，因此不可用 required；勾了才會是 "Y"
            'active'    => 'nullable|in:Y',
        ]);

        $color = new Color();                 // ← 繼續用 Color 這個 Model
        $color->colorName = $req->colorName;  // ← 你表單有送這個欄位
        $color->color     = $req->color;
        $color->active    = $req->filled('active') ? 'Y' : 'N'; // ← 未勾時補預設
        $color->save();

        Session::flash('message', '已新增');
        return redirect('/admin/product/color/list');
    }


    /** 編輯頁 */
    public function edit(Request $req)
    {
        $color = Color::find($req->id);
        abort_if(!$color, 404);

        return view('admin.product.color.edit', compact('color'));
    }
    /** 更新處理 */
    public function update(Request $req)
    {
        $req->validate([
            'id'        => 'required|integer|exists:color,id', // ← 這裡改成 color
            'colorName' => 'required|string|max:50',
            // 建議：若前端用 jscolor，改成允許有或沒有 # 的 6 碼
            'color'     => ['required', 'regex:/^#?[A-Fa-f0-9]{6}$/'],
            'active'    => 'nullable|in:Y',
        ]);

        // 正規化色碼（可選）
        $hex = strtoupper(ltrim($req->color, '#'));
        $normalized = '#' . $hex;

        $color = Color::findOrFail($req->id);
        $color->colorName = $req->colorName;
        $color->color     = $normalized; // 或 $req->color 若不想正規化
        $color->active    = $req->filled('active') ? 'Y' : 'N';
        $color->save();

        Session::flash('message', '已修改');
        return redirect('/admin/product/color/list');
    }

    /** 刪除 */
    public function delete(Request $req)
    {
        Color::destroy($req->id);
        Session::flash('message', '已刪除');
        return redirect('/admin/product/color/list');
    }
}
