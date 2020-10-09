<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Log;

class CheckType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		if (isset($request['login'])) {
			if (filter_var($request['login'], FILTER_VALIDATE_EMAIL)) {
			  $request->merge(['email' => $request['login']]);
			  $request->merge(['type' => 'email']);
			} else {
			  $request->merge(['phone' => $request['login']]);
			  $request->merge(['type' => 'phone']);
			}
			Log::info($request->all());
		}
		
        return $next($request);
    }
}
