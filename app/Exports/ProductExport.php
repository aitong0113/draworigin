<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    public function collection()
    {
        $sql = "SELECT b.layer_name, a.itemNo, a.itemName, a.title, a.qty, a.price, a.salePrice,
                CONCAT('D:\\\\huang\\\\LARAVEL\\\\shop\\\\public\\\\images\product\\\\', (SELECT photo FROM product_photo WHERE productId = a.id LIMIT 1)) AS photo
                FROM product a INNER JOIN product_layer b ON a.layer = b.id";

        $list = collect(DB::select($sql));
        return $list;
    }

    public function headings(): array
    {
        return [
            "類別",
            "產品編號",
            "產品名稱",
            "標題",
            "數量",
            "定價",
            "售價",
            "圖片"
        ];
    }
}
