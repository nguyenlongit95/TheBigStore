<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class adminLogin
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
        /*
         * Kiem tra xem ng dung co dang dang nhap hay k
         * */
        if(Auth::check()){
            if(Auth::user()->level == 1){
                return $next($request);
            }else{
                return redirect('index');
            }
        }else{
            return redirect('Login');
        }
    }
}
