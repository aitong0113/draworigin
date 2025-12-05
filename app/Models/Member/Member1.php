<?php

namespace App\Models\Member;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $table = "member";
    protected $primaryKey = "id";
    protected $fillable = ["id", "email", "userName", "pwd", "createTime"];

    public function getMember($email, $pwd = "")
    {
        $sql = self::where("email",$email);

        if(!empty($pwd))
        {
            $sql->where("pwd", $pwd);
        }


        $member = $sql->first();
        return $member;
    }
}


