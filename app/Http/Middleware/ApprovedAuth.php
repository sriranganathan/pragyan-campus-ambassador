<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\User as User;

class ApprovedAuth
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
        if(Session::has('admin'))
        {
            return $next($request);
        }

        if(Session::has('fbid'))
        {
            $user = User::where('facebook_user_id', $fbid)->first();
            if($user->registration == 1 && $user->approved == 1)
                return $next($request);
            else
                return Redirect::to('/register');
        }
        else
        {
            return Redirect::to('/register');
        }
    }
}
