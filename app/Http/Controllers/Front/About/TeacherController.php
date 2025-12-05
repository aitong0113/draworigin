<?php

namespace App\Http\Controllers\Front\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // /teacher
    public function list()
    {
        // 這裡要改成 teacher.blade.php
        return view('front.about.teacher');
    }

    // /teacher/detail/{id}
    public function detail($id)
    {
        return view('front.about.teacher_detail', compact('id'));
    }
}
