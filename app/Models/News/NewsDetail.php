<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class NewsDetail extends Model
{
    public $timestamps = false;
    protected $table = 'news_detail';
    protected $primaryKey = 'id';
    protected $fillable = ['id','newId', 'content', 'photo', 'createTime'];


    public function detail($newsId)
    {
        $list = self::where("newsId", $newsId)->get();
        return $list;
    }
}
