<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class blocked
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
        if (!session('role_id') == null){
            if (session('role_id') == 4){
                return redirect()->route('blocked');
            }else{
                return $next($request);
            }
        }else{
            return redirect()->route('login')->with('errorLogin', 'You should have account to this action');
        }
    }
}
