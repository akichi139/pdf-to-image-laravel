<?php

namespace App\Http\Middleware;

use Closure;
use Whitecube\LaravelTimezones\Facades\Timezone;

class DefineApplicationTimezone
{
    public function handle($request, Closure $next)
    {
        Timezone::set($request->user()->timezone ?? 'Asia/Bangkok');
 
        return $next($request);
    }
}
