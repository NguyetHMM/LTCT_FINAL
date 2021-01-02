<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserLogin
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
        if(Auth::check()){
            return $next($request);
        } else {
            return redirect()->action([ProductModuleController:: class,'home'])->with('alert','Hay dang nhap de thuc hien chuc nang nay');
        }
        
    }
}
