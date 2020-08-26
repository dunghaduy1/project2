<?php

namespace App\Http\Middleware;

use Closure;


class login_middleware
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
        return redirect()->route('quan_ly_sinh_vien.view_sinh_vien');
    }
}