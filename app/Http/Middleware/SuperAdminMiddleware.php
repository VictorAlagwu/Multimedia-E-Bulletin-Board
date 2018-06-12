<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
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
        if ($request->user() && $request->user()->status != 'superadmin')
        {
            return redirect('bulletins')->with('error','You have not Super Admin access');
        }
    return $next($request);
    }
}
