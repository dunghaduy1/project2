<?php

namespace App\Http\Middleware;

use Closure;

class demo_middleware
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
        if($request->session()->has('ten')){
            return $next($request);
        }
        return redirect()->route('admin.login')->with('error','Chưa đăng nhập');
    }
}