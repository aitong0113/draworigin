<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps  = false;
    protected $table    = 'member';
    protected $primaryKey = 'id';

    // 不要把 id 放進 fillable
    protected $fillable = ['email', 'userName', 'pwd', 'createTime'];

    // 可選：轉陣列/JSON 時隱藏密碼
    protected $hidden   = ['pwd'];

    // 簡化，支援 email + 明文密碼
    public static function getMember(string $email, string $pwd = '')
    {
        $member = self::where('email', $email)->first();
        if (!$member) return null;

        // 只憑 email 取資料
        if ($pwd === '') return $member;

        // 明文比對（你的資料表就是存 123, 777777）
        if ($member->pwd === $pwd) {
            return $member;
        }

        return null;
    }
}
