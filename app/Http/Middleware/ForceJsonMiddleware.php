<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// Currently unused. The solution was to add 'Accept: application/json' to the request headers in POSTMAN.
// This middleware can be used to enforce JSON responses in the future if needed.
class ForceJsonMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->wantsJson()) {
            abort(response()->json([
                'message' => 'This resource only supports JSON responses (set header "Accept" to "application/json").'
            ], 400));
        }

        return $next($request);
    }
}
