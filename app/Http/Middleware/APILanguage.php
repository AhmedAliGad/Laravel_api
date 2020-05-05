<?php

namespace App\Http\Middleware;

use Closure;

class APILanguage
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
        app()->setLocale($request->header('language') ?? 'ar');

        return $next($request);
    }
}
