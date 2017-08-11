<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class MenuRender
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
        if(!$request->session()->get('menu')){
            $categories =   \App\Category::where('published',1)
                ->get();
            $request->session()->put('menu',    $categories);
        }
        return $next($request);
    }
}
