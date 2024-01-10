<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->roles->contains('name', $role)) {
            return $next($request);
        }
    
        // Nếu không có quyền, bạn có thể chuyển hướng hoặc trả về lỗi tùy thuộc vào yêu cầu của bạn.
        return abort(403, 'Unauthorized');
    }
}
