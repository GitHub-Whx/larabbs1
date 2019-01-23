<?php

namespace App\Http\Middleware;

use Closure;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 1、如果用户已登录
        // 2、并且还未认证 Email
        // 3、并且访问的不是 email 验证相关的 URL 或者推出的 URL
        if ($request->user() && ! $request->user()->hasVerifiedEmail() && ! $request->is('email/*', 'logout')) {
            return $request->expectsJson()
                        ? abort(403, 'Your email address is not verified.')
                        : redirect()->route('verification.notice');
        }
        return $next($request);
    }
}
