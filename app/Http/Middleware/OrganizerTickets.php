<?php

namespace App\Http\Middleware;

use App\Models\Event;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerTickets
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($id)
    {
        if (!auth()->user() == null){
            $event = Event::find($id);
            if (Auth::id() == $event->user_id){
                return $next($request);
            }else{
                return abort(404);
            }
        }
        return redirect()->route('login')->with('errorLogin', 'You should have account to do this action');
    }
}
