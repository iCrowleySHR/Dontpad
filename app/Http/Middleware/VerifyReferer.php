<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyReferer
{
    public function handle(Request $request, Closure $next)
    {
        $referer = $request->headers->get('referer');
        $allowedDomain = env('APP_URL');

        if (strpos($referer, $allowedDomain) === false) {
            return response('Access denied.', 403);
        }
        return $next($request);
    }
}
