<?php

namespace App\Http\Controllers\Admin\News;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\News\News;
use App\Models\News\NewsDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminNewsController extends Controller
{
    public function list()
    {
        $list = News::paginate(10);
        return view("admin.news.list", compact("list"));
    }

    public function add()
    {
        return view("admin.news.add");
    }


    public function insert(Request $req)
    {
        $msg = "已新增";
        DB::beginTransaction();
        try {
            $id = $this->addNews($req);
            $this->addDetail($req, $id);
        } catch (Exception $e) {
            DB::rollback();
            $msg = "新增失敗";
            throw $e;
        }

        Session::flash("message", $msg);
        return redirect("/admin/news/list");

    }


    public function addNews(Request $req)
    {
        $news = new News();
        $content = $req->content;
        if (!empty($content)) {
            $content = str_replace("\n", "<br/>", $content);
            $news->content = $content;
        }

        $photo = $req->photo;

        if (!empty($photo)) {
            if (!file_exists("images/news")) {
                mkdir("images/news", 0777);
            }


            $times = explode(" ", microtime());
            $fileName = strftime("%Y_%M_%d_%H_%M_%S_", $times[1]) . substr($times[0], 2, 3) . "." . $photo->extension();
            $photo->move("images/news", $fileName);
            $news->photo = $fileName;
        }



        $news->dates = $req->dates;
        $news->title = $req->title;
        $news->save();

        return $news->id;
    }




    public function addDetail(Request $req, $id)
    {
        $input = request()->all();
        foreach (range(1, 5) as $seq) {     //$seq 是你在 foreach 迴圈裡面自訂的 迴圈變數，代表 1 到 5 的數字。
            $add = false;
            $content = "";
            $fileName = "";

            if (!empty($input["content" . $seq])) {
                $add = true;
                $content = str_replace("\n", "<br/>", $input["content" . $seq]);
            }

            if (!empty($input["photo" . $seq])) {
                $photo = $input["photo" . $seq];
                $times = explode(" ", microtime());
                $fileName = strftime("%Y_%m_%d_%H_%M_%S", $times[1]) . substr($times[0], 2, 3) . "." . $photo->extension();
                $photo->move("images/news", $fileName);

                $add = true;
            }

            if ($add) {
                $newsId = new NewsDetail();
                $newsId->newsId = $id;

                if (!empty($content)) {
                    $newsId->content = $content;
                }

                if (!empty($fileName)) {
                    $newsId->photo = $fileName;
                }

                $newsId->save();
            }
        }
    }

    public function edit(Request $req)
    {
        $id = $req->id;
        //取得要修改的資料
        $news = News::find($id);

        $test = new NewsDetail();
        $detail = $test->detail($id);

        $newsId = (new NewsDetail())->detail($id);

        return view("admin.news.edit", compact("id", "news", "newsId"));
    }

    // public function edit(Request $req)
    // {
    //     $id   = $req->id;
    //     $news = News::find($id);
    //     $details = NewsDetail::where('newsId', $id)->get();

    //     return view("admin.news.edit", compact("id", "news", "details"));
    // }

//  //   老師版本
//     public function update(Request $req)
//     {
//         $id = $req->id;
//         $news = News::find($id);

//         $content = $req->content;
//         //如果有內容
//         if (!empty($content)) {
//             //將換行改為html換行
//             $content = str_replace("\n", "<br/>", $content);
//             //更新資料表內容欄位
//             $news->content = $content;

//         }

//         $photo = $req->photo;
//         //如果有上傳圖檔
//         if (!empty($photo)) {
//             //先取得原本圖的檔名
//             $img = $news->photo;

//             $times = explode(" ", microtime());
//             $fileName = strftime("%Y_%m_%d_%H_%M_%S_", $times[1]) . substr($times[0], 2, 3) . "." . $photo->extension();
//             //將新上傳的圖檔由暫存區移至指定目錄下
//             $photo->move("images/news", $fileName);
//             //更新資料表圖檔欄位
//             $news->photo = $fileName;
//             //將原有的圖由資料夾中刪除
//             unlink("images/news/" . $img);
//         }
//         //更新資料表日期欄位
//         $news->dates = $req->dates;
//         //更新資料表標題欄位
//         $news->title = $req->title;
//         $news->save();

//         Session::flash("message", "已修改");
//         //導回修改面頁
//         return redirect("/admin/news/edit/{$id}");
//     }


    //AI修正版本
    public function update(Request $req)
    {
        $id   = (int) $req->id;
        $news = News::findOrFail($id);

        // 內容
        if ($req->filled('content')) {
            $news->content = str_replace("\n", "<br/>", $req->content);
        }

        // 圖片（Tab1 封面）
        if ($req->hasFile('photo') && $req->file('photo')->isValid()) {
            $photo = $req->file('photo');

            // 目錄（用絕對路徑並確保存在）
            $dir = public_path('images/news');
            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0777, true);
            }

            // 產生不含空白、且正確「月份」的檔名
            $fileName = now()->format('Y_m_d_H_i_s_') . substr(microtime(), 2, 3) . '.' . $photo->extension();

            // 移動檔案（一定要「目錄 + 檔名」）
            $photo->move($dir, $fileName);

            // 刪除舊檔（存在且不同名才刪）
            if (!empty($news->photo)) {
                $oldPath = $dir . DIRECTORY_SEPARATOR . ltrim($news->photo, '/');
                if (File::exists($oldPath) && $news->photo !== $fileName) {
                    File::delete($oldPath);
                }
            }

            // 更新資料表檔名
            $news->photo = $fileName;
        }

        // 其他欄位
        $news->dates = $req->dates;
        $news->title = $req->title;
        $news->save();

        Session::flash('message', '已修改');
        return redirect("/admin/news/edit/{$id}");
    }


//老師版本(破圖刪不掉)
    //     public function delete(Request $req)
    //     {
    //         $id = $req->id;
    //         $msg = "已經刪除";
    //         if (!empty($id)) {
    //             $msg = "已刪除";
    //             foreach ($id as $newsId) {
    //                 $detail = (new NewsDetail())->detail($newsId);
    //                 foreach ($detail as $data) {
    //                     if (!empty($data->photo)) {
    //                         unlink("images/news/" . $data->photo);
    //                     }
    //                     $data->delete();
    //                 }

    //                 $news = News::find($newsId);
    //                 if (!empty($news->photo)) {
    //                     unlink("images/news/" . $news->photo);
    //                 }
    //                 $news->delete();
    //             }
    //         }

    //         Session::flash("message", $msg);
    //         return redirect("/admin/news/list");
    //     }
    // }


    public function delete(Request $req)
    {
        $ids = (array) $req->id;                 // 允許單筆或多筆
        $msg = '已刪除';

        if (empty($ids)) {
            Session::flash('message', '沒有選取要刪除的資料');
            return redirect('/admin/news/list');
        }

        // 小工具：安全刪圖（只要存在才刪，不存在就略過）
        $removePhoto = function (?string $file) {
            if (!$file) return;
            // 統一路徑，避免重複前綴與斜線差異
            $relative = ltrim($file, '/\\');                     // 例如 'news/xxx.jpg' 或 'images/news/xxx.jpg'
            if (str_starts_with($relative, 'images/')) {
                $relative = substr($relative, strlen('images/')); // 轉成以 images/ 為根的相對路徑
            }
            $path = public_path('images/' . $relative);          // 絕對路徑

            if (is_file($path)) {
                @unlink($path);                                  // 存在才刪；加 @ 避免權限等警告
            }
        };

        foreach ($ids as $newsId) {

            // 刪除細項
            $details = (new NewsDetail())->detail($newsId);
            foreach ($details as $data) {
                $removePhoto($data->photo);
                $data->delete();
            }

            // 刪除主檔
            if ($news = \App\Models\News::find($newsId)) {
                $removePhoto($news->photo);
                $news->delete();
            }
        }

        Session::flash('message', $msg);
        return redirect('/admin/news/list');
    }
}