<?php

namespace App\Http\Middleware;
use App\Models\PageView;
use Closure;
use Illuminate\Http\Request;

class CountViewMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $path = $request->path();
        $pageView = PageView::firstOrNew(['path' => $path]);
        $pageView->count++;
        $pageView->save();
        return $next($request);
    }
}
