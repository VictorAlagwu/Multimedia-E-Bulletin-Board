<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ModerateMiddleware
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
        if($request->user())
        {
            if ($request->user()->status != 'admin' && $request->user()->status != 'superadmin')
            {
                return redirect('bulletins')->with('error','You have not admin access');
            }
        }
        
        return $next($request);
    }
}
