<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Sentinel::check();
        if (!$user) {
            return Redirect::to('/admin/login')->withErrors('Please login first');
        } else if (!$user->hasAccess([User::ADMIN_PERMISSION])) {
            return Redirect::to('/admin/login')->withErrors('No admin access');
        } else {
            return $next($request);
        }
    }
}
