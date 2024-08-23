<?php

namespace Majdi\SecureLoginSystem\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class InputSanitization
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Sanitize input data
        $input = $request->all();
        array_walk_recursive($input, function (&$input) {
            $input = strip_tags($input);
        });
        $request->merge($input);

        return $next($request);
    }
}
