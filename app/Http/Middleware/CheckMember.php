<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMember
{
    public function handle(Request $request, Closure $next): Response
    {
        // 如果沒有登入 (session 沒有 memberId)
        if (!session()->has('memberId')) {
            // 如果當前路徑不是登入頁，才導去登入頁
            if (!$request->is('member/login', 'member/join', 'member/forget')) {
                return redirect('/member/login');
            }
        }

        return $next($request);
    }

    // public function handle($request, \Closure $next)
    // {
    //     if (!\Illuminate\Support\Facades\Auth::check()) {
    //         return $request->expectsJson()
    //             ? response()->json(['message' => 'Unauthenticated.'], 401)
    //             : redirect()->guest(route('member.login.form'));
    //     }
    //     return $next($request);
    // }
}
