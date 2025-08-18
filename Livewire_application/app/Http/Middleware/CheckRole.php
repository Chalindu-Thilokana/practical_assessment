<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$userType): Response
    {
        $user = $request->user();

        // Check if user is logged in
        if (!$user) {
            return redirect()->route('home'); // Redirect to home if not logged in
        }

        // Check if user type is allowed
        if (!in_array($user->userType, $userType)) {
            abort(403, 'Unauthorized action.'); // Forbidden if not allowed
        }

        return $next($request);
    }
    
}
