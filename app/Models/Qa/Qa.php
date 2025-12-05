<?php

namespace App\Models\Qa;

use Illuminate\Database\Eloquent\Model;

class Qa extends Model
{
    public $timestamps = false;
    protected $table = 'qa';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'title', 'content', 'dates', 'createTime'];
}
