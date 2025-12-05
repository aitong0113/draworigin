<?php

namespace App\Http\Controllers\Front\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function list()
    {
        return view('front.about.story');
    }
}
