<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\About\IntroduceController;

Route::get('/introduce', [IntroduceController::class, 'index'])->name('introduce');
