<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminDashboard
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
            if (session('role_id') == 1){
                return $next($request);
            }else{
                abort(401);
            }
        }else{
            return redirect()->route('login')->with('errorLogin', 'You should have account to this action');
        }
    }
}
