<?php

namespace App\Http\Controllers\Front\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class introduceController extends Controller
{
    public function index()
    {
        return view('front.about.Introduce');
    }
}
