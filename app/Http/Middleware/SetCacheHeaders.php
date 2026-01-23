<?php

namespace App\Http\Middleware;

use Closure;

class SetCacheHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $ttl  Cache time in minutes (default: 60)
     * @return mixed
     */
    public function handle($request, Closure $next, $ttl = 60)
    {
        $response = $next($request);

        // Only cache successful GET requests
        if ($request->isMethod('GET') && $response->isSuccessful()) {
            // Convert minutes to seconds
            $seconds = $ttl * 60;
            
            // Set public cache headers
            $response->header('Cache-Control', "public, max-age={$seconds}");
            $response->header('X-Accel-Expires', $seconds); // For nginx
        }

        return $response;
    }
}
