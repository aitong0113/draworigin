<?php

use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Info;

// Route::get('/', [IndexController::class, 'index'])->middleware('info');
Route::get('/', [IndexController::class, 'index'])->middleware(Info::class);

require "member.php";
require "news.php";
require "product.php";
require "shopCart.php";
require "story.php";
require "introduce.php";
require "teacher.php";
require "qa.php";
require "contact.php";
require "order.php"; 
