<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    /*
        path: 路徑 (資料夾)
        photo: 上傳的圖檔
        middle: 是否有要縮圖 (中圖)
        small: 是否有要縮圖 (小圖)
    */
    public function uploadPhoto($path, $photo, $middle, $mw, $mh, $small, $sw, $sh)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777);
        }

        // 副檔名
        $ext = $photo->extension();
        // 將毫秒分割為陣列(0.12345678 1799998888)，17xxx為自1900年起的秒數 0.xxx為秒以下單位
        $times = explode(" ", microtime());
        // strftime("%Y_%m_%d_%H_%M_%S_", $times[1]): 將秒數轉換為 年_月_日_時_分_秒_
        // substr($times[0], 2, 3): 取0.xxx，自第3位數開始，取3位數
        $fileName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]) . substr($times[0], 2, 3) . "." . $ext;
        // 將上傳的檔案，從暫存區移到指定目錄下，並更更檔名
        $photo->move($path, $fileName);

        // 如果有要自動縮成中圖(比原圖小)
        if ($middle) {
            // 如果資料夾不存在
            if (!file_exists($path . "/M")) {
                mkdir($path . "/M", 0777);
            }
            new Resize($path . "/M/" . $fileName, $path . "/" . $fileName, $mw, $mh, "0", "0");
        }

        // 如果有要自動縮成小圖
        if ($small) {
            // 如果資料夾不存在
            if (!file_exists($path . "/S")) {
                mkdir($path . "/S", 0777);
            }

            new Resize($path . "/S/" . $fileName, $path . "/" . $fileName, $sw, $sh, "0", "0");
        }

        return $fileName;
    }
}
