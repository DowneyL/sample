<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;

class CheckAdmin
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
        $user = Auth::user();
        if (!($user->is_admin)) {
            return redirect('/');
        }

        return $next($request);
    }
}
