<?php

namespace App\Http\Middleware;

use Closure;
use App\Patient;

class CheckCookie
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
        // Om patientId cookie finns samt om patient med id finns
        if($request->hasCookie('patientId') && Patient::find($request->cookie('patientId'))) {
            return $next($request);
        }
        return redirect('');

    }
}
