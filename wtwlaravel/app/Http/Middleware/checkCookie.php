<?php

namespace App\Http\Middleware;

use Closure;

class checkCookie
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
        if($request->hasCookie('patientId')) {
            return redirect('welcome');
        }
        return $next($request);
    }
}
