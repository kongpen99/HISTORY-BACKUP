<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdmin
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
        //ทำการ check เงื่อนไขว่าเป้นจริง ถ้าเป็นจริงให้ redirect ไปที่ admin
        if ($request->user == "kongpeng99"){

            return redirect(route('about'));  
            
        }else{
            return redirect('/');
        }
        return $next($request);
    }
}
